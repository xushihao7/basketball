<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\AdminModel;
use App\Model\AdminRoleModel;
use App\Model\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SaeTOAuthV2;
use Illuminate\Support\Facades\Cookie;
class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View  后台首页
     */
    protected  $WB_APP_KEY;
    protected  $WB_APP_SECRET;
    //首页登录页面
    public function  index(Request $request){
        //echo phpinfo();die;
        return view('admin.login');
    }
    /**
     * 后台登录
     * @param Request $request
     */
    public  function adminLogin(Request $request){
        $admin_name=$request->input('username');
        $admin_pwd=$request->input('password');
        $code=$request->input('code');
        $checkCode=$request->input('codecheck');
        if(strtolower($code)!=strtolower($checkCode)){
            $this->fail('验证码输入错误');
        }else{
            $where=[
                'admin_name'=>$admin_name,
                'admin_pwd'=>md5($admin_pwd),
                'admin_status'=>1
            ];
            $res=AdminModel::where($where)->first();
            //dump($res);die;
            if(empty($res)){
                $this->fail('账号或者密码错误');
            }else{
                //存储用户信息
                //存储用户sessiom信息
                $data=[
                    'admin_id'=>$res->admin_id,
                    'username'=>$admin_name
                ];
                $request->session()->put('slogin',$data);
                //$str=implode(',',$data);
                //存储相关cookie
                Cookie::queue('username',$admin_name,3600*24);//用户名
                Cookie::queue('admin_id',$res->admin_id,3600*24);//id
                Cookie::queue('admin_img',$res->admin_img,3600*24);//图片
                AdminModel::where(['admin_id'=>$res->admin_id])->update(['last_login_time'=>time()]);
                Cookie::queue('login_time',date('Y-m-d H:i:s',time()),3600*24);
               $this->success('登录成功');
            }
        }

    }


    /**
     * 账号退出 清除cookie
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function out(){
       Cookie::queue(Cookie::forget('admin_id'));
       Cookie::queue(Cookie::forget('username'));
       Cookie::queue(Cookie::forget('admin_img'));
       Cookie::queue(Cookie::forget('login_time'));
       $data=[
           'msg'=>'退出成功',
           'url'=>'/admin'
       ];
       return view('errors.jump',$data);
    }

    /**
     * 上传图片
     * @param Request $request
     */
    public  function  upload(Request $request){
            $file=$request->file("file");
            $ext=$file->getClientOriginalExtension();
            $date=date("Y")."/".date('m').'/'.date('d');
            $new_file_name = date('YmdHis') .'admin' .'.'.mt_rand(1000,9999) . $ext;
            $path = "upload/admin/".$date."/";
            $data=$this->imgUpload($file,$ext,$new_file_name,$path);
            $url="http://".$request->server("HTTP_HOST")."/".$data['file_path'];
                $arr=[
                    'code'=>1,
                    "msg"=>"上传成功",
                    'url'=>$url,
                    'src'=>$data['file_path']
                ];
                //print_r($arr);die;
                echo json_encode($arr);


        }

    //管理员添加
    public  function  adminAdd(Request $request){
        if($request->post()&&$request->ajax()){
            $admin_name=$request->input('admin_name');
            $admin_pwd=$request->input('admin_pwd');
            $admin_age=strtotime($request->input('admin_age'));
            $admin_img=$request->input('admin_img');
            $role_id=$request->input('role_id');
            $res=AdminModel::where(['admin_name'=>$admin_name])->first();
            if(!empty($res)){
                $this->fail('请勿重复添加');
            }
            $data=[
                'admin_name' =>$admin_name,
                'admin_pwd'  =>md5($admin_pwd),
                'admin_age'  =>$admin_age,
                'admin_img'  =>$admin_img,
                'create_time'=>time()
            ];
            $admin_id=AdminModel::insertGetId($data);
            //添加管理员角色表
            $admin_role=AdminRoleModel::insert(['admin_id'=>$admin_id,'role_id'=>$role_id]);
            if($admin_role){
                $this->success('添加成功');
            }else{
                $this->fail('添加失败');
            }

        }else{
            $role=RoleModel::get();
            return view('admin.add',['role'=>$role]);
        }

    }
    //管理员列表
    public  function  adminShow(){
        return view('admin.list');
    }
    //个人信息页面
    public function  personal(){
        return view('admin.personal');
    }
    //管理员列表详细
    public  function  adminList(Request $request){
       $page=$request->input('page');
       $limit=$request->input('limit');
//        $data=AdminModel::where(['admin_status'=>1])
//            ->offset(($page-1)*$limit)
//            ->limit($limit)
//            ->get();
        $data=DB::table('nba_admin as na')
            ->join('admin_role as ar','na.admin_id','=','ar.admin_id')
            ->join('nba_role as rn','rn.role_id','=','ar.role_id')
            ->select('rn.role_name','na.admin_id','na.admin_name','na.admin_img','na.admin_age')
            ->where(['admin_status'=>1])
            ->orderBy('admin_id','asc')
            ->offset(($page-1)*$limit)
            ->limit($limit)
            ->get();
        $data=$this->objectToArray($data);
        //var_dump($data);die;
        foreach ($data as $k=>$v){
            $data[$k]['admin_age']=$this->getAge($data[$k]['admin_age']);

        }
        //var_dump($data);die;
        $count=AdminModel::where(['admin_status'=>1])->count();
        $data=[
            'code'=>0,
            'data'=>$data,
            'count'=>$count,
            'msg'=>''
        ];
        $this->json($data);


    }
    //管理员删除
    public function  adminDel(Request $request){
          $admin_id=$request->input();
          $where=[
              'admin_id'=>$admin_id
          ];
          $admininfo=AdminModel::where($where)->first();
          if(empty($admin_id) || empty($admininfo)){
              $data=[
                  'msg'=>'非法操作',
                  'url'=>'/'
              ];
              return view('error.jump',$data);
              die;
          }
          $data=[
              'admin_status'=>2
          ];
          $res=AdminModel::where($where)->update($data);
          if($res){
              $this->success('删除成功');
          }else{
              $this->fail('删除失败');
          }


    }
   //管理员修改信息
    public  function  adminUpdate(Request $request){
        $admin_id=$request->input('admin_id');
        $username=$request->input('admin_name');
        $admin_age=strtotime($request->input('admin_age'));
        $role_id=$request->input('role_id');
        $where=[
            'admin_id'=>$admin_id
        ];
        if($request->ajax()&& $request->post()){
            DB::beginTransaction();
            try{
                //修改管理员表
                $data=[
                    'admin_name'=>$username,
                    'admin_age'=>$admin_age,
                ];
                $admin=AdminModel::where($where)->update($data);
                if($admin===false){
                    throw  new  \Exception('修改管理员表失败');
                }
                //修改管理员角色表 先删除再添加
                $del=AdminRoleModel::where($where)->delete();
                //var_dump($del);die;
                $admin_role=AdminRoleModel::insert(['admin_id'=>$admin_id,'role_id'=>$role_id]);
                //var_dump($admin_role);die;
                if(!$admin_role){
                    throw  new \Exception('修改管理员角色表失败');
                }
                DB::commit();
                $this->success('修改成功');
            }catch (\Exception $e){
                $msg=$e->getMessage();
                $this->fail($msg);
            }



        }else{
            $data=AdminModel::where($where)->first()->toArray();
            $data['admin_age']=date('Y-m-d',$data['admin_age']);
            //查询所有角色信息和当前管理员拥有的角色信息
            $role=RoleModel::get();
            $admin_role=AdminRoleModel::where(['admin_id'=>$admin_id])->first();
            //var_dump($admin_role);die;
            $data=[
                'role'=>$role,
                'data'=>$data,
                'admin_role'=>$admin_role
            ];
            return view('admin.update',$data);
        }
    }

    /**
     * @param Request $request 修改密码时候进行身份的验证
     */
    public  function  adminConfirm(Request $request){
        $admin_pwd=$request->input('admin_pwd');
        $admin_id=$request->input('admin_id');
        $admin_name=AdminModel::where(['admin_id'=>$admin_id])->first()->toArray();
        //print_r($admin_name);die;
        //获取当前登录的用户
        $username=Cookie::get('username');
        //echo $username;die;
        if($admin_name['admin_name']!=$username){
            $this->fail("您不是当前用户，无法修改该用户信息");
        }




    }



}
