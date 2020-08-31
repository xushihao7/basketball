<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title>Basketball Team - About us</title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <link type="text/css" rel="stylesheet" href="{{URL::asset('/css/style.css')}}" />
    <script language="JavaScript" type="text/JavaScript">
        <!--
        function MM_swapImgRestore() { //v3.0
            var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
        }

        function MM_preloadImages() { //v3.0
            var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
        }

        function MM_findObj(n, d) { //v4.01
            var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
            if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
            for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
            if(!x && d.getElementById) x=d.getElementById(n); return x;
        }

        function MM_swapImage() { //v3.0
            var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
                if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
        }
        //-->
    </script>
</head>

<body onLoad="MM_preloadImages('{{URL::asset('/css/images/James.jpg')}}')">
<div id="top">
    <div id="menu">
        <ul>
            <li><a href="/" class="but1"><img src="{{URL::asset('/css/images/spacer.gif')}}" alt="" width="56" height="13" /></a></li>
            <li><a href="index2.html" class="but2" id="active"><img src="{{URL::asset('/css/images/spacer.gif')}}" alt="" width="100" height="13" /></a></li>
            <li><a href="index2.html" class="but3"><img src="{{URL::asset('/css/images/spacer.gif')}}" alt="" width="74" height="13" /></a></li>
            <li><a href="index2.html" class="but4"><img src="{{URL::asset('/css/images/spacer.gif')}}" alt="" width="123" height="13" /></a></li>
            <li><a href="index2.html" class="but5"><img src="{{URL::asset('/css/images/spacer.gif')}}" alt="" width="88" height="13" /></a></li>
            <li><a href="index2.html" class="but6"><img src="{{URL::asset('/css/images/spacer.gif')}}" alt="" width="72" height="13" /></a></li>
            <li><a href="index2.html" class="but7"><img src="{{URL::asset('/css/images/spacer.gif')}}" alt="" width="84" height="13" /></a></li>
        </ul>																																																																																															<div style="position:absolute;top:1px;left:1px;height:0px;width:0px;overflow:hidden"><h1><a href="http://www.cssmoban.com">best free templates</a></h1></div>
    </div>
</div>
<div id="header" class="home">
    <img src="{{URL::asset('/css/images/spacer.gif')}}" alt="" width="98" height="17" /><br />
</div>
<div id="wrapper">
    <div id="content">
        <div id="about">
            <img src="{{URL::asset('/css/images/title7.gif')}}" alt="" width="412" height="37" /><br />
            <img src="{{$list['play_images']}}" alt="" width="268" height="350" class="pic" /><br />
            <p>  {{$list['play_content']}} </p>
            <p> </p>
        </div>
        <div id="history">
            <img src="{{URL::asset('/css/images/title8.gif')}}" alt="" width="404" height="37" /><br />
            <p><strong>技术特点：</strong>{{$list['play_technology']}} </p>

        </div>
    </div>
</div>
<div id="footer">
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="index2.html">About Team</a></li>
        <li><a href="index2.html">Players</a></li>
        <li><a href="index2.html">News &amp; Events</a></li>
        <li><a href="index2.html">Statistics</a></li>
        <li><a href="index2.html">Forums</a></li>
        <li><a href="index2.html">Contacts</a></li>
    </ul>
    <p>Copyright &copy;. All rights reserved. Design from <a href="http://www.cssmoban.com" target="_blank" title="Free Templates">cssMoban.com</a></p>
</div>
</body>
</html>
