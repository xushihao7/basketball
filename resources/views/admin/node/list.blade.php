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
</head>

<div class="x-body" style="width: 1000px;">
    <xblock>
        <button class="layui-btn layui-btn-normal layui-btn-radius" onclick="x_admin_show('节点添加','/node/add')"><i class="layui-icon"></i>添加</button>
    </xblock>
    <table id="demoTreeTb" ></table>
</div>
    <!--tree状-->
    <link rel="stylesheet" href="{{URL::asset('tree/css/demo.css')}}"
    <!-- 表格操作列 -->
    <script type="text/html" id="tbBar">
        <button type="button"  class="layui-btn layui-btn-sm layui-btn-normal" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</button>
        <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" lay-event="del"><i class="layui-icon"></i> 删除</button>
    </script>
    <script>
        layui.config({
            base: '/tree/dist/' //dist所在目录
        }).use(['treeTable'], function () {
            var treeTable = layui.treeTable;
            // 渲染表格
            treeTable.render({
                elem: '#demoTreeTb',
                url: '/node/list',
                tree: {
                    iconIndex: 0,  // 折叠图标显示在第几列
                    isPidData: true,// 是否是id、pid形式数据
                    idName: 'node_id',// id字段名称
                    pidName: 'pid',   //pid字段名称
                    arrowType: 'arrow2',
                    getIcon: 'ew-tree-icon-style2'
                },
                cols: [[
                    {field: 'node_name', title: '节点名称', minWidth: 165},
                    {field: 'controller', title: '控制器'},
                    {field: 'action', title: '方法',width: 50},
                    {field: 'is_show', title: '是否展示',width:50},
                    {align: 'center', toolbar: '#tbBar', title: '操作', width: 200}
                ]],
            });
            // 工具列点击事件
            treeTable.on('tool(demoTreeTb)', function (obj) {
                var event = obj.event;
                var data=obj.data
                var node_id=obj.data.node_id
                if (event === 'del') {

                    layer.confirm("是否确认删除？",{icon:3},function(index){
                        $.post(
                            "/node/del",
                            {node_id:node_id},
                            function(msg) {
                                layer.msg(msg.msg,{icon:msg.code})
                                if(msg.code==1){
                                    obj.del();
                                }
                            },
                            'json'
                        )
                    })

                } else if (event === 'edit') {
                    //location.href="/node/update?node_id="+node_id
                    onclick(x_admin_show('节点修改','/node/update?node_id='+node_id))
                }
            });


        });
    </script>
</body>
</html>


