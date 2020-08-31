<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    //成功提示
    public  function  success($font,$data=""){
        $arr=['msg'=>$font,'data'=>$data,'code'=>1];
        echo json_encode($arr);
    }
    public  function fail($font){
        $arr=['msg'=>$font,'code'=>2];
        echo json_encode($arr);die;
    }
    //返回给layui数据
    public  function  json($data){
        echo json_encode($data);
    }

    /**
     * 转换为数组
     * @param $object
     * @return mixed
     */
    function objectToArray($object) {
        //先编码成json字符串，再解码成数组
        return json_decode(json_encode($object), true);
    }
    /**
     * 过滤为空和null的参数
     */
    public  function  filter(array $arr){
        return array_filter($arr,function($val)use($arr){
            if($val === '' || $val === null){
                return false;
            }
            return true;
        });
    }

    /**
     * 计算年龄
     * @param $birthday
     * @return false|string
     *
     */
    function getAge($birthday){
        //格式化出生日期
        $byear=date('Y',$birthday);
        $bmonth=date('m',$birthday);
        $bday=date('d',$birthday);
        //格式化当前时间
        $tyear=date('Y');
        $tmonth=date('m');
        $tday=date('d');
        //计算年龄
        $age=$tyear-$byear;
        if($bmonth>$tmonth || $bmonth==$tmonth && $bday>$tday) {
            $age--;
        }
        return $age;
    }

    /**
     * 手机号正则验证
     * @param $tel
     */
    function checkPhone($tel){
        $check_phone="/^1[34578]{1}\d{9}$/";
        if(!preg_match($check_phone,$tel)){
            echo "手机号格式错误";
        }
    }

    /**
     * 邮箱正则验证
     * @param $email
     * @return bool
     */
    function  checkEmail($email){
        $check_email="/^[_a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/";
        if(!preg_match($check_email,$email)){
            return  false;
        }
    }

    /**
     * @param $file 上传的文件
     * @param $ext  文件后缀名
     * @param $new_file_name 新的文件名
     * @param $path   存储文件的路径
     */
    function  imgUpload($file,$ext,$new_file_name,$path){
        $name=$file->getClientOriginalName(); //原图片名称
        $image_name=substr($name,0,strrpos($name,"."));
        $allowed_extensions = ["png", "jpg", "gif"]; //允许上传的后缀
        $size=$file->getSize(); //图片大小
        if($size>1024*1024*5){
            $this->fail("上传图片过大，不能超过5M");
        }else if(!in_array($ext,$allowed_extensions)){
            $this->fail("上传的图片只能是png,jpg或者gif格式");
        }else{
            $file_path = $path . $new_file_name;
            //echo $file_path;die;
            if(file_exists($file_path)){
                $this->fail("该文件以及存在了");
            }else{
                if(!is_dir($path))
                {
                    mkdir($path,0777,true);
                }
                $file->move($path,$new_file_name);
                $data=[
                    'images_name'=>$image_name,
                    'file_path'=>$file_path
                ];
                return $data;

            }
        }

    }












}
