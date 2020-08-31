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

    <!--扩展图标库 彩色图标的应用-->
    <link rel="stylesheet" href="{{URL::asset('/layui/css/modules/layui-icon-extend/iconfont.css')}}">
    <script src="{{URL::asset('/layui/css/modules/layui-icon-extend/iconfont.js')}}"></script>
    <style>
        /*欢迎的样式*/
        .layui-elem-quote {
            font-family: "Microsoft YaHei","Helvetica Neue";
        }
        .layui-elem-quote {
            margin-bottom: 10px;
            padding: 15px;
            line-height: 22px;
            border-left: 5px solid #2fb9d4;
            border-radius: 0 2px 2px 0;
            background-color: #f2f2f2;
        }
        blockquote {
            padding: 10px 20px;
            margin: 0 0 20px;
            font-size: 17.5px;
            border-left: 5px solid #eee;
        }
        /*之后的样式*/
        .layui-card-body {
            padding: 10px 15px;
            line-height: 24px;
            position: relative;
        }
        .layui-carousel>[carousel-item]:before {
            position: absolute;
            content: '\e63d';
            left: 50%;
            top: 50%;
            width: 100px;
            line-height: 20px;
            margin: -10px 0 0 -50px;
            text-align: center;
            color: #c2c2c2;
            font-family: layui-icon!important;
            font-size: 30px;
            font-style: normal;
            -webkit-font-smoothing: antialiased;
        }
        .x-admin-backlog .x-admin-backlog-body {
            display: block;
            padding: 10px 15px;
            background-color: #f8f8f8;
            color: #999;
            border-radius: 2px;
            transition: all .3s;
            -webkit-transition: all .3s;
        }
        cite {
            font-style: normal;
            font-size: 30px;
            font-weight: 300;
            /*color: #169f1d;*/
        }

    </style>
</head>
<body>
@include("admin.public.head")  <!--头部模块-->
<!-- 中部开始 -->
@include("admin.public.left")
<!-- 右侧主体开始 -->
<div class="page-content">
    <div class="layui-tab tab" lay-filter="xbs_tab" lay-allowclose="false">
        <ul class="layui-tab-title">
            <li class="home"><i class="layui-icon">&#xe68e;</i>我的桌面</li>
        </ul>
        <div class="layui-tab-content">
            <div class="layui-tab-item layui-show">
                <iframe src='/admin/welcome' frameborder="0" scrolling="yes" class="x-iframe"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="page-content-bg"></div>
<!-- 右侧主体结束 -->
<!-- 中部结束 -->
<!-- 底部开始 -->
<!--<div class="footer">
    <div class="copyright">Copyright ©2019 L-admin v2.3 All Rights Reserved</div>
</div>-->
<!-- 底部结束 -->
</body>
</html>


<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.use(['element','layer'], function(){
        var element = layui.element;
        var layer=layui.layer

    });
</script>
{{--<script>--}}
{{--    //让当前点击的路由不再收缩--}}
{{--    var local=$("#control").attr('data')--}}
{{--    var local="/"+local--}}
{{--    // var local=_local.substring(1)--}}
{{--    // var local=local.split("/")[0]--}}
{{--    $('.layui-nav-child a').each(function(){--}}
{{--        var href = $(this).attr('href');--}}
{{--        if(local==href){--}}
{{--            $(this).css('background-color','#009688')--}}
{{--            $(this).parent().parent().parent().addClass("layui-nav-itemed")--}}
{{--        }--}}
{{--    });--}}
{{--    //console.log(local)--}}
{{--</script>--}}








