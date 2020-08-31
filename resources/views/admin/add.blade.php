<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <script src="{{URL::asset('/js/jquery-1.9.1.min.js')}}"></script>
{{--    <link rel="stylesheet" href="{{URL::asset('/layui/css/layui.css')}}">--}}
<!--layui样式和js开始-->
    <link rel="stylesheet" href="{{URL::asset('/admin/layui/css/font.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/admin/layui/css/xadmin.css')}}">
    <script src="{{URL::asset('/admin/layui/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{URL::asset('/admin/layui/js/xadmin.js')}}"></script>
{{--    <script src="{{URL::asset('/layui/layui.js')}}"></script>--}}
<!--layui样式和js结束-->
    <style>
        .t_title {
            height: 65px;
            font-size: 20px;
            display: block;
            /*padding: 10px;*/
            text-align: left;
        }
    </style>
</head>
<body>
    <form class="layui-form" action="">
        <div class="layui-form-item" >
            <label class="layui-form-label">管理员姓名</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="admin_name" required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">管理员密码</label>
            <div class="layui-input-block">
                <input type="password" style="width:300px" name="admin_pwd" required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">出生日期</label>
            <div class="layui-input-block">
                <input type="text" name="admin_age" id="date" autocomplete="off" class="layui-input" style="width:100px">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">头像</label>
            <div class="layui-input-block" >
                <input type="hidden"  name="admin_img" id="admin_img">
                <button type="button" name="img" class="layui-btn" id="test1">
                    <i class="layui-icon">&#xe67c;</i>上传图片
                </button>
            </div>
            <div class="layui-hide" id="uploadDemoView" style="padding-left: 50px">
                <hr>
                <img src="" alt="上传成功后渲染" style="max-width: 100%">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">权限</label>
            <div class="layui-input-block" style="width: 300px">
                <select name="role_id" lay-verify="required" >
                    <option value="">--请选择--</option>
                    @foreach($role as $k=>$v)
                        <option value="{{$v->role_id}}">{{$v->role_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>

    <script>
        $(function(){
            layui.use(['form','layer','upload','laydate'], function(){
                var form = layui.form;
                var layer=layui.layer;
                var upload=layui.upload
                var laydate=layui.laydate
                //执行一个laydate实例
                laydate.render({
                    elem: '#date' //指定元素
                });
                //上传图片
                var uploadInst = upload.render({
                    elem: '#test1' //绑定元素
                    ,url: '/admin/upload' //上传接口
                    ,done: function(res){
                        //上传完毕回调
                        layer.msg(res.msg,{icon:res.code})
                        if(res.code==1){
                            $("#admin_img").val(res.src)
                            layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.url);
                        }
                    }
                    ,error: function(){
                        //请求异常回调
                    }
                });
                //监听提交
                form.on("submit(formDemo)",function(data){
                    $.post(
                        "/admin/add",
                        data.field,
                        function(msg){
                             //console.log(msg)
                            // layer.msg(msg.msg, {icon:msg.code});
                            // if(msg.code==1){
                            //     layer.confirm('添加成功，是否进入展示页面', {
                            //         btn: ['确定', '取消'] //可以无限个按钮
                            //
                            //     }, function(index, layero){
                            //         location.href="/admin/show"
                            //     }, function(index){
                            //         location.href="/admin/add"
                            //     });
                            // }
                            layer.msg("添加成功", {icon: 1,time:1500,shade:0.3}, function () {
                                // 获得frame索引
                                var index = parent.layer.getFrameIndex(window.name);
                                //关闭当前frame
                                parent.layer.close(index);
                                //修改成功后刷新父界面
                                window.parent.location.reload();
                            });
                        },
                        'json'
                    )

                    return false;
                });
            });
        })
    </script>
</body>
</html>

