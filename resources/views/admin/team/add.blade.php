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
{{--    <div class="t_title">--}}
{{--        <fieldset class="layui-elem-field layui-field-title">--}}
{{--            <blockquote class="layui-elem-quote">--}}
{{--                <legend>球队添加</legend>--}}
{{--            </blockquote>--}}
{{--        </fieldset>--}}
{{--    </div>--}}

    <form class="layui-form" action="" style="margin-top: 20px">
        <div class="layui-form-item" >
            <label class="layui-form-label">球队名称</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="team_name" required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">球队logo</label>
            <div class="layui-input-block" >
                <input type="hidden"  name="team_image" id="team_image">
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
            <label class="layui-form-label">所属分区</label>
            <div class="layui-input-block" style="width: 300px">
                <select name="team_partition" lay-verify="required" >
                    <option value="">--请选择--</option>
                    <option value="2">东部</option>
                    <option value="1">西部</option>
                </select>
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">球队主教练</label>
            <div class="layui-input-block" >
                <input type="text" name="team_coach" style="width: 300px"  required  lay-verify="required" placeholder="请输入内容" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">球队场馆</label>
            <div class="layui-input-block" >
                <input type="text" name="team_venue" style="width: 300px"  required  lay-verify="required" placeholder="请输入内容" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">所在城市</label>
            <div class="layui-input-block" >
                <input type="text" name="team_city"  style="width: 300px"  required  lay-verify="required" placeholder="请输入内容" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item layui-form-text">
            <label class="layui-form-label">球队描述</label>
            <div class="layui-input-block">
                <textarea name="team_content"  rows="10px" placeholder="请输入内容" class="layui-textarea"></textarea>
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
            layui.use(['form','layer','upload'], function(){
                var form = layui.form;
                var layer=layui.layer;
                var upload=layui.upload
                //上传图片
                var uploadInst = upload.render({
                    elem: '#test1' //绑定元素
                    ,url: '/team/upload' //上传接口
                    ,done: function(res){
                        //上传完毕回调
                        layer.msg(res.msg,{icon:res.code})
                        if(res.code==1){
                            $("#imgshow").show()
                            $("#team_image").val(res.src)
                            layui.$('#uploadDemoView').removeClass('layui-hide').find('img').attr('src', res.url);
                            // $("#pimages").attr('src',res.url);
                            // $("#nimages").text(res.player_name)
                        }else{
                            layer.msg(res.msg,{icon:res.code})
                        }
                    }
                    ,error: function(){
                        //请求异常回调
                    }
                });


                //监听提交
                form.on("submit(formDemo)",function(data){
                    console.log(data.field);
                    $.post(
                        "/team/add",
                        data.field,
                        function(msg){

                            if(msg.code==1){
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
