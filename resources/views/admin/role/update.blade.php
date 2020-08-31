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
    <!--layui样式和js结束-->
    <style>

    </style>
</head>
<body>
    <div style="padding: 15px;width:700px">
        <form class="layui-form" action="">
            <div class="layui-form-item">
                <label class="layui-form-label">角色名称</label>
                <div class="layui-input-block">
                    <input type="hidden" name="role_id" value="{{$roleInfo['role_id']}}">
                    <input type="text" name="role_name" required value="{{$roleInfo['role_name']}}" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">权限节点</label>
                <div class="layui-input-block">
                    @foreach($nodeAllData as $k=>$v)
                        <fieldset class="layui-elem-field ">
                            <legend>
                                {{--{in name="$v['node_id']" value="$selectNodeId"}--}}
                                @if(in_array($v['node_id'],$nodeData))
                                    <input type="checkbox" name="node_id[]" title="{{$v['node_name']}}" checked lay-skin="primary" value="{{$v['node_id']}}" lay-filter="father">
                                @else
                                    <input type="checkbox" name="node_id[]" title="{{$v['node_name']}}" lay-skin="primary" value="{{$v['node_id']}}" lay-filter="father">
                                @endif
                            </legend>
                            <div class="layui-field-box">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                @foreach($v['son'] as $kk=>$vv)
                                    {{--{in name="$vv['node_id']" value="$selectNodeId"}--}}
                                    @if(in_array($vv['node_id'],$nodeData))
                                        <input type="checkbox" name="node_id[]" title="{{$vv['node_name']}}" checked lay-skin="primary" value="{{$vv['node_id']}}" class="child" lay-filter="child">
                                    @else
                                        <input type="checkbox" name="node_id[]" title="{{$vv['node_name']}}" lay-skin="primary" value="{{$vv['node_id']}}" class="child" lay-filter="child">

                                    @endif
                                @endforeach
                            </div>
                        </fieldset>
                    @endforeach

                </div>
            </div>
            <div class="layui-form-item">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(function(){
            layui.use(['form','layer'],function(){
                var form=layui.form;
                var layer=layui.layer;
                //父级节点添加事件
                form.on('checkbox(father)', function (data) {
                    /*  console.log(data.elem); //得到checkbox原始DOM对象
                      console.log(data.elem.checked); //是否被选中，true或者false
                      console.log(data.value); //复选框value值，也可以通过data.elem.value得到
                      console.log(data.othis); //得到美化后的DOM对象*/
                    var _this = data.othis;
                    var _input = _this.parent().next().find("input");
                    //console.log(_input)
                    if (data.elem.checked) {
                        _input.prop('checked', true);
                    } else {
                        _input.prop('checked',false);
                    }
                    //重新加载表单  不加效果不出来
                    form.render();
                })
                //子级节点添加事件
                form.on('checkbox(child)', function (data) {
                    var _this = data.othis;
                    var _input = _this.parent('div').prev().find('input');
                    //console.log(_input)
                    if (data.elem.checked) {
                        _input.prop('checked', true);
                    } else {
                        var num=0;
                        var _siblings=_this.siblings('input')

                        _siblings.each(function(index){
                            if($(this).prop('checked')==false) {
                                num+=1;
                            }
                            if(num==_siblings.length){
                                _input.prop('checked',false);
                            }
                        })

                    };
                    layui.form.render('checkbox');
                })

                form.on('submit(*)', function(data){
                    //console.log(data.field)
                    $.post(
                        "/role/update",
                        data.field,
                        function(result){
                            //layer.msg(result.font,{icon:result.code});
                            if(result.code==1){
                                // layer.confirm('赋予权限成功，进入展示页面', {
                                //     btn: ['确定'] //可以无限个按钮
                                //
                                // }, function(index, layero){
                                //     location.href="/role/show"
                                // });
                                layer.msg("赋予权限成功", {icon: 1,time:1500,shade:0.3}, function () {
                                    // 获得frame索引
                                    var index = parent.layer.getFrameIndex(window.name);
                                    //关闭当前frame
                                    parent.layer.close(index);
                                    //修改成功后刷新父界面
                                    window.parent.location.reload();
                                });
                            }
                        },'json'
                    )
                    return false;
                });

            })
        })
    </script>
</body>
</html>
