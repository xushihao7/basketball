
    <!-- Basic Page Needs
    ================================================== -->
    <title>TubeLite Streaming Video HTML Template</title>
    <meta charset="utf-8">
    <link rel="icon" href="{{URL::asset('/index/images/favicon.png"')}}">
    <!-- CSS ================================================== -->
    <link rel="stylesheet" href="{{URL::asset('/index/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/index/css/night-mode.css')}}">
    <link rel="stylesheet" href="https://cdn.bootcdn.net/ajax/libs/uikit/3.2.1/css/uikit.min.css">
    <!-- icons================================================== -->
    <link rel="stylesheet" href="{{URL::asset('/index/css/icons.css')}}">
    <!-- Google font
    ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!--视频播放引入-->
    <link href="{{URL::asset('/index/css/main-css.css')}}" rel="stylesheet"></head>
<script type="text/javascript" src="{{URL::asset('/index/js/superVideo')}}.js"></script>
<!-- Wrapper -->
<div id="wrapper" class="sidebar-out">
    <!--左侧和头部-->
@include('index.public.left')
@include('index.public.head')
    <!-- contents -->
    <div class="main_content content-expand">
        <div class="main_content_inner">


            <div uk-grid>
                <div class="uk-width-2-3@m">

                    <div id="video-box" uk-sticky="top: 400 ;media : @s"
                         cls-active="video-resized uk-animation-slide-right;">
                            <span class="icon-feather-x btn-box-close"
                                  uk-toggle="target: #video-box ; cls: video-resized-hedden uk-animation-slide-left"></span>
                        <!--视频播放-->
                        <div class="embed-video" id="videoContainer">
                            <!-- <div id="videoContainer"></div> -->
                            <!-- <iframe src="https://www.youtube.com/embed/pQN-pnXPaVg" frameborder="0"
                                uk-video="automute: true" allowfullscreen uk-responsive></iframe> -->
                        </div>
                    </div>

                    <div class="video-info mt-3">

                        <!-- video title -->
                        <div class="video-info-title">
                            <h1> Course developed by Mike Dane. Check out his YouTube channel for more great
                                programming </h1>
                        </div>

                        <div class="uk-flex uk-flex-between">

                            <div class="video-info-details">
                                <span>60,723,169 views </span>
                            </div>
                            <div class="video-likes">
                                <div class="like-btn" uk-tooltip="I like it">
                                    <i class="uil-thumbs-up"></i>
                                    <span class="likes">21</span>
                                </div>
                                <div class="video-info-element">
                                    <div class="views-bar"></div>
                                    <div class="views-bar blue" style="width: 40%"></div>
                                </div>
                                <div class="like-btn" uk-tooltip="I Hate it">
                                    <i class="uil-thumbs-down"></i>
                                    <span class="likes">14</span>
                                </div>
                            </div>

                        </div>


                        <div class="uk-flex uk-flex-between uk-flex-middle" uk-grid>
                            <div class="user-details-card uk-width-expand">
                                <a href="single-channal.html" class="uk-flex">
                                    <div class="user-details-card-avatar">
                                        <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                    </div>
                                    <div class="user-details-card-name">
                                        Stella Johnson <span> Published on Oct 22, 2017 </span>
                                    </div>
                                </a>
                            </div>
                            <div class="uk-width-auto uk-flex">


                                <div class="btn-subscribe">
                                    <a href="#" class="button primary"> <i class="icon-feather-plus"></i>
                                        subscribe </a>
                                    <span class="subs-amount">1200</span>
                                </div>

                            </div>
                        </div>

                        <hr class="mt-0 mb-2">


                        <h3> Description</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod
                            tempor incidunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud
                            exercitation ullamco laboris nisi ut aliquid ex ea commodi consequat.</p>

                    </div>

                    <hr>

                    <div class="comments mt-4" id="comment-area">
                        <h3> Comments <span class="comments-amount">5210</span> </h3>

                        <ul>
                            <li>
                                <div class="avatar"><img src="{{URL::asset('/index/images//avatars/avatar-1.jpg')}}" alt="">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-by">Jonathan Madano <span>Student</span>
                                        <a href="#" class="reply"><i class="icon-line-awesome-undo"></i>
                                            Reply</a>
                                    </div>
                                    <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                        nonummy
                                        nibh
                                        euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi
                                        enim ad
                                        minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis
                                        nisl
                                        ut
                                        aliquip ex ea commodo consequat. Nam liber tempor cum soluta nobis
                                        eleifend
                                        option
                                        congue </p>
                                </div>

                                <ul>
                                    <li>
                                        <div class="avatar"><img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <div class="comment-by">Stella Johnson<span>Student</span>
                                                <a href="#" class="reply"><i class="icon-line-awesome-undo"></i>
                                                    Reply</a>
                                            </div>
                                            <p> Nam liber tempor cum soluta nobis eleifend option congue ut
                                                laoreet
                                                dolore
                                                magna aliquam erat volutpat nihil imperdiet doming id quod mazim
                                                placerat
                                                facer possim assum. Lorem ipsum dolor sit amet</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="avatar">
                                            <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt=""></div>
                                        <div class="comment-content">

                                            <div class="comment-by">Adrian Mohani <span>Student</span>
                                                <a href="#" class="reply"><i class="icon-line-awesome-undo"></i>
                                                    Reply</a>
                                            </div>
                                            <p>tempor cum soluta nobis eleifend option congue ut laoreet dolore
                                                magna
                                                aliquam erat volutpat.</p>
                                        </div>

                                    </li>
                                </ul>

                            </li>

                            <li>
                                <div class="avatar"><img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                                </div>
                                <div class="comment-content">

                                    <div class="comment-by">Alex Dolgove<span>Student</span>
                                        <a href="#" class="reply"><i class="icon-line-awesome-undo"></i>
                                            Reply</a>
                                    </div>
                                    <p>Nam liber tempor cum soluta nobis eleifend option congue ut laoreet
                                        dolore
                                        magna
                                        aliquam erat volutpat nihil imperdiet doming id quod mazim placerat
                                        facer
                                        possim
                                        assum. Lorem ipsum dolor sit amet</p>
                                </div>

                            </li>

                        </ul>

                    </div>

                    <div class="comments">
                        <h4>Your Comment </h4>
                        <ul>
                            <li>
                                <div class="avatar"><img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                </div>
                                <div class="comment-content">
                                    <form class="uk-grid-small" uk-grid>
                                        <div class="uk-width-1-2@s">
                                            <label class="uk-form-label">Name</label>
                                            <input class="uk-input" type="text" placeholder="Name">
                                        </div>
                                        <div class="uk-width-1-2@s">
                                            <label class="uk-form-label">Email</label>
                                            <input class="uk-input" type="text" placeholder="Email">
                                        </div>
                                        <div class="uk-width-1-1@s">
                                            <label class="uk-form-label">Comment</label>
                                            <textarea class="uk-textarea" placeholder="Enter Your Comments her..."
                                                      style=" height:160px"></textarea>
                                        </div>
                                        <div class="uk-grid-margin">
                                            <input type="submit" value="submit" class="button primary">
                                        </div>
                                    </form>

                                </div>
                            </li>
                        </ul>
                    </div>





                </div>
                <div class="uk-width-expand@m" id="uk-right">

                    <div class="uk-flex uk-flex-middle uk-flex-between px-1 pb-3">
                        <p class="mb-0 uk-h5"> Upnext </p>

                        <label class="btn-switch">
                            <input type="checkbox">
                            <span class="btn-switch-slider" uk-toggle="target: #wrapper; cls: menu-small"></span>
                        </label>

                    </div>
                    <div class="video-list-small uk-child-width-1-1@m uk-child-width-1-2@s" uk-grid>


                        <div>
                            <a href="#" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>

                                    <img src="{{URL::asset('/index/images/video-thumbal/2.png')}}" alt="">

                                </div>

                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> How to create a basic Sticky HTML element .. </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                    <span class="video-post-user">Jonathan Madano</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li> <span> <i class="uil-history"></i> Watch Later</span> </li>
                                            <li> <span> <i class="uil-bookmark"></i> Add Bookmark</span> </li>
                                            <li> <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="#" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">2.7k</span>
                                    <span class="video-post-time">40:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/1.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn how to create a PHP singleton class </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                    <span class="video-post-user">Stella Johnson</span>
                                    <span class="video-post-views">938k views</span>
                                    <span class="video-post-date"> 3 weeks ago </span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li> <span> <i class="uil-history"></i> Watch Later</span> </li>
                                            <li> <span> <i class="uil-bookmark"></i> Add Bookmark</span> </li>
                                            <li> <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="#" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">2.3M</span>
                                    <span class="video-post-time">14:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/3.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn how to Create Laravel Package and .. </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-5.jpg')}}" alt="">
                                    <span class="video-post-user">Alex Dolgove</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li> <span> <i class="uil-history"></i> Watch Later</span> </li>
                                            <li> <span> <i class="uil-bookmark"></i> Add Bookmark</span> </li>
                                            <li> <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="#" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/4.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn how to upload files using Laravel and .. </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                                    <span class="video-post-user">Adrian Mohani</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li> <span> <i class="uil-history"></i> Watch Later</span> </li>
                                            <li> <span> <i class="uil-bookmark"></i> Add Bookmark</span> </li>
                                            <li> <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <div>
                            <a href="#" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/img-1.png')}}" alt="">
                                </div>

                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn How-To Design & Prototype in Adobe XD Tutorial </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                    <span class="video-post-user">Jonathan Madano</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li> <span> <i class="uil-history"></i> Watch Later</span> </li>
                                            <li> <span> <i class="uil-bookmark"></i> Add Bookmark</span> </li>
                                            <li> <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="#" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">2.7k</span>
                                    <span class="video-post-time">40:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/img-3.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn How to Prototype Faster with Mockplus! in 2020 </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                    <span class="video-post-user">Stella Johnson</span>
                                    <span class="video-post-views">938k views</span>
                                    <span class="video-post-date"> 3 weeks ago </span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li> <span> <i class="uil-history"></i> Watch Later</span> </li>
                                            <li> <span> <i class="uil-bookmark"></i> Add Bookmark</span> </li>
                                            <li> <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="#" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">2.3M</span>
                                    <span class="video-post-time">14:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/img-4.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Adobe XD Design Tutorial Website Landing Page </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-5.jpg')}}" alt="">
                                    <span class="video-post-user">Alex Dolgove</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li> <span> <i class="uil-history"></i> Watch Later</span> </li>
                                            <li> <span> <i class="uil-bookmark"></i> Add Bookmark</span> </li>
                                            <li> <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="#" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/img-5.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn UI/UX Designing Latest Website In Adobe XD </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                                    <span class="video-post-user">Adrian Mohani</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>

                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li> <span> <i class="uil-history"></i> Watch Later</span> </li>
                                            <li> <span> <i class="uil-bookmark"></i> Add Bookmark</span> </li>
                                            <li> <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </a>
                        </div>


                    </div>


                </div>


            </div>

            <!-- footer
           ================================================== -->
            <div class="footer">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand@s uk-first-column">
                        <p>© 2020 <strong>TubeLite</strong>. All Rights Reserved. </p>
                    </div>
                    <div class="uk-width-auto@s">
                        <nav class="footer-nav-icon">
                            <ul>
                                <li><a href="#"><i class="icon-brand-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-brand-dribbble"></i></a></li>
                                <li><a href="#"><i class="icon-brand-youtube"></i></a></li>
                                <li><a href="#"><i class="icon-brand-twitter"></i></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>


        </div>
    </div>

