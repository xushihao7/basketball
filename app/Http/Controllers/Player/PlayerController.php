<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Model\PlayerModel;
use App\Model\TeamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{

    //上传文件
    public  function  upload(Request $request){
        $file=$request->file("file");
        $ext=$file->getClientOriginalExtension();
        $date=date("Y")."/".date('m').'/'.date('d');
        $new_file_name = date('YmdHis') . '.' . $ext;//新的文件名
        $path = "upload/player/".$date."/";//存储的路径
            //echo $url;die;
        $data=$this->imgUpload($file,$ext,$new_file_name,$path);
        $file_path=$data['file_path'];
        //获取当前域名
        $url="http://".$request->server("HTTP_HOST")."/".$file_path;
        $arr=[
            'code'=>1,
            "msg"=>"上传成功",
            //'src'=>$url."/public/".$file_path
            'src'=>$file_path,
            'url'=>$url,
            'player_name'=>$data['images_name']
        ];
            //print_r($arr);die;
        echo json_encode($arr);




    }
    //球员添加
   public function playerAdd(Request $request){
       if($request->ajax() && $request->post() ){
            $player_ename=$request->input("player_ename");
            $where=[
                'player_ename'=>$player_ename
            ];
            $res=PlayerModel::where($where)->first();
            if(!empty($res)){
                $this->fail("请勿重新添加");
            }
            $player_cname=$request->input("player_cname");
            $player_height=$request->input("player_height");
            $player_weight=$request->input("player_weight");
            $player_number=$request->input("player_number");
            $player_position=$request->input("player_position");
            $date=$request->input("date");
            $player_img=$request->input("player_img");
            $team_id=$request->input("team_id");
            $year=$request->input("year");
            $round=$request->input("round");
            $rank=$request->input("rank");
            $player_university=$request->input("player_university");
            $player_from=$request->input("player_from");
            $player_status=$request->input("player_status");
            $player_position=implode(",",$player_position);
            $player_age=strtotime($date);
            $retire_date=strtotime($request->input('retire_date'));
            //处理顺位
           if(empty($rank)){
               $player_draft=$year.$round;
           }else{
               if($rank==1){
                   $player_draft=$year."年选秀状元";
               }else if($rank==2){
                   $player_draft=$year."年选秀榜眼";
               }else if($rank==3){
                   $player_draft=$year."年选秀探花";
               }else{
                   $player_draft=$year."年".$round."第".$rank."顺位";
               }
           }
            $data=[
                'player_ename'=>$player_ename,
                'player_cname'=>$player_cname,
                'player_age'=>$player_age,
                'player_number'=>$player_number,
                'player_position'=>$player_position,
                'player_img'=>$player_img,
                'player_height'=>$player_height,
                'player_weight'=>$player_weight,
                'player_draft'=>$player_draft,
                'player_university'=>$player_university,
                'player_from'=>$player_from,
                'team_id'=>$team_id,
                'player_status'=>$player_status,
                'retire_date'=>$retire_date
            ];
            //print_r($data);die;
            $res=PlayerModel::insert($data);
            if($res){
                $this->success("添加成功");
            }else{
                $this->fail("添加失败");
            }
       }else{
           //查询球队
           $west=TeamModel::where(['team_partition'=>1])->get()->toArray();
           $east=TeamModel::where(['team_partition'=>2])->get()->toArray();
           $data=[
               'west'=>$west,
               'east'=>$east

           ];
           //var_dump($data);die;
           return view("admin.player.add",$data);
       }

   }
   //球员列表
   public function  playerShow(){
        $count=PlayerModel::count();
        return view('admin.player.list',['count'=>$count]);
    }
    //球员详细内容
   public  function  playerList(Request $request){
        $page=$request->input('page');
        $limit=$request->input('limit');
        $playList=PlayerModel::offset(($page-1)*$limit)->limit($limit)->get();
        $playList=$this->objectToArray($playList);
        foreach ($playList as $k=>$v){
            $age=$playList[$k]['player_age'];
            $team_id=$playList[$k]['team_id'];
            $team_name=TeamModel::where(['team_id'=>$team_id])->value('team_name');
            $playList[$k]['team_name']=$team_name;
            $playList[$k]['player_age']=$this->getAge($age)."岁";
            if($playList[$k]['player_status']==1){
                $playList[$k]['player_status']="现役";
            }else{
                $playList[$k]['player_status']="退役";
            }
        }
        //var_dump($playList);die;
        $count=PlayerModel::count();
        $data=[
            'code'=>0,
            'data'=>$playList,
            'count'=>$count,
            'msg'=>''
        ];
        $this->json($data);
        //var_dump($playList);die;
    }
    //球员删除
    public function  playerDel(Request $request){
        $id=$request->input();
        if(empty($id)){
            $data=[
                'msg'=>'非法操作',
                'url'=>'/'
            ];
            return view('error.jump',$data);
        }else{
            $this->fail('目前无法删除');
        }
    }
    //球员编辑
}
