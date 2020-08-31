<?php
namespace App\Http\Controllers\Index;
use App\Http\Controllers\Controller;

class   IndexController extends   Controller{
    public  function  index(){
        return view('index.index');
    }
    /**
     * 注册
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function  register(Request $request){
        if($request->ajax() && $request->post()){
            $username=$request->input('username');
            $password=$request->input('password');
            $repassword=$request->input('repassword');
            if($password!=$repassword){
                $this->fail("确认密码和密码不一致，请重新输入");
            }
            if(strpos($username,"@")){
                if($this->checkEmail($username)){
                    $this->fail('邮箱格式错误，请重新输入');
                }else{
                    $res=AdminModel::where(['admin_email'=>$username])->first();
                    if(!empty($res)){
                        $this->fail('该邮箱已经注册过，请重新输入');
                    }
                    $data=[
                        'admin_email'=>$username,
                        'admin_pwd'=>md5($password),
                        'last_login_time'=>time()
                    ];
                    $admin_id=AdminModel::insertGetId($data);
                    if($admin_id){
                        $data=[
                            'admin_id'=>$admin_id,
                            'username'=>$username
                        ];
                        $request->session()->put('slogin',$data);
                        //$str=implode(',',$data);
                        Cookie::queue('username',$username,3600*24);
                        Cookie::queue('admin_id',$admin_id,3600*24);
                        Cookie::queue('login_time',date('Y-m-d H:i:s',time()),3600*24);
                        $this->success('注册成功');
                    }else{
                        $this->fail('注册失败');
                    }
                };
            }else{
                $res=AdminModel::where(['admin_name'=>$username])->first();
                if(!empty($res)){
                    $this->fail('该用户名已经存在，请重新输入');
                }
                $data=[
                    'admin_name'=>$username,
                    'admin_pwd'=>md5($password),
                    'last_login_time'=>time()
                ];
                $admin_id=AdminModel::inserGetId($data);
                $data=[
                    'admin_id'=>$admin_id,
                    'username'=>$username
                ];
                $request->session()->put('slogin',$data);
                //$str=implode(',',$data);
                Cookie::queue('username',$username,3600);
                Cookie::queue('admin_id',$admin_id,3600);
                Cookie::queue('login_time',date('Y-m-d H:i:s',time()),3600*24);
                if(!$admin_id){
                    $this->fail('注册失败');
                }else{
                    $this->success('注册成功');
                }
            }

        }else{
            return view("admin.register");
        }

    }

    /**
     * 普通登录 错误超过5次会被锁定
     * @param Request $request
     */
    public function  login(Request $request){
        $data=$request->input();
        //var_dump($data);die;
        //判断是否是邮箱还是手机号登陆
        $username=$data['username'];
        $num=substr_count($username,"@");
        if($num>0 && !is_numeric($username)){
            //邮箱登陆
            $where=[
                'admin_email'=>$username,
            ];
        }else{
            //账号登陆
            $where=[
                'admin_name'=>$username,
            ];
        }
        $info=AdminModel::where($where)->first();
        $error_num=$info['error_num'];
        $admin_id=$info['admin_id'];
        $where=[
            'admin_id'=>$admin_id
        ];
        $time=time();
        $last_error_time=$info['last_error_time'];
        $second=60-ceil(($time-$last_error_time)/60);
        if(!empty($info)){
            if(md5($data['password'])==$info['admin_pwd']){
                if($error_num>=5 && $time-$last_error_time<3600){
                    $this->fail("您的账号被锁定，还有".$second."分钟解封");
                }
                $update=[
                    'error_num'=>0,
                    'last_error_time'=>null
                ];
                AdminModel::where($where)->update($update);
                $admin_img=AdminModel::where($where)->value('admin_img');
                //存储用户sessiom信息
                $data=[
                    'admin_id'=>$admin_id,
                    'username'=>$username
                ];
                $request->session()->put('slogin',$data);
                //$str=implode(',',$data);
                Cookie::queue('username',$username,3600*24);//用户名
                Cookie::queue('admin_id',$admin_id,3600*24);//id
                Cookie::queue('admin_img',$admin_img,3600*24);//图片
                AdminModel::where($where)->update(['last_login_time'=>time()]);
                Cookie::queue('login_time',date('Y-m-d H:i:s',time()),3600*24);
                $this->success('登录成功');
                /**
                 * 7天免登陆
                 */
                if($request->input("remeber_me")=="true")
                {
                    $data=[
                        'username'=>$username,
                        'admin_pwd'=>$request->input('admin_pwd')
                    ];
                    $str=implode(',',$data);
                    $day=3600*24*7;
                    Cookie::queue('remeber',$str,$day);
                };

            }else{
                //当前时间大于最后错误时间1小时
                if($time-$last_error_time>3600){
                    $update=[
                        'error_num'=>1,
                        'last_error_time'=>$time
                    ];
                    $res=AdminModel::where($where)->update($update);
                    if($res){
                        $this->fail('密码错误，您还有4次输入的机会');
                    }
                }else{
                    if($error_num>=5){
                        $this->fail('密码输入超过5次，账号已经被锁定');
                    }else{
                        $num=$error_num+1;
                        $update=[
                            'error_num'=>$num,
                            'last_error_time'=>$time
                        ];
                        $res=AdminModel::where($where)->update($update);
                        if($num==5){
                            $this->fail('您输错密码超过5次账号被锁定');
                        }else{
                            $this->fail("账号或者密码错误。您还有".(5-$num)."次输入的机会");
                        }
                    }
                }


            }
        }else{
            $this->failed('账号或者密码错误',1000);
        }




    }
    /**
     * 微博登录
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public  function  wbLogin(){
        $this->WB_APP_SECRET=env("WB_APP_SECRET");
        $this->WB_APP_KEY=env("WB_APP_KEY");
        $object=new SaeTOAuthV2($this->WB_APP_KEY,$this->WB_APP_SECRET);
        $url=env("WB_CALLBACK_URL");
        $auth=$object->getAuthorizeURL($url);
        return redirect($auth);
    }
    //微博登录回调
    public  function  WbCallback(Request $request){
        $code=$request->input("code");
        $object=new SaeTOAuthV2($this->WB_APP_KEY,$this->WB_APP_SECRET);
        $keys['code']=$code;
        $url=env("WB_CALLBACK_URL");
        $keys['redirect_uri']=$url;
        //var_dump($keys);die;
        $access_token=$object->getAccessToken($keys);
        var_dump($access_token);
    }

}