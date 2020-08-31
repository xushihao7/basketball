<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    //
    protected  $table="nba_role";
    public     $timestamps=false;

    /**
     * 处理节点信息 父节点和子节点分离
     * @param $data
     * @param int $pid
     * @return array
     */
    function getNodeInfo($data,$pid=0){
        $nodeInfo=[];
        foreach($data as $k=>$v){
            if($v['pid']==$pid){
                $son=$this->getNodeInfo($data,$v['node_id']);
                $v['son']=$son;
                $nodeInfo[]=$v;
            }
        }
        return $nodeInfo;
    }

}
