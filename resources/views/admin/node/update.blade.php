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
    <div style="padding: 15px;width:600px">
        <!-- 内容主体区域 -->
        <form class="layui-form" action="">
            <input type="hidden" value="{{$data['node_id']}}" name="node_id">
            <div class="layui-form-item">
                <label class="layui-form-label">节点名称</label>
                <div class="layui-input-block">
                    <input type="text" name="node_name"  value="{{$data['node_name']}}" required lay-verify="required" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">节点图标</label>
                <div class="layui-input-block">
                    <input type="text" name="node_icon"  value="{{$data['node_icon']}}"  autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">是否启用扩展图标</label>
                <div class="layui-input-block">
                    @if($data['default_icon']==0)
                    <input type="radio" name="default_icon" value="1" title="是" >
                    <input type="radio" name="default_icon" value="0" title="否" checked>
                     @else
                        <input type="radio" name="default_icon" value="1" title="是" checked>
                        <input type="radio" name="default_icon" value="0" title="否" >
                    @endif
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">控制器名称</label>
                <div class="layui-input-block">
                    <input type="text" name="controller"  value="{{$data['controller']}}"  autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">操作名称</label>
                <div class="layui-input-block">
                    <input type="text" name="action"  value="{{$data['action']}}"  autocomplete="off" class="layui-input">
                </div>
            </div>

            <div class="layui-form-item">
                <label class="layui-form-label">是否展示</label>
                <div class="layui-input-block">
                    @if($data['is_show']==1)
                        <input type="radio" name="is_show" value="1" checked title="是">
                        <input type="radio" name="is_show" value="0" title="否" >
                    @else
                        <input type="radio" name="is_show" value="1"  title="是">
                        <input type="radio" name="is_show" value="0" title="否" checked>
                    @endif
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">父节点</label>
                <div class="layui-input-block">
                    <select name="pid" lay-verify="required">
                        <option value="0">主菜单</option>
                        @foreach($info as $k=>$v)

                            @if($data['pid']==$v['node_id'])
                                <option value="{{$v['node_id']}}" selected><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3) ?> {{$v['node_name']}}
                                </option>
                            @else
                                <option value="{{$v['node_id']}}"><?php echo str_repeat('&nbsp;&nbsp;',$v['level']*3) ?>
                                    {{$v['node_name']}}
                                </option>
                            @endif
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
    </div>
    <script>
        //Demo
        layui.use(['form','layer'], function(){
            var form = layui.form;
            var layer=layui.layer;
            //监听提交
            form.on('submit(formDemo)', function(data){
                $.post(
                    "/node/update",
                    data.field,
                    function(result){
                        if(result.code==1){
                            // layer.confirm('修改成功，进入展示页面', {
                            //     btn: ['确定'] //可以无限个按钮
                            // }, function(index, layero){
                            //     location.href="/node/show"
                            // });
                            layer.msg("修改成功", {icon: 1,time:1500,shade:0.3}, function () {
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
    </script>
</body>
</html>


