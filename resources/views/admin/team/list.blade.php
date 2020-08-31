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
    <style type="text/css">
        .layui-table-cell-1-imageUrl{
            text-align:center;
            height: auto;
            white-space: normal;
        }
        .layui-table img{
            max-width: 30px
        }
        .layui-table-cell{
            height:36px;
            line-height: 36px;
        }
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
{{--<div class="t_title">--}}
{{--    <fieldset class="layui-elem-field layui-field-title">--}}
{{--        <blockquote class="layui-elem-quote">--}}
{{--            <legend>球队列表</legend>--}}
{{--        </blockquote>--}}
{{--    </fieldset>--}}
{{--</div>--}}
{{csrf_field()}}
<div class="x-body">
    <div class="layui-row">
        <div class="layui-form-pane" style="margin-top: 15px;">
            <div class="layui-form-item">
                <div class="layui-input-inline">
                    <input type="text" name="username"  placeholder="请输入球队名" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline" style="width:80px">
                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                </div>
            </div>
        </div>
    </div>
    <xblock>
        <button class="layui-btn layui-btn-normal layui-btn-radius" onclick="x_admin_show('球队添加','/team/add')"><i class="layui-icon"></i>添加</button>
        <span class="x-right" style="line-height:40px">共有数据：<span class="layui-badge">{{$count}}</span> 条</span>
    </xblock>
    <table class="layui-hide" id="demo" lay-filter="table_edit" ></table>
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
                ,url: "/team/list" //数据接口
                //,curr:2
                ,page: {curr: history.state != null &&history.state.page!=null? history.state.page : 1}//开启分页
                ,limit:15
                ,limits:[1,5,15,50,100]
                ,cols: [[ //表头
                    {field: 'team_rank', title: '球队排名', width:180}
                    ,{field: 'team_name', title: '球队名称', width:180,}
                    ,{field: 'team_image', title: '球队logo(点击查看)', width:155,templet:function (d) {
                            return '<div ><image src="'+d.team_image+'"  onclick="showBigImage(this)"></div>'
                        }}
                    ,{field: 'team_partition', title: '所属分区（东西部）', width:158}
                    ,{field: 'team_record', title: '球队战绩', width:100}
                    ,{field: 'team_venue', title: '球队场馆', width:200}
                    ,{field: 'team_coach', title: '球队主教练', width:180,}
                    ,{field: 'team_city', title: '球队所属城市', width:200}
                    ,{fixed: 'right',title:'操作',toolbar:'#barDemo',width:180}
                ]]
                , done: function (res, curr, count)
                {
                    history.replaceState({ page: curr }, null, '#/main/enter/cardapply?page=' + curr); //保存记录对象并重载页面路由
                }
            });
            //删除 监听行的工具条
            table.on('tool(table_edit)',function(obj){
                var data=obj.data
                var team_id=obj.data.team_id
                if(obj.event=='del'){
                    //是否确认删除
                    layer.confirm("是否确认删除？",{icon:3},function(index){
                        $.post(
                            "/team/del",
                            {team_id:team_id},
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
                    onclick(x_admin_show('球队修改','/team/update?team_id='+team_id))

                    // location.href="/team/update?team_id="+team_id
                }

            })
            //图片放大
            window.showBigImage=function (e) {
                layer.open({
                    type: 1,
                    title: false,
                    closeBtn: 0,
                    shadeClose: true, //点击阴影关闭
                    area: [$(e).width + 'px', $(e).height + 'px'], //宽高
                    content: "<img src=" + $(e).attr('src') + " />"
                });
            }

        })



    })
</script>
<script type="text/html" id='barDemo'>
    <button type="button" class="layui-btn layui-btn-sm layui-btn-normal" lay-event="edit" ><i class="layui-icon layui-icon-edit"></i>编辑</button>
    <button type="button" class="layui-btn layui-btn-sm layui-btn-danger" lay-event="del"><i class="layui-icon"></i> 删除</button>
</script>
</body>
</html>



