<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Model\PlayerModel;
use App\Model\TeamModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{



    /**
     * 球队添加
     * @param Request $request
     */
    public  function  teamAdd(Request $request){
        //$data=$request->input();
        if($request->ajax() && $request->input()){
            //查询是否是30支球队
            $team_id=TeamModel::count("team_id");
            if($team_id==30){
                $font="目前NBA球队已经达到30支，无法添加";
                return $this->fail($font);
            }
        }else{
            return view('admin.team.add');
        }
    }

       public function teamUpload(Request $request){
           $file=$request->file("file");
           $ext=$file->getClientOriginalExtension();
           $date=date("Y")."/".date('m').'/'.date('d');
           $new_file_name = date('YmdHis') . '.' . $ext;//新的文件名
           $path = "upload/team/".$date."/";//存储的路径
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

    /**
     * 球队展示页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  teamShow(Request $request){
        $count=TeamModel::where('team_status',1)->count();
        return view('admin.team.list',['count'=>$count]);
    }

    /**
     * 球队数据查询
     * @param Request $request
     */
    public  function  teamList(Request $request){
        $page=$request->input("page");
        $limit=$request->input("limit");
       $where=[
           'team_status'=>1
       ];
         //查询数据  按东西部排名分组
        $sql="(select count(*) from nba_team where a.team_partition=team_partition and a.team_rank=team_rank) and team_status=1 order by a.team_partition,(a.team_rank+0) asc";
        $data=DB::table("nba_team as a")->whereRaw($sql)
            ->offset(($page-1)*$limit)->limit($limit)->get();
        //var_dump($data);die;
         $count=TeamModel::where($where)->count();
//        $data=DB::select(
//            "SELECT * FROM nba_team a
//               WHERE
//(SELECT count(*) FROM nba_team
//          where a.team_partition=team_partition
//          and a.team_rank<team_rank)
//  ORDER BY a.team_partition,(a.team_rank+0)  ASC ");
//        var_dump($data);die;
//       $count=TeamModel::where($where)->count();
//       $data=TeamModel::where($where)->offset(($page-1)*$limit)->limit($limit)->get();
        $data = $this->objectToArray($data);
        foreach ($data as $k=>$v){
            if($data[$k]['team_partition']==1){
                $data[$k]['team_partition']="西部";
                $data[$k]['team_rank']="西部第".$data[$k]['team_rank'];
            }else{
                $data[$k]['team_partition']='东部';
                $data[$k]['team_rank']="东部第".$data[$k]['team_rank'];
            }
            $data[$k]['team_record']=$data[$k]['team_win']."-".$data[$k]['team_fail'];
        }
        //var_dump($data);die;

       $response=[
           'code'=>0,
           'data'=>$data,
           'count'=>$count,
           'msg'=>""
       ];
       return $response;
       //$this->json($response);
    }

    /**
     * 删除球队
     * @param Request $request
     */
    public  function  teamDel(Request $request){
        $team_id=$request->input("team_id");
        $where=[
            'team_id'=>$team_id
        ];
        $player=PlayerModel::where($where)->first();
        if(!empty($player)){
            $font="对不起，该球队尚且有球员不能删除";
            return $this->fail($font);

        }else{
            echo "可以删除";
        }

        //var_dump($team_id);die;
    }

    /**
     * 球队修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  teamUpdate(Request $request){
        if($request->ajax() && $request->post()){
            //修改
            $team_id=$request->input("team_id");
            $team_name=$request->input("team_name");
            $team_partition=$request->input("team_partition");
            $team_coach=$request->input("team_coach");
            $team_venue=$request->input("team_venue");
            $team_city=$request->input("team_city");
            $team_win=$request->input("team_win");
            $team_fail=$request->input("team_fail");
            $team_rank=$request->input("team_rank");
            $team_content=$request->input("team_content");
            $team_image=$request->input('team_images');
            $data=[
                'team_name'=>$team_name,
                'team_partition'=>$team_partition,
                'team_coach'=>$team_coach,
                'team_venue'=>$team_venue,
                'team_city'=>$team_city,
                'team_win'=>$team_win,
                'team_fail'=>$team_fail,
                'team_rank'=>$team_rank,
                'team_content'=>$team_content,
                'team_image'=>$team_image
            ];
            $where=[
                'team_id'=>$team_id
            ];
            $res=TeamModel::where($where)->update($data);
            if($res===false){
                $font="修改失败";
                return $this->fail($font);
            }else{
                $font="修改成功";
                return $this->success($font);
            }

        }else{
           //展示页面
           // $page=$request->input("page");
            //var_dump($page);die;
            $team_id=$request->input("team_id");
            $id=TeamModel::where(['team_id'=>$team_id])->value("team_id");
            if(empty($id)){
                return view("error.404");
            }else{
                $teamList=TeamModel::where(['team_id'=>$team_id])->first()->toArray();
                $data=[
                    'data'=>$teamList,
                  //  'page'=>$page
                ];
                //print_r($data);die;
                return view('admin.team.update',$data);
            }

        }
    }
}
