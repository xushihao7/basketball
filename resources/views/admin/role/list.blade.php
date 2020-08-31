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
<div class="x-body">
    {{csrf_field()}}
    <div class="layui-row">

    </div>
    <xblock>
        <button class="layui-btn layui-btn-normal layui-btn-radius" onclick="x_admin_show('角色添加','/role/add')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<span class="layui-badge">{{$count}}</span> 条</span>
    </xblock>
    <table class="layui-hide" id="demo" lay-filter="table_edit"></table>
</div>
    <script>
        $(function(){
            //展示加分页
            layui.use(['table','layer'],function(data){
                var table=layui.table;
                //console.log(data)
                table.render({
                    elem: '#demo'
                    ,id:'codetable'
                    ,url: "/role/list" //数据接口
                    //,curr:2
                    ,page: {curr: history.state != null &&history.state.page!=null? history.state.page : 1}//开启分页
                    ,limit:5
                    ,limits:[1,5,15,50,100]
                    ,cols: [[ //表头
                        {type:'numbers', title: '序号',width:200,fixed: 'left'}
                        ,{field: 'role_name', title: '角色名称'}
                        ,{title:'操作',toolbar:'#barDemo'}
                    ]]
                    , done: function (res, curr, count)
                    {
                        history.replaceState({ page: curr }, null, '#/main/enter/cardapply?page=' + curr); //保存记录对象并重载页面路由
                    }
                });
                //删除 监听行的工具条
                table.on('tool(table_edit)',function(obj){
                    var data=obj.data
                    var role_id=obj.data.role_id
                    if(obj.event=='del'){
                        //是否确认删除
                        layer.confirm("是否确认删除？",{icon:3},function(index){
                            $.post(
                                "/role/del",
                                {role_id:role_id},
                                function(msg) {
                                    layer.msg(msg.msg,{icon:msg.code})
                                    if(msg.code==1){
                                        $(".layui-laypage-btn").click();
                                        table.reload('codetable')
                                    }
                                },
                                'json'
                            )
                        })
                    }else if(obj.event=="edit"){
                        // 获取当前页码
                        // var page=$(".layui-laypage-em").next().html();
                         //location.href="/role/update?role_id="+role_id
                        onclick(x_admin_show('赋予权限','/role/update?role_id='+role_id))
                    }

                })

            })



        })
    </script>
    <script type="text/html" id='barDemo'>
        <button type="button" class="layui-btn layui-btn-sm layui-btn-normal" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>赋予权限</button>
        <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" lay-event="del"><i class="layui-icon"></i> 删除</button>
    </script>