</div>

<!-- For Night mode -->
<script>
    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        var nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);


    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        var nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('night-mode');
            if (document.documentElement.classList.contains('night-mode')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);
</script>


<!-- javaScripts
            ================================================== -->
<script src="https://cdn.bootcdn.net/ajax/libs/uikit/3.2.1/js/uikit.min.js"></script>
<script src="{{URL::asset('/index/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('/index/js/simplebar.js')}}"></script>
<script src="{{URL::asset('/index/js/main.js')}}"></script>
<!--视频播放js-->
<script>
    var nextControl = new Super.NextControl() // 实例化“下一个”按钮控件
    var Dbspeen = new Super.DbspeenControl() // 倍速控件
    var BarrageControl = new Super.BarrageControl() // 弹幕控件
    var fullScreenControl = new Super.FullScreenControl() // 实例化“全屏”控件
    var video = new Super.Svideo('videoContainer', {
        source: new Super.VideoSource({ // 引入视频资源
            src: '{{URL::asset('/index/video/best5sf.MP4')}}'
        }),
        leftControls: [nextControl], // 控件栏左槽插入控件
        rightControls: [Dbspeen, fullScreenControl], // 控件栏右槽插入控件
        centerControls: [BarrageControl] // 弹幕控件插入中间插槽
    })
    video.addEventListener('change', function(event) { // 监听video各属性变化
        //  console.log(event)
    })
    nextControl.addEventListener('click', function(event) { // 监听“下一个”按钮控件点击事件
        alert('click next menu !!!')
    })
    fullScreenControl.addEventListener('fullscreen', function(event) { // 监听进入全屏
        console.log('is fullscreen !!!')
        $("#main_header").hide()
        $(".video-info").hide()
        $("#comment-area").hide()
        $("#uk-right").hide()
        $(".comments").hide()
    })
    fullScreenControl.addEventListener('cancelfullscreen', function(event) { // 监听退出全屏
        console.log('cancel fullscreen !!!')
        $("#main_header").show()
        $(".video-info").show()
        $("#comment-area").show()
        $("#uk-right").show()
        $(".comments").show()
    })
    video.addEventListener('fullscreen', function(event) {
        console.log('is fullscreen !!!')
    })
    video.addBarrage(new Super.Barrage('6666666666', {
        color: 'red'
    }))
    video.addBarrage('冲鸭~~~~~~')
    video.addBarrage('奥里给！！！！！！')
</script>