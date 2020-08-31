<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>后台管理系统</title>
    <script src="{{URL::asset('/js/jquery-1.9.1.min.js')}}"></script>
<!--layui样式和js开始-->
    <link rel="stylesheet" href="{{URL::asset('/admin/layui/css/font.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/admin/layui/css/xadmin.css')}}">
    <script src="{{URL::asset('/admin/layui/lib/layui/layui.js')}}" charset="utf-8"></script>
    <script type="text/javascript" src="{{URL::asset('/admin/layui/js/xadmin.js')}}"></script>

</head>
<body>
<form class="layui-form" action="">
        <div class="layui-form-item" >
            <label class="layui-form-label">节点名称</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="node_name" required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">节点图标</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="node_icon"  autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">是否启用扩展图标</label>
            <div class="layui-input-block">
                <input type="radio" name="default_icon" value="1" title="是" >
                <input type="radio" name="default_icon" value="0" title="否" checked="">
            </div>
        </div>

        <div class="layui-form-item" >
            <label class="layui-form-label">控制器名称</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="controller" required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">方法名称</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="action"  autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">父节点</label>
            <div class="layui-input-block" style="width: 300px">
                <select name="pid" lay-verify="required" >
                    <option value="0">主菜单</option>
                    @foreach($nodeData as $k=>$v)
                        <option value="{{$v['node_id']}}">{{$v['node_name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">是否展示</label>
            <div class="layui-input-inline">
                <input type="radio"  name="is_show"  value="1" title="是" lay-filter="active" >
                <input type="radio"  name="is_show"  value="0" title="否" lay-filter="retire" checked>
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
            layui.use(['form','layer'], function(){
                var form = layui.form;
                var layer=layui.layer;
                //监听提交
                form.on("submit(formDemo)",function(data){
                    ///console.log(data.field)
                    $.post(
                        "/node/add",
                        data.field,
                        function(msg){

                            if(msg.code==1){
                                // layer.confirm('添加成功，是否进入展示页面', {
                                //     btn: ['确定', '取消'] //可以无限个按钮
                                //
                                // }, function(index, layero){
                                //     location.href="/node/show"
                                // }, function(index){
                                //     location.href="/node/add"
                                // });
                                layer.msg("添加成功", {icon: 1,time:1500,shade:0.3}, function () {
                                    // 获得frame索引
                                    var index = parent.layer.getFrameIndex(window.name);
                                    //关闭当前frame
                                    parent.layer.close(index);
                                    //修改成功后刷新父界面
                                    window.parent.location.reload();
                                });
                            }else{
                                layer.msg(msg.msg, {icon:msg.code});
                            }
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
