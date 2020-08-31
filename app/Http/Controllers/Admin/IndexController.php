<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Model\AdminModel;
use App\Model\PlayerModel;
use App\Model\RoleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //首页
   public function index(){
       return view('admin.index');
   }

    public function  welcome(){
        $username=Cookie::get('username');
        $adminInfo=AdminModel::where(['admin_name'=>$username,'admin_status'=>1])->first()->toArray();
        //操作系统
        $systemInfo['os'] = PHP_OS;
        //mysql版本
        $v = "version()";
        $systemInfo['Mysql'] = DB::select("select version()")[0]->$v;
        //laravel版本
        $laravel=app();
        $systemInfo['laravel'] = $laravel::VERSION;
        // PHP版本
        $systemInfo['phpversion'] = PHP_VERSION;
        // 最大上传文件大小
        $systemInfo['maxuploadfile'] = ini_get('upload_max_filesize');
        // 脚本运行占用最大内存
        $systemInfo['memorylimit'] = get_cfg_var("memory_limit") ? get_cfg_var("memory_limit") : '-';
        //当前的IP
        $systemInfo['REMOTE_ADDR'] = $_SERVER['REMOTE_ADDR'];
        $count['nba_player'] = PlayerModel::count();
        $count['nba_admin'] = AdminModel::count();
        $count['nba_role'] = RoleModel::count();
        $data=[
            'systemInfo'=>$systemInfo,
            'count'=>$count,
            'admin_name'=>$adminInfo['admin_name'],
            'last_login_time'=>date('Y-m-d H:i:s',$adminInfo['last_login_time'])
        ];
        return  view('admin.welcome',$data);
    }



}
