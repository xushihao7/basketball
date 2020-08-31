<?php
  namespace App\Http\Controllers\Role;
  use App\Http\Controllers\Controller;
  use App\Model\NodeModel;
  use App\Model\RoleModel;
  use App\Model\RoleNodeModel;
  use Illuminate\Database\Eloquent\Model;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\App;
  use Illuminate\Support\Facades\DB;

  class RoleController extends Controller{
      /**
       * 角色添加
       * @param Request $request
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
       */
       public  function  roleAdd(Request $request){
           if($request->ajax()&& $request->post()){
               $data=$request->input();
               $where=[
                   'role_name'=>$data['role_name'],
                   'create_time'=>time()
               ];
               $role_name=RoleModel::where($where)->value('role_name');
               if(!empty($role_name)){
                   $this->fail('该角色已经存在');
               }
               DB::beginTransaction();
               try{
                  $role_id=RoleModel::insertGetId(['role_name'=>$data['role_name']]);
                  if(empty($role_id)){
                      DB::rollBack();
                      throw  new \Exception('角色表添加失败');
                  }
                  foreach ($data['node_id'] as $k=>$v){
                      $data=[
                         'role_id'=>$role_id,
                         'node_id'=>$v
                     ];
                     $role_node=RoleNodeModel::insert($data);
                  }
                  if(!$role_node){
                      DB::rollBack();
                      throw  new \Exception('角色权限表添加失败');
                  }
                  DB::commit();
                  $this->success('添加成功');

               }catch (\Exception $e){
                   $msg=$e->getMessage();
                   $this->fail($msg);
               }

           }else{
               $nodeInfo=NodeModel::get()->toArray();
               $model=new  RoleModel();
               $data=$model->getNodeInfo($nodeInfo);
               return view('admin.role.add',['data'=>$data]);
           }
       }

      /**
       * 角色展示页面
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
       */
       public function  roleShow(){
           $count=RoleModel::count();
           return view('admin.role.list',['count'=>$count]);
       }

      /**
       * 角色展示页面数据
       * @param Request $request
       */
       public  function  roleList(Request $request){
           $page=$request->input('page');
           $limit=$request->input('limit');
           $roleList=RoleModel::offset(($page-1)*$limit)->limit($limit)->get();
           $count=RoleModel::count();
           $data=[
               'code'=>0,
               'data'=>$roleList,
               'count'=>$count,
               'msg'=>''
           ];
           $this->json($data);

       }

      /**
       * 角色赋予权限
       * @param Request $request
       * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
       */
       public  function  roleUpdate(Request $request){
           if($request->post() && $request->ajax()){
                 $data=$request->input();
                 $role_id=$request->input('role_id');
                 DB::beginTransaction();
                 try{
                       //角色表的修改
                       $role=RoleModel::where(['role_id'=>$role_id])->update(['role_name'=>$data['role_name']]);
                       if($role===false){
                           DB::rollBack();
                           throw  new \Exception('角色表修改失败');
                       }
                       //角色权限表的修改  //先删除 再添加

                       RoleNodeModel::where(['role_id'=>$role_id])->delete();
                       //var_dump($role_node);
                       foreach ($data['node_id'] as $k=>$v){
                        $data=[
                            'role_id'=>$role_id,
                            'node_id'=>$v
                        ];
                        $res=RoleNodeModel::insert($data);
                       }
                       if(!$res){
                           DB::rollBack();
                           throw  new \Exception('角色权添加失败');
                       }
                       DB::commit();
                       $this->success('添加成功');


                 }catch (\Exception $e){
                     $msg=$e->getMessage();
                     $this->fail($msg);
                 }
           }else{
               $role_id=$request->input('role_id');
               //echo $role_id;die;
               if(empty($role_id)){
                   $this->fail('非法操作');
               }
               $roleInfo=RoleModel::where(['role_id'=>$role_id])->first()->toArray();
               if(empty($roleInfo)){
                   $this->fail('管理员不存在');
               }
               //获取当前角色的的节点
               $nodeInfo=RoleNodeModel::where(['role_id'=>$role_id])->get()->toArray();
               $nodeData=[];
               foreach ($nodeInfo as $k=>$v){
                   $nodeData[]=$v['node_id'];
               }
               //获取所有节点
               $nodeAllinfo=NodeModel::get()->toArray();
               $model=new RoleModel();
               $nodeAllData=$model->getNodeInfo($nodeAllinfo);
               $data=[
                   'roleInfo'=>$roleInfo,
                   'nodeData'=>$nodeData,
                   'nodeAllData'=>$nodeAllData
               ];
               return view('admin.role.update',$data);


           }
       }

      /**
       * 角色删除
       * @param Request $request
       */
       public function  roleDel(Request $request){
           $role_id=$request->input('role_id');
           if(empty($role_id)){
               $this->fail('非法操作');
           }
           $admin_id=RoleModel::where(['role_id'=>$role_id])->value('role_id');
           //dd($admin);die;
           if($admin_id==1){
               $this->fail('超级管理员无法删除');
           }
           DB::beginTransaction();
           try{
               //删除角色表中的数据
               $res=RoleModel::where(['role_id'=>$role_id])->delete();
               //var_dump($res);die;
               if(!$res){
                   DB::rollBack();
                   throw  new \Exception('删除角色表失败');
               }
               //删除角色权限表中的数据
               $res=RoleNodeModel::where(['role_id'=>$role_id])->delete();
               if(!$res){
                   throw  new \Exception('删除角色权限表失败');
               }
               DB::commit();
               $this->success('删除成功');
           }catch (\Exception $e){
               $msg=$e->getMessage();
               $this->fail($msg);
           }

       }

  }
