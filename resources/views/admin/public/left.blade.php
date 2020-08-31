<style>
    /* 扩展图标*/
    .icon {
        width: 2em;
        height: 2em;
        vertical-align: -0.5em;
        padding-right: 8px;
        fill: currentColor;
        overflow: hidden;
    }
    .left-nav::-webkit-scrollbar {
        width: 4px;
        height: 4px;
        background-color: #222
    }

    .left-nav::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        background-color: #222
    }

    .left-nav::-webkit-scrollbar-thumb {
        width: 2px;
        background-color: #888
    }



    /*.left-nav::-webkit-scrollbar {*/
    /*    !*滚动条整体样式*!*/
    /*    width: 8px; !*高宽分别对应横竖滚动条的尺寸*!*/
    /*    height: 1px;*/
    /*}*/

    /*.left-nav::-webkit-scrollbar-thumb {*/
    /*    !*滚动条里面小方块--纯色*!*/
    /*    !*border-radius: 10px;*/
    /*    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);*/
    /*    background: rgba(23,161,230,1);*!*/
    /*    !*滚动条里面小方块--变化色*!*/
    /*    border-radius: 8px;*/
    /*    background-color: skyblue;*/
    /*    background-image: -webkit-linear-gradient( 45deg, rgba(255, 255, 255, 0.2) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0.2) 75%, transparent 75%, transparent );*/
    /*}*/

    /*.left-nav::-webkit-scrollbar-track {*/
    /*    !*滚动条里面轨道*!*/
    /*    box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);*/
    /*    border-radius: 10px;*/
    /*    background: #ededed;*/
    /*}*/
</style>
<!-- 左侧菜单开始 -->
<div class="left-nav" style="overflow-y: auto">
    <div id="side-nav">
        <div style="height: 130px; width: 150px;  ">
            <a class="img" title="我的头像" style="display: block;width: 80px;height: 80px;margin: 10px auto 10px;">
                @if(empty(request()->cookie('admin_img')))
                    <img src="{{URL::asset('/images/huren.png')}}" class="userAvatar" style="display: block;width: 100%;height: 100%;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;border: 4px solid #44576b;box-sizing: border-box;">
                @else
                    <img src="http://test.basketball.lxy0316.com/{{request()->cookie('admin_img')}}" class="userAvatar" style="display: block;width: 100%;height: 100%;border-radius: 50%;-webkit-border-radius: 50%;-moz-border-radius: 50%;border: 4px solid #44576b;box-sizing: border-box;">
                @endif
            </a>
            <p style=" display: block;width: 100%;height: 25px;color: #ffffff;text-align: center;font-size: 12px;white-space: nowrap;line-height: 25px;overflow: hidden;">
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                你好！<span class="userName">{{request()->cookie('username')}}</span>, 欢迎回来
            </p>
        </div>

        <ul id="nav">
            @foreach($info as $k=>$v)
            <li >
                <a href="javascript:;">
                    @if($v['default_icon']==0)
                    <i class=" {{$v['node_icon']}}"></i>
                    @else
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="{{$v['node_icon']}}"></use>
                        </svg>
                    @endif
                    <cite>{{$v['node_name']}}</cite>
                    <i class="iconfont nav_right">&#xe6a7;</i>
                </a>
                @foreach($v['son'] as $kk=>$vv)
                <ul class="sub-menu">
                    <li>
                        <a _href="/{{$vv['controller']}}/{{$vv['action']}}">
{{--                            <i class="iconfont">&#xe6a7;</i>--}}
                            <cite>{{$vv['node_name']}}</cite>
                            <i class="iconfont nav_right">&#xe6a7;</i>
                        </a>
                    </li>
                </ul>
                @endforeach
            </li>
            @endforeach
        </ul>
    </div>
</div>
<!-- <div class="x-slide_left"></div> -->
<!-- 左侧菜单结束 -->






