<?php

namespace App\Http\Controllers\Node;

use App\Http\Controllers\Controller;
use App\Model\NodeModel;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    //
    /**
     * 节点展示
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  nodeShow(Request $request){
        return view('admin.node.list');
    }

    /**
     * 节点添加
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function nodeAdd(Request $request){
          if($request->ajax()&& $request->post()){
               $node_name=$request->input('node_name');
               $node_icon=$request->input('node_icon');
               $default_icon=$request->input('default_icon');
               $controller=$request->input('controller');
               $action=$request->input('action');
               $is_show=$request->input('is_show');
               $pid=$request->input('pid');
               $node=NodeModel::where(['node_name'=>$node_name])->first();
               if(!empty($node)){
                   $this->fail('请勿重复添加');
               }
               $data=[
                   'node_name'=>$node_name,
                   'node_icon'=>$node_icon,
                   'default_icon'=>$default_icon,
                   'controller'=>$controller,
                   'action'=>$action,
                   'pid'=>$pid,
                   'is_show'=>$is_show
               ];
               $result=NodeModel::insert($data);
               if($result){
                   $this->success('添加成功');
               }else{
                   $this->fail('添加失败');
               }
          }else{
             $nodeInfo=NodeModel::where(['pid'=>0])->get();
             $data=[
                'nodeData'=>$nodeInfo
             ];
             return view('admin.node.add',$data);
          }
    }

    /**
     * 节点数据列表
     * @param Request $request
     */
    public function nodeList(Request $request){
          $nodeInfo=NodeModel::get()->toArray();
          $nodeData=$this->getNodeInfo($nodeInfo);
          foreach ($nodeData as $k=>$v){
             if($v['is_show']==1){
                 $nodeData[$k]['is_show']="是";
             }else{
                 $nodeData[$k]['is_show']="否";
             }
          }
          //echo "<pre>";print_r($nodeData);echo "<pre/>";die;
          $data=[
              'code'=>0,
              'msg'=>'',
              'data'=>$nodeData
          ];
          $this->json($data);
    }

    /**
     * 节点删除
     * @param Request $request
     */
    public  function  nodeDel(Request $request){
        $node_id=$request->input('node_id');
        if(empty($node_id)){
            $this->fail('非法操作');
        }
        $count=NodeModel::where(['pid'=>$node_id])->count();
        if($count>0){
            $this->fail('请先删除对应的子节点');
        }
        $node=NodeModel::where(['node_id'=>$node_id])->delete();
        if($node){
            $this->success('删除成功');
        }else{
            $this->fail("删除失败");
        }

    }

    /**
     * 节点修改
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  nodeUpdate(Request $request){
        if($request->ajax() && $request->post()){
              $node_id=$request->input('node_id');
              $node_name=$request->input('node_name');
              $node_icon=$request->input('node_icon');
              $default_icon=$request->input('default_icon');
              $controller=$request->input('controller');
              $action=$request->input('action');
              $pid=$request->input('pid');
              $is_show=$request->input('is_show');
              $data=[
                'node_name'=>$node_name,
                'node_icon'=>$node_icon,
                'default_icon'=>$default_icon,
                'controller'=>$controller,
                'action'=>$action,
                'pid'=>$pid,
                'is_show'=>$is_show
              ];
              $result=NodeModel::where(['node_id'=>$node_id])->update($data);
              if($result===false){
                  $this->fail('修改失败');
              }else{
                  $this->success('修改成功');
              }
        }else{
            $node_id=$request->input('node_id');
            $nodeInfo=NodeModel::where(['node_id'=>$node_id])->first();
            $data=NodeModel::get()->toArray();
            $info=$this->getNodeInfo($data);
            $data=[
                'info'=>$info,
                'data'=>$nodeInfo
            ];
            return view('admin.node.update',$data);

        }
    }

    /**
     * 递归获取节点信息
     * @param $data
     * @param int $pid
     * @param int $level
     * @return array
     */
    public function getNodeInfo($data,$pid=0,$level=0){
         static  $info=[];
         foreach ($data as $k=>$v){
            if($v['pid']==$pid){
                $v['level']=$level;
                $info[]=$v;
                $this->getNodeInfo($data,$v['node_id'],$v['level']+1);
            }
         }
         return $info;
    }




}
