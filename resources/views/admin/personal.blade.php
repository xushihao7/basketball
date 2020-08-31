<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>
        后台管理系统
    </title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    {{--<link rel="stylesheet" href="{{URL::asset('/admin/css/x-admin.css')}}" media="all">--}}
    <style>
        .x-body {
            padding: 20px;
        }
        .layui-layer-iframe iframe {
            display: block;
            width: 100%;
        }
        blockquote, body, button, dd, div, dl, dt, form, h1, h2, h3, h4, h5, h6, input, li, ol, p, pre, td, textarea, th, ul {
            margin: 0;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
        }
        body {
            line-height: 24px;
            font: 14px Helvetica Neue,Helvetica,PingFang SC,\5FAE\8F6F\96C5\9ED1,Tahoma,Arial,sans-serif;
        }
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
        .layui-table[lay-skin=line] td, .layui-table[lay-skin=line] th {
            border: none;
            border-bottom: 1px solid #e2e2e2;
        }
        .layui-table {
            width: 100%;
            margin: 10px 0;
            background-color: #fff;
        }
        layui-table td, .layui-table th {
            padding: 9px 15px;
            min-height: 20px;
            line-height: 20px;
            border: 1px solid #e2e2e2;
            font-size: 14px;
            text-align: center;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
    </style>
</head>

<body>
<div class="x-body">
    <blockquote class="layui-elem-quote">
        @if(empty(request()->cookie('admin_img')))
        <img src="{{URL::asset('/images/huren.png')}}" class="layui-circle" style="width:50px;float:left">
        @else
            <img src="http://test.basketball.lxy0316.com/{{request()->cookie('admin_img')}}" class="layui-circle" style="width:50px;float:left">
        @endif
            <dl style="margin-left:80px; color:#019688">
            <dt><span >{{request()->cookie('username')}}</span> <span >余额：0</span></dt>
            <dd style="margin-left:0">你要悄悄努力，然后惊艳所有人！</dd>
        </dl>
    </blockquote>
    <div class="pd-20">
        <table  class="layui-table" lay-skin="line">
            <tbody>
            <tr>
                <th  width="80">性别：</th>
                <td>男</td>
            </tr>
            <tr>
                <th>手机：</th>
                <td>111111111111</td>
            </tr>
            <tr>
                <th>邮箱：</th>
                <td>123456@mail.com</td>
            </tr>
            <tr>
                <th>地址：</th>
                <td>北京市</td>
            </tr>
            <tr>
                <th>注册时间：</th>
                <td>2018-01-01</td>
            </tr>
            <tr>
                <th>积分：</th>
                <td>660</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>

</html>