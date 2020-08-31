<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//前台
//Route::get('/', function () {
//    return view('welcome');
//
//});//首页
//Route::get('/player/{id}','Player\PlayerController@index');

//Route::get('/paiming', function () {
//    return view('index.paiming');
//});//排名
//前台管理
//Route::get('/',"Index\IndexController@index");
/**
* 项目前台
*/
Route::get('/',"Index\IndexController@index");//项目首页
//视频播放
Route::prefix('/video')->group(function (){
    Route::any('/play','Index\Video\VideoController@index');
});
/**
 * 项目后台
 */
//Route::get('/admin',"Admin\AdminController@index");
Route::any("/admin","Admin\AdminController@index");//后台登录页
Route::any('/admin/logins','Admin\AdminController@adminLogin');//后台登录
Route::any('/admin/out','Admin\AdminController@out');//退出
//管理操作
Route::prefix("/admin")->group(function (){
   //Route::any("/index","Admin\AdminController@index");//后台首页
   Route::any("/welcome","Admin\IndexController@welcome");//后台首页
   Route::get("/index","Admin\IndexController@index")->middleware('checkLogin');
   Route::any("/weibo","Admin\AdminController@wbLogin");
   Route::any('/add','Admin\AdminController@adminAdd')->middleware('checkLogin');
   Route::any('/upload','Admin\AdminController@upload')->middleware('checkLogin');
   Route::get('/show','Admin\AdminController@adminShow')->middleware('checkLogin');
   Route::any('/list','Admin\AdminController@adminList')->middleware('checkLogin');
   Route::any('/del','Admin\AdminController@adminDel')->middleware('checkLogin');
   Route::any('/update','Admin\AdminController@adminUpdate')->middleware('checkLogin');
   Route::any('/confirm','Admin\AdminController@adminConfirm')->middleware('checkLogin');
   Route::any('/personal','Admin\AdminController@personal')->middleware('checkLogin');
});
Route::any("/WbCallback",'Admin\AdminController@WbCallback');//微博登录回调
//球员
Route::prefix("/player")->middleware('checkLogin')->group(function (){
    Route::any('/add',"Player\PlayerController@playerAdd");
    Route::any('/upload','Player\PlayerController@upload');
    Route::post('/draft','Player\PlayerController@draft');
    Route::get('/show','Player\PlayerController@playerShow');
    Route::any('/list','Player\PlayerController@playerList');
    Route::any('/del','Player\PlayerController@playerDel');
    Route::any('/update','Player\PlayerController@playerUpdate');
});
//球队
Route::prefix("/team")->middleware('checkLogin')->group(function (){
    Route::any('/add',"Team\TeamController@teamAdd");
    Route::get("/show","Team\TeamController@teamShow");
    Route::any("/list","Team\TeamController@teamList");
    Route::any("/del","Team\TeamController@teamDel");
    Route::any("/update","Team\TeamController@teamUpdate");
    Route::any("/upload","Team\TeamController@teamUpload");
});
//角色
Route::prefix("/role")->middleware('checkLogin')->group(function (){
    Route::any('/add',"Role\RoleController@roleAdd");
    Route::any('/show',"Role\RoleController@roleShow");
    Route::any('/list',"Role\RoleController@roleList");
    Route::any('/update','Role\RoleController@roleUpdate');
    Route::any('/del','Role\RoleController@roleDel');

});
//节点
Route::prefix("/node")->middleware('checkLogin')->group(function (){
    Route::any('/show',"Node\NodeController@nodeShow");
    Route::any('/add', "Node\NodeController@nodeAdd");
    Route::any('/list', "Node\NodeController@nodeList");
    Route::any('/del',  "Node\NodeController@nodeDel");
    Route::any('/update',  "Node\NodeController@nodeUpdate");
});
//首页管理
Route::prefix("/banner")->middleware('checkLogin')->group(function (){
    Route::any('/show',"Admin\Banner\BannerController@bannerShow");
    Route::any('/add', "Node\NodeController@nodeAdd");
    Route::any('/list', "Admin\Banner\BannerController@bannerList");
    Route::any('/del',  "Node\NodeController@nodeDel");
    Route::any('/update',  "Node\NodeController@nodeUpdate");
});
Route::get('/admin/test',"Admin\AdminController@test");
//球员名人堂
//科比专题



