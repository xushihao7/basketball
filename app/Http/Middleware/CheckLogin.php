<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Model\NodeModel;
use App\Model\RoleModel;
use Closure;
use function foo\func;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $cookie=Cookie::get('username');
        if(empty($cookie)){
            return  redirect('/admin');
        }
        $session=$request->session()->get('login');
        $admin_id=$request->cookie('admin_id');
        $node=$this->selectMysql($admin_id);
        $node=json_decode(json_encode($node), true);
        //判断该管理员是否拥有当前权限
            $uri = $_SERVER['REQUEST_URI'];
            //echo $uri;die;
            if(strstr($uri,'?')){
                $uri=substr($uri,0,strrpos($uri,'?'));
                //echo $uri;
            }else{
                //判断路由是否为team/update/10形式的
            $is_number_uri=is_numeric(substr($uri,strrpos($uri,'/')+1));
            //var_dump($is_number_uri);
                if($is_number_uri){
                    $uri=substr($uri,0,strrpos($uri,'/'));
                    //echo $uri;
                }
            }
            $mode=new RoleModel();
            $leftNode=$mode->getNodeInfo($node);
            //echo "<pre>";
            //print_r($leftNode);
            $len=count($leftNode);
            $new_node=[];
            for($i=0;$i<$len;$i++){
                foreach ($leftNode as $k=>$v){
                    $new_node[]="/".$v['controller']."/".$v['action'];
                }
                foreach ($leftNode[$i]['son'] as $k=>$v){
                    $new_node[]="/".$v['controller']."/".$v['action'];
                }
            }
            $new_node=array_unique($new_node);

            if(!in_array($uri,$new_node)){
                if($request->post() && $request->ajax()){
                    $arr=['msg'=>'权限不足','code'=>2];
                    echo json_encode($arr);die;
                }else{
                    $data=[
                        'status'=>403,
                        'msg'=>'非法操作',
                        'code'=>2,
                        'url'=>'/admin/content'
                    ];
                    //return response()->json($data);
                    //return back()->withErrors(['非法操作'])->withInput();
                    return response()->view('admin.forbidden',$data);
                }

            };
            //返回给左侧菜单栏展示
            view()->composer('admin.public.left', function ($view) use($admin_id) {
                $node=$this->selectMysql($admin_id,1);
//                if($admin_id==1){//超级管理员查询所有
//                  $node=NodeModel::where(['is_show'=>1])->get();
//                }
                $node=json_decode(json_encode($node), true);
                $mode=new RoleModel();
                $leftNode=$mode->getNodeInfo($node);
                $view->with('info',$leftNode);
            });

        return $next($request);
    }
    //查询数据库的操作
    public  function  selectMysql($admin_id,$is_show=""){
        if(empty($is_show)){
            $node=DB::table('nba_node as nn')
                ->join('role_node as rn','nn.node_id','=','rn.node_id')
                ->join('nba_role as nr','rn.role_id','=','nr.role_id')
                ->join('admin_role as ar','nr.role_id','=','ar.role_id')
                ->join('nba_admin as na','ar.admin_id','=','na.admin_id')
                ->where('na.admin_id','=',$admin_id)
                ->select('nn.*','rn.*','nr.*','ar.*','na.admin_id','na.admin_name')
                ->orderBy('nn.node_id','asc')
                ->get();
        }else{
            $node=DB::table('nba_node as nn')
                ->join('role_node as rn','nn.node_id','=','rn.node_id')
                ->join('nba_role as nr','rn.role_id','=','nr.role_id')
                ->join('admin_role as ar','nr.role_id','=','ar.role_id')
                ->join('nba_admin as na','ar.admin_id','=','na.admin_id')
                ->where('na.admin_id','=',$admin_id)
                ->where('nn.is_show','=',1)
                ->select('nn.*','rn.*','nr.*','ar.*','na.admin_id','na.admin_name')
                ->orderBy('nn.node_id','asc')
                ->get();
        }

        return $node;
    }

}
