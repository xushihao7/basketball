<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>注册界面</title>
    <link rel="stylesheet" href="{{URL::asset('/login/css/reset.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/login/css/common.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('/login/css/font-awesome.min.css')}}" />
</head>
<body>
<div class="wrap login_wrap">
    <div class="content">

        <div class="logo"></div>

        <div class="login_box">

            <div class="login_form">
                <div class="login_title">
                    注册
                </div>
                <form action="" method="">

                    <div class="form_text_ipt">
                        <input name="username" type="text" placeholder="账号/邮箱">
                    </div>
                    <div class="ececk_warning"><span>账号/邮箱不能为空</span></div>
                    <div class="form_text_ipt">
                        <input name="password" type="password" placeholder="密码">
                    </div>
                    <div class="ececk_warning"><span>密码不能为空</span></div>
                    <div class="form_text_ipt">
                        <input name="repassword" type="password" placeholder="重复密码">
                    </div>
                    <div class="ececk_warning"><span>密码不能为空</span></div>


                    <div class="form_btn">
                        <button type="button" name="register">注册</button>
                    </div>
                    <div class="form_reg_btn">
                        <span>已有帐号？</span><a href="/">马上登录</a>
                    </div>
                </form>
                <div class="other_login">
                    <div class="left other_left">
                        <span>其它登录方式</span>
                    </div>
                    <div class="right other_right">
                        <a href="#"><i class="fa fa-qq fa-2x"></i></a>
                        <a href="#"><i class="fa fa-weixin fa-2x"></i></a>
                        <a href="#"><i class="fa fa-weibo fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{URL::asset('/login/js/jquery.min.js')}}" ></script>
<script type="text/javascript" src="{{URL::asset('/login/js/common.js')}}" ></script>
<script type="text/javascript " src="{{URL::asset('/layui/layui.js')}}"></script>
</body>
</html>
<script>
    $(function () {
       layui.use(['layer'],function () {
           var layer=layui.layer
           $("[name='register']").click(function (){
               var username=$("[name='username']").val()
               var password=$("[name='password']").val()
               var repassword=$("[name='repassword']").val()
               if(password==repassword){
                   $.post(
                       '/index/register',
                       {username:username,password:password,repassword:repassword},
                       function (data) {
                          if(data.code==1){
                              layer.msg(data.msg,{icon:data.code})
                              location.href="/"
                          }else{
                              layer.msg(data.msg,{icon:data.code})
                          }
                       },
                       'json'
                   )
               }else{
                   layer.alert('密码和确认密码不一致，请重新输入', {icon: 2});
               }
           })
       })
    })
</script>
