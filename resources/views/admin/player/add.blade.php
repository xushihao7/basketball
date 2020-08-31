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
    <form class="layui-form" action="" >
        <div class="layui-form-item" >
            <label class="layui-form-label">球员名称（英文）</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="player_ename" required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">球员名称（中文）</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="player_cname" required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">身高(米)</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="player_height" required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">体重(公斤)</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="player_weight" required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">球员号码</label>
            <div class="layui-input-block" style="width: 300px">
                <select name="player_number" lay-verify="required" >
                    <option value="">--请选择--</option>
                    <option value="00">00</option>
                    @for($i=0;$i<=99;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">所属位置</label>
            <div class="layui-input-block" >
                <input type="checkbox" name="player_position[]" title="控球后卫(PG)" lay-skin="primary" value="PG" lay-filter="play_postion">
                <input type="checkbox" name="player_position[]" title="得分后卫(SG)" lay-skin="primary" value="SG" lay-filter="play_postion">
                <input type="checkbox" name="player_position[]" title="小前锋(SF)" lay-skin="primary"  value="SF" lay-filter="play_postion">
                <input type="checkbox" name="player_position[]" title="大前锋(PF)" lay-skin="primary" value="PF" lay-filter="play_postion">
                <input type="checkbox" name="player_position[]" title="中锋(C)" lay-skin="primary" value="C" lay-filter="play_postion">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">年龄</label>
            <div class="layui-input-block">
                <input type="text" name="date" id="date" autocomplete="off" class="layui-input" style="width:150px">
            </div>
        </div>

        <div class="layui-form-item">
            <label class="layui-form-label">球员图片</label>
            <div class="layui-input-block" >
                <input type="hidden"  name="player_img" id="player_img">
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
            <label class="layui-form-label">所属球队</label>
            <div class="layui-input-block" >
                <input type="radio"  name="team"   title="西部" lay-filter="west">
                <input type="radio"   name="team"  title="东部" lay-filter="east">
            </div>
            <div class="layui-form-item">
                <div class="layui-inline" style="display: none" id="east">
                    <div class="layui-input-block" style="width: 300px">
                        <select name="team_id"  lay-search>
                            <option value="">-请选择-</option>
                            @foreach($east as $k=>$v)
                                <option value="{{$v['team_id']}}">{{$v['team_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="layui-inline" id="west" style="display: none">
                    <div class="layui-input-block" style="width: 300px">
                        <select name="team_id" lay-search >
                            <option value="">-请选择-</option>
                            @foreach($west as $k=>$v)
                                <option value="{{$v['team_id']}}">{{$v['team_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">选秀顺位</label>
            <div class="layui-input-inline">
                <select name="year" lay-filter="draft" id="player_draft">
                    <option value="">请选择年</option>
                    {{$date=date('Y',time())}}
                    @for($i=1946;$i<=$date;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
            <div class="layui-input-inline">
                <select name="round" lay-filter="round">
                    <option value="">请选择轮数</option>
                    <option value="第一轮">第一轮</option>
                    <option value="第二轮">第二轮</option>
                    <option value="落选">落选</option>
                </select>
            </div>
            <div class="layui-input-inline" id="rank">
                <select name="rank">
                    <option value="">请选择排名</option>
                    @for($i=1;$i<=30;$i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">毕业院校</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="player_university"  required  lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item" >
            <label class="layui-form-label">出生地</label>
            <div class="layui-input-block">
                <input type="text" style="width:300px" name="player_from" required lay-verify="required"  autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">状态</label>
            <div class="layui-input-inline">
                <input type="radio"  name="player_status"  value="1" title="现役" lay-filter="active" checked>
                <input type="radio"  name="player_status"  value="2" title="退役" lay-filter="retire" >
            </div>
            <div class="layui-input-inline layui-hide" id="retire_div">
                <label class="layui-form-label">退役时间</label>
                <div class="layui-input-block">
                    <input type="text" name="retire_date" id="retire_date" autocomplete="off" class="layui-input" style="width:150px">
                </div>
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
            layui.use(['form','layer','upload','laydate'], function(){
                var form = layui.form;
                var layer=layui.layer;
                var upload=layui.upload
                var laydate=layui.laydate
                //选择球队
                form.on('radio(west)', function(data){
                    $("#west").css("display",'block')
                    $("#east").css("display",'none')
                });
                form.on('radio(east)', function(data){
                    $("#east").css("display",'block')
                    $("#west").css("display",'none')
                });
                //执行一个laydate实例
                laydate.render({
                    elem: '#date' //指定元素
                });
                //球员顺位选择
                form.on('select(round)', function(data){
                    var round=data.value
                    if(round=="落选"){
                        $("#rank").css("display","none")
                    }else{
                        $("#rank").css("display","block")
                    }
                });
                //监听复选框 选择位置
                form.on('checkbox(play_postion)',function(data){
                    //console.debug(data);
                    var len=$("[name='player_position[]']:checked").length;
                    console.log(len)
                    if(len>3){
                        $(data.elem).next().attr("class","layui-unselect layui-form-checkbox");
                        $(data.elem).prop("checked",false);
                        layer.msg('位置最多只能选3项！',{icon:5});
                        return false;
                    }
                });
                //上传球员图片
                var uploadInst = upload.render({
                    elem: '#test1' //绑定元素
                    ,url: '/player/upload' //上传接口
                    ,done: function(res){
                        //上传完毕回调
                        layer.msg(res.msg,{icon:res.code})
                        if(res.code==1){
                            $("#imgshow").show()
                            $("#player_img").val(res.src)
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
                //监听现役单选框
                form.on('radio(active)', function(data){
                    $("#retire_div").addClass("layui-hide");
                });
                //监听退役单选框
                form.on('radio(retire)', function(data){
                    $("#retire_div").removeClass("layui-hide");
                    laydate.render({
                        elem: '#retire_date' //指定元素
                    });
                });
                //监听提交
                form.on("submit(formDemo)",function(data){
                    $.post(
                        "/player/add",
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
