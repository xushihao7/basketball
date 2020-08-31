<!-- header -->
<div id="main_header">
    <header>

        <!-- Logo-->
        <i class="header-traiger uil-bars"
           uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></i>

        <!-- Logo-->
        <div id="logo">
            <a href="#"> <img src="{{URL::asset('/index/images/logo.png')}}" alt=""></a>
            <a href="#"> <img src="{{URL::asset('/index/images/logo-light.png')}}" class="logo-inverse" alt=""></a>
        </div>

        <!-- form search-->
        <div class="head_search">
            <form>
                <div class="head_search_cont">
                    <input value="" type="text" class="form-control"
                           placeholder="Search for Videos, Movies and more.." autocomplete="off">
                    <i class="s_icon uil-search-alt"></i>
                </div>

                <!-- Search box dropdown -->
                <div uk-dropdown="pos: top;mode:click;animation: uk-animation-slide-bottom-small"
                     class="dropdown-search">
                    <!-- User menu -->

                    <ul class="dropdown-search-list">
                        <li class="list-title"> Recent Searches </li>
                        <li> <a href="single-video.html"> Adobe XD Design Free Tutorial .. </a> </li>
                        <li> <a href="single-video.html"> How to create a basic Sticky HTML element .. </a>
                        </li>
                        <li> <a href="single-video.html"> Learn How to Prototype Faster with Mockplus! in 2020
                            </a> </li>
                        <li> <a href="single-video.html"> Adobe XD Design Tutorial Company Website Landing Page
                                .. </a> </li>
                        <div class="menu-divider">
                            <li class="list-footer"> <a href="your-history.html"> Searches History </a></li>
                    </ul>

                </div>


            </form>
        </div>

        <!-- user icons -->
        <div class="head_user">

            <a href="page-pricing.html" class="btn-upgrade uk-visible@s"> <i class="uil-bolt-alt"></i>购买</a>
            {{--<a href="#" class="btn-upload uk-visible@s"> <i class="uil-cloud-upload"></i> 上传视频</a>--}}

            {{--<!-- upload dropdown box -->--}}
            {{--<div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small"--}}
                 {{--class="dropdown-notifications">--}}

                {{--<!-- notivication header -->--}}
                {{--<div class="dropdown-notifications-headline">--}}
                    {{--<h4>Upload Video</h4>--}}
                {{--</div>--}}

                {{--<!-- notification contents -->--}}
                {{--<div class="dropdown-notifications-content uk-flex uk-flex-middle uk-flex-center text-center">--}}


                    {{--<div class="uk-flex uk-flex-column choose-upload  text-center">--}}
                        {{--<img src="{{URL::asset("/index/images/upload.png")}}" width="70" class="m-auto" alt="">--}}
                        {{--<p class="my-3"> 想上传视频吗？ <br>--}}
                        {{--</p>--}}
                        {{--<div uk-form-custom>--}}
                            {{--<input type="file">--}}
                            {{--<a href="#" class="button soft-primary small"> 选择文件</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="uk-flex uk-flex-column choose-upload" hidden>--}}
                        {{--<i class="uil-import icon-large text-muted"></i>--}}
                        {{--<p class="my-3"> Import videos from YouTube <br> Copy / Paste your video link here </p>--}}
                        {{--<form class="uk-grid-small" uk-grid>--}}
                            {{--<div class="uk-width-expand">--}}
                                {{--<input type="text" class="uk-input uk-form-small" placeholder="Paste link">--}}
                            {{--</div>--}}
                            {{--<div class="uk-width-auto"> <button type="submit" class="button soft-primary">--}}
                                    {{--Import </button> </div>--}}
                        {{--</form>--}}
                        {{--<a href="#" class="uk-text-muted mt-3 uk-link"--}}
                           {{--uk-toggle="target: .choose-upload ; animation: uk-animation-slide-left-small, uk-animation-slide-right-medium; queued: true">--}}
                            {{--Or Upload Video </a>--}}
                    {{--</div>--}}



                {{--</div>--}}
                {{--<hr class="m-0">--}}
                {{--<div class="text-center uk-text-small py-2 uk-text-muted"> 您的视频大小不能超过60MB哦--}}
                {{--</div>--}}
            {{--</div>--}}


            <!-- videos feed  -->
            <a href="#video" class="opts_icon" uk-toggle> <i class="uil-youtube-alt"></i> <span>9+</span> </a>

            <!-- videos feed  offcanvas-->
            <div id="video" uk-offcanvas="overlay: true ;flip: true">
                <div class="uk-offcanvas-bar uk-width-large">

                    <h3> Your Subscription </h3>
                    <hr class="mb-3" style="margin:0 -20px">
                    <button class="uk-offcanvas-close" type="button" uk-close></button>

                    <div class="video-list-small uk-child-width-1-1" uk-grid>

                        <div>
                            <a href="single-video.html" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>

                                    <img src="{{URL::asset('/index/images/video-thumbal/2.png')}}" alt="">

                                </div>

                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> How to create a basic Sticky HTML element..</h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                    <span class="video-post-user">Jonathan Madano</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="single-video.html" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">2.7k</span>
                                    <span class="video-post-time">40:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/1.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn how to create PHP singleton class </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                    <span class="video-post-user">Stella Johnson</span>
                                    <span class="video-post-views">938k views</span>
                                    <span class="video-post-date"> 3 weeks ago </span>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="single-video.html" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">2.3M</span>
                                    <span class="video-post-time">14:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/3.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn Creating Laravel Package Initializing ... </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-5.jpg')}}" alt="">
                                    <span class="video-post-user">Alex Dolgove</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="single-video.html" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/4.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn how to upload files using Laravel .. </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                                    <span class="video-post-user">Adrian Mohani</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="single-video.html" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/2.png')}}" alt="">
                                </div>

                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> How to create a basic Sticky HTML element ..</h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                    <span class="video-post-user">Jonathan Madano</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                </div>
                            </a>
                        </div>

                        <div>
                            <a href="single-video.html" class="video-post video-post-list">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">2.7k</span>
                                    <span class="video-post-time">40:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <img src="{{URL::asset('/index/images/video-thumbal/1.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn how to create PHP singleton class </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                    <span class="video-post-user">Stella Johnson</span>
                                    <span class="video-post-views">938k views</span>
                                    <span class="video-post-date"> 3 weeks ago </span>
                                </div>
                            </a>
                        </div>

                    </div>

                </div>
            </div>


            <!-- browse apps   分栏 目前考虑中怎么做-->
            <!-- <a href="#" class="opts_icon uk-visible@s"> <i class="uil-apps"></i> </a> -->

            <!-- browse apps dropdown -->
            <!-- <div uk-dropdown="pos: top;mode:click ; animation: uk-animation-scale-up" class="icon-browse">

                <a href="#" class="icon-menu-item"> <i class="uil-shop"></i> Dashboard </a>
                <a href="#" class="icon-menu-item"> <i class="uil-envelope-alt"></i> Messages </a>
                <a href="#" class="icon-menu-item"> <i class="uil-bookmark"></i> Bookmark </a>
                <a href="#" class="icon-menu-item"> <i class="uil-shopping-basket"></i> Cart </a>
                <a href="#" class="icon-menu-item"> <i class="uil-shield-check"></i> Privacy </a>
                <a href="#" class="icon-menu-item"> <i class="uil-bolt-alt"></i> Upgrade </a>
                <a href="#" class="more-app"> More Features</a>
            </div> -->


            <!-- Message  notificiation dropdown -->
            <a href="#" class="opts_icon"> <i class="uil-envelope-alt"></i> <span>4</span> </a>

            <!-- Message  notificiation dropdown -->
            <div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small"
                 class="dropdown-notifications">

                <!-- notivication header -->
                <div class="dropdown-notifications-headline">
                    <h4>Messages</h4>
                    <a href="#">
                        <i class="icon-feather-settings" uk-tooltip="title: Message settings ; pos: left"></i>
                    </a>
                </div>

                <!-- notification contents -->
                <div class="dropdown-notifications-content" data-simplebar>

                    <!-- notiviation list -->
                    <ul>
                        <li class="notifications-not-read">
                            <a href="#">
                                        <span class="notification-avatar">
                                            <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                        </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Jonathan Madano</strong>
                                    <p>Okay.. Thanks for The Answer I will be waiting for your...</p>
                                    <span class="time-ago"> 2 hours ago </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                        <span class="notification-avatar">
                                            <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                        </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Stella Johnson</strong>
                                    <p> Alex will explain you how to keep your videos privatly and all that...
                                    </p>
                                    <span class="time-ago"> 7 hours ago </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                        <span class="notification-avatar">
                                            <img src="{{URL::asset('/index/images/avatars/avatar-1.jpg')}}" alt="">
                                        </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Alex Dolgove</strong>
                                    <p> Alia just joined Messenger! Be the first to send a
                                        welcome message..</p>
                                    <span class="time-ago"> 19 hours ago </span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                        <span class="notification-avatar">
                                            <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                                        </span>
                                <div class="notification-text notification-msg-text">
                                    <strong>Adrian Mohani</strong>
                                    <p> Okay.. Thanks for The Answer I will be waiting for your... </p>
                                    <span class="time-ago"> Yesterday </span>
                                </div>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="dropdown-notifications-footer">
                    <a href="#"> sell all <i class="icon-line-awesome-long-arrow-right"></i> </a>
                </div>


            </div>


            <!-- notificiation icon  -->
            <a href="#" class="opts_icon"> <i class="uil-bell"></i> <span>3</span> </a>

            <!-- notificiation dropdown -->
            <div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small"
                 class="dropdown-notifications">

                <!-- notivication header -->
                <div class="dropdown-notifications-headline">
                    <h4>Notifications </h4>
                    <a href="#">
                        <i class="icon-feather-settings"
                           uk-tooltip="title: Notifications settings ; pos: left"></i>
                    </a>
                </div>

                <!-- notification contents -->
                <div class="dropdown-notifications-content" data-simplebar>

                    <!-- notiviation list -->
                    <ul>
                        <li class="notifications-not-read">
                            <a href="#">
                                        <span class="notification-icon">
                                            <i class="icon-feather-thumbs-up"></i></span>
                                <span class="notification-text">
                                            <strong>Adrian Mohani</strong> Like Your Comment On Video
                                            <span class="text-primary">Learn Prototype Faster</span>
                                            <br> <span class="time-ago"> 9 hours ago </span>
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                        <span class="notification-icon">
                                            <i class="icon-feather-star"></i></span>
                                <span class="notification-text">
                                            <strong>Alex Dolgove</strong> Added New Review In Video
                                            <span class="text-primary">Full Stack PHP Developer</span>
                                            <br> <span class="time-ago"> 19 hours ago </span>
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                        <span class="notification-icon">
                                            <i class="icon-feather-message-circle"></i></span>
                                <span class="notification-text">
                                            <strong>Stella Johnson</strong> Replay Your Comments in
                                            <span class="text-primary">Adobe XD Tutorial</span>
                                            <br> <span class="time-ago"> 12 hours ago </span>
                                        </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                        <span class="notification-icon">
                                            <i class="icon-feather-share-2"></i></span>
                                <span class="notification-text">
                                            <strong>Adrian Mohani</strong> Like Your Comment On Video
                                            <span class="text-primary">Learn Prototype Faster</span>
                                            <br> <span class="time-ago"> Yesterday </span>
                                        </span>
                            </a>
                        </li>
                    </ul>

                </div>


            </div>


            <!-- profile -image -->
            <a class="opts_account"> <img src="{{URL::asset('/index/images/avatars/avatar-1.jpg')}}" alt=""></a>

            <!-- profile dropdown-->
            <div uk-dropdown="pos: top-right;mode:click ; animation: uk-animation-slide-bottom-small"
                 class="dropdown-notifications small">

                <!-- User Name / Avatar -->
                <a href="#">

                    <div class="dropdown-user-details">
                        <div class="dropdown-user-avatar">
                            <img src="{{URL::asset('/index/images/avatars/avatar-1.jpg')}}" alt="">
                        </div>
                        <div class="dropdown-user-name">
                            Richard Ali <span> verified <i class="uil-check"></i> </span>
                        </div>
                    </div>

                </a>

                <!-- User menu -->

                <ul class="dropdown-user-menu">
                    <li><a href="#"> <i class="uil-bolt"></i> Go PRO</a> </li>
                    <li><a href="#"> <i class="uil-user"></i> My Channal </a> </li>
                    <li><a href="#"> <i class="uil-thumbs-up"></i> Liked Videos </a></li>
                    <li><a href="#"> <i class="uil-history"></i> Watch Later </a></li>
                    <li><a href="#"> <i class="uil-cog"></i> Account Settings</a></li>
                    <li><a href="#" style="color:#ff8400"> <i class="uil-bolt"></i> Upgrade To Premium</a> </li>
                    <li>
                        <a href="#" id="night-mode" class="btn-night-mode">
                            <i class="icon-feather-moon"></i> Night mode
                            <span class="btn-night-mode-switch">
                                        <span class="uk-switch-button"></span>
                                    </span>
                        </a>
                    </li>
                    <div class="menu-divider">
                        <li><a href="#"> <i class="icon-feather-help-circle"></i> Help</a>
                        </li>
                        <li><a href="#"> <i class="icon-feather-log-out"></i> Sing Out</a>
                        </li>
                </ul>


            </div>

        </div>

    </header>

</div>