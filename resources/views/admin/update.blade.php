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
        <input type="hidden" name="admin_id" id="admin_id" value="{{$data['admin_id']}}">
        <div class="layui-form-item" >
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" value="{{$data['admin_name']}}" style="width:300px" name="admin_name"  required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">出生日期</label>
            <div class="layui-input-block">
                <input type="text" name="admin_age" id="date" autocomplete="off"class="layui-input" style="width:100px" value="{{$data['admin_age']}}">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">权限</label>
            <div class="layui-input-block" style="width: 300px">
                <select name="role_id" lay-verify="required" >
                    <option value="">--请选择--</option>
                    @foreach($role as $k=>$v)
                        @if($admin_role->role_id==$v->role_id)
                        <option value="{{$v->role_id}}" selected>{{$v->role_name}}</option>
                        @else
                            <option value="{{$v->role_id}}" >{{$v->role_name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <div class="layui-input-block">
                <button class="layui-btn" lay-submit lay-filter="formDemo">立即修改</button>
                <button type="reset" class="layui-btn layui-btn-primary">重置</button>
            </div>
        </div>
    </form>


    <script>
        $(function(){
            layui.use(['form','layer','laydate'], function(){
                var form = layui.form;
                var layer=layui.layer;
                var laydate=layui.laydate;
                //执行一个laydate实例
                laydate.render({
                    elem: '#date' //指定元素
                });
                //console.log(page)
                //监听提交
                form.on("submit(formDemo)",function(data){
                    var admin_id=$("#admin_id").val()
                    $.post(
                        "{{url('/admin/update')}}",
                        data.field,
                        function(msg){
                            layer.msg(msg.msg, {icon:msg.code});
                            if(msg.code==1){
                                layer.msg("修改成功", {icon: 1,time:1500,shade:0.3}, function () {
                                    // 获得frame索引
                                    var index = parent.layer.getFrameIndex(window.name);
                                    //关闭当前frame
                                    parent.layer.close(index);
                                    //修改成功后刷新父界面
                                    window.parent.location.reload();
                                });
                            }

                        },
                        'json'
                    )
                    // layer.prompt({
                    //     formType: 1,
                    //     value: '',
                    //     title: '请输入密码',
                    //     area: ['100px', '20px'] //自定义文本域宽高
                    // }, function(value, index, elem){
                    //     $.post(
                    //         '/admin/confirm',
                    //         {admin_pwd:value,admin_id:admin_id},
                    //         function (msg) {
                    //             console.log(msg)
                    //         },
                    //         'json'
                    //     )
                    //     layer.close(index);
                    // });
                    return false;
                });
            });
        })
    </script>
</body>
</html>
