<!doctype html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <title>Welcome to the video website of basketball fans</title>
    <meta charset="utf-8">
    <link rel="icon" href="{{URL::asset('/index/images/favicon.png')}}">
    <!-- CSS================================================== -->
    <link rel="stylesheet" href="{{URL::asset('/index/css/style.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/index/css/night-mode.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/index/css/common.css')}}">
    <!-- icons================================================== -->
    <link rel="stylesheet" href="{{URL::asset('/index/css/icons.css')}}">
    <!-- Googlefont  ================================================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- javaScripts================================================== -->
    <script src="{{URL::asset("/index/js/jquery-3.3.1.min.js")}}"></script>
    <script src="{{URL::asset("/index/js/simplebar.js")}}"></script>
    <script src="{{URL::asset("/index/js/main.js")}}"></script>
    <script src="https://cdn.bootcdn.net/ajax/libs/uikit/3.2.1/js/uikit.min.js"></script>
    <!--视频播放引入-->
    <link href="{{URL::asset('/index/css/main-css.css')}}" rel="stylesheet"></head>
<script type="text/javascript" src="{{URL::asset('/index/js/superVideo.js')}}"></script>
</head>
<body>
<!-- Wrapper -->
<div id="wrapper">
    <!--左侧和头部-->
    @include('index.public.left')
    @include('index.public.head')
    @section("content")
    <!-- contents -->
    <div class="main_content">

        <div class="main_content_inner">


            <!-- 轮播图开始 -->
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1"
                 uk-slideshow="animation: push ;min-height: 200; max-height: 350 ;autoplay: t rue">

                <ul class="uk-slideshow-items rounded">
                    <li>
                        <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                            <img src="{{URL::asset('/index/images/banner/img3.jpg')}}" alt="" uk-cover>
                        </div>
                        <div class="uk-position-cover"
                             uk-slideshow-parallax="opacity: 0,0,0.2; backgroundColor: #000,#000"></div>
                        <div class="uk-position-bottom-left bg-gradient-4 uk-width-1-1 p-4">
                            <div uk-slideshow-parallax="scale: 1,1,0.8">
                                <h1 uk-slideshow-parallax="x: 200,0,0" class="uk-heading-small"> Enjoy Watching
                                </h1>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                            <img src="{{URl::asset('/index/images/banner/img2.jpg')}}" alt="" uk-cover>
                        </div>
                        <div class="uk-position-cover"
                             uk-slideshow-parallax="opacity: 0,0,0.2; backgroundColor: #000,#000"></div>
                        <div class="uk-position-bottom uk-position-medium uk-transition-scale-down">
                            <h1 uk-slideshow-parallax="x: 200,0,0" class="uk-heading-small">Discover Life</h1>
                        </div>
                    </li>
                    <li>
                        <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                            <img src="{{URL::asset('/index/images/banner/img1.jpg')}}" alt="" uk-cover>
                        </div>
                        <div class="uk-position-cover"
                             uk-slideshow-parallax="opacity: 0,0,0.2; backgroundColor: #000,#000"></div>
                        <div class="uk-position-bottom uk-position-medium uk-transition-scale-down">
                            <h1 uk-slideshow-parallax="x: 200,0,0" class="uk-heading-small">beautiful girl</h1>
                        </div>
                    </li>
                    <li>
                        <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                            <img src="{{URL::asset('/index/images/banner/timg.jpg')}}" alt="" uk-cover>
                        </div>
                        <div class="uk-position-cover"
                             uk-slideshow-parallax="opacity: 0,0,0.2; backgroundColor: #000,#000"></div>
                        <div class="uk-position-bottom uk-position-medium uk-transition-scale-down">
                            <h1 uk-slideshow-parallax="x: 200,0,0" class="uk-heading-small">测试测试测试</h1>
                        </div>
                    </li>
                </ul>

                <a class="uk-position-center-left-out uk-position-small uk-hidden-hover slidenav-prev" href="#"
                   uk-slideshow-item="previous"></a>
                <a class="uk-position-center-right-out uk-position-small uk-hidden-hover slidenav-next" href="#"
                   uk-slideshow-item="next"></a>



            </div>

            <!--轮播图结束-->

            <!-- Videos sliders 1 -->

            <div class="video-grid-slider mt-4" uk-slider="finite: true">

                <div class="grid-slider-header">
                    <div>
                        <h3> 推荐视频 </h3>
                        <p> 本网站推荐的视频 </p>
                    </div>
                    <div class="grid-slider-header-link">

                        <div class="btn-arrow-slider">
                            <a href="#" class="btn-arrow-slides" uk-slider-item="previous">
                                <span class="arrow-left"></span>
                            </a>
                            <a href="#" class="btn-arrow-slides" uk-slider-item="next">
                                <span class="arrow-right"></span>
                            </a>
                        </div>

                    </div>
                </div>

                <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid">

                    <li>
                        <a href="/video/play" class="video-post">
                            <!-- Blog Post Thumbnail -->
                            <div class="video-post-thumbnail">
                                <span class="video-post-count">40M</span>
                                <span class="video-post-time">04:09</span>
                                <span class="play-btn-trigger"></span>
                                <!-- option menu -->
                                <span class="btn-option">
                                        <i class="icon-feather-more-vertical"></i>
                                    </span>
                                <div class="dropdown-option-nav"
                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                    <ul>
                                        <li>
                                            <span> <i class="uil-history"></i> Watch Later</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                        </li>
                                    </ul>
                                </div>

                                <img src="{{URL::asset('/index/images/video-thumbal/sf1.jpg')}}" alt="">

                            </div>

                            <!-- Blog Post Content -->
                            <div class="video-post-content">
                                <h3>nba赛季5大小前锋 詹姆斯第一</h3>
                                <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                <span class="video-post-user">Jonathan Madano</span>
                                <span class="video-post-views">531k views</span>
                                <span class="video-post-date"> 2 weeks ago </span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="single-video.html" class="video-post">
                            <!-- Blog Post Thumbnail -->
                            <div class="video-post-thumbnail">
                                <span class="video-post-count">2.7k</span>
                                <span class="video-post-time">40:00</span>
                                <span class="play-btn-trigger"></span>
                                <!-- option menu -->
                                <span class="btn-option">
                                        <i class="icon-feather-more-vertical"></i>
                                    </span>
                                <div class="dropdown-option-nav"
                                     uk-dropdown="pos: bottom-right ;mode : hover;animation: uk-animation-slide-bottom-small">
                                    <ul>
                                        <li>
                                            <span> <i class="uil-history"></i> Watch Later</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{URL::asset('/index/images/video-thumbal/1.png')}}" alt="">
                            </div>
                            <!-- Blog Post Content -->
                            <div class="video-post-content">
                                <h3> Learn how to create a PHP singleton class </h3>
                                <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                <span class="video-post-user">Stella Johnson</span>
                                <span class="video-post-views">938k views</span>
                                <span class="video-post-date"> 3 weeks ago </span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="single-video.html" class="video-post">
                            <!-- Blog Post Thumbnail -->
                            <div class="video-post-thumbnail">
                                <span class="video-post-count">2.3M</span>
                                <span class="video-post-time">14:00</span>
                                <span class="play-btn-trigger"></span>
                                <!-- option menu -->
                                <span class="btn-option">
                                        <i class="icon-feather-more-vertical"></i>
                                    </span>
                                <div class="dropdown-option-nav"
                                     uk-dropdown="pos: bottom-right ;mode : hover;animation: uk-animation-slide-bottom-small">
                                    <ul>
                                        <li>
                                            <span> <i class="uil-history"></i> Watch Later</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{URL::asset('/index/images/video-thumbal/3.png')}}" alt="">
                            </div>
                            <!-- Blog Post Content -->
                            <div class="video-post-content">
                                <h3> Creating a Laravel Package - and Initializing Package Folders </h3>
                                <img src="{{URL::asset('/index/images/avatars/avatar-5.jpg')}}" alt="">
                                <span class="video-post-user">Alex Dolgove</span>
                                <span class="video-post-views">531k views</span>
                                <span class="video-post-date"> 2 weeks ago </span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="single-video.html" class="video-post">
                            <!-- Blog Post Thumbnail -->
                            <div class="video-post-thumbnail">
                                <span class="video-post-time">23:00</span>
                                <span class="play-btn-trigger"></span>
                                <!-- option menu -->
                                <span class="btn-option">
                                        <i class="icon-feather-more-vertical"></i>
                                    </span>
                                <div class="dropdown-option-nav"
                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                    <ul>
                                        <li>
                                            <span> <i class="uil-history"></i> Watch Later</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{URL::asset('/index/images/video-thumbal/4.png')}}" alt="">
                            </div>
                            <!-- Blog Post Content -->
                            <div class="video-post-content">
                                <h3> Learn how to upload files using Laravel and Filepond </h3>
                                <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                                <span class="video-post-user">Adrian Mohani</span>
                                <span class="video-post-views">531k views</span>
                                <span class="video-post-date"> 2 weeks ago </span>
                            </div>
                        </a>
                    </li>

                    <li>
                        <a href="single-video.html" class="video-post">
                            <!-- Blog Post Thumbnail -->
                            <div class="video-post-thumbnail">
                                <span class="video-post-count">1.4M</span>
                                <span class="video-post-time">23:00</span>
                                <span class="play-btn-trigger"></span>
                                <!-- option menu -->
                                <span class="btn-option">
                                        <i class="icon-feather-more-vertical"></i>
                                    </span>
                                <div class="dropdown-option-nav"
                                     uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                    <ul>
                                        <li>
                                            <span> <i class="uil-history"></i> Watch Later</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                        </li>
                                        <li>
                                            <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                        </li>
                                    </ul>
                                </div>

                                <img src="{{URL::asset('/index/images/video-thumbal/2.png')}}" alt="">

                            </div>

                            <!-- Blog Post Content -->
                            <div class="video-post-content">
                                <h3> How to create a basic Sticky HTML element using CSS </h3>
                                <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                <span class="video-post-user">Jonathan Madano</span>
                                <span class="video-post-views">531k views</span>
                                <span class="video-post-date"> 2 weeks ago </span>
                            </div>
                        </a>
                    </li>

                </ul>

            </div>


            <!-- section header for slider 1 -->

            <div class="section-header mt-5">
                <div class="section-header-left">
                    <h3> Updates from Subscriptions </h3>
                    <p> Channals You are Subscriped</p>
                </div>
                <div class="section-header-right">
                    <a href="#" class="see-all"> See all</a>
                </div>
            </div>

            <!-- Videos sliders 1 -->

            <div class="section-small pt-0">
                <div uk-slider="finite: true">

                    <ul class="uk-slider-items uk-child-width-1-4@m uk-child-width-1-3@s uk-grid mb-3">

                        <li>
                            <a href="single-video.html" class="video-post">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li>
                                                <span> <i class="uil-history"></i> Watch Later</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <img src="{{URL::asset('/index/images/video-thumbal/img-1.png')}}" alt="">

                                </div>

                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn How-To Design & Prototype in Adobe XD Tutorial </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                    <span class="video-post-user">Jonathan Madano</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="single-video.html" class="video-post">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">2.7k</span>
                                    <span class="video-post-time">40:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li>
                                                <span> <i class="uil-history"></i> Watch Later</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{URL::asset('/index/images/video-thumbal/img-3.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn How to Prototype Faster with Mockplus! in 2020 </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                    <span class="video-post-user">Stella Johnson</span>
                                    <span class="video-post-views">938k views</span>
                                    <span class="video-post-date"> 3 weeks ago </span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="single-video.html" class="video-post">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">2.3M</span>
                                    <span class="video-post-time">14:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li>
                                                <span> <i class="uil-history"></i> Watch Later</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{URL::asset('/index/images/video-thumbal/img-4.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Adobe XD Design Tutorial Website Landing Page </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-5.jpg')}}" alt="">
                                    <span class="video-post-user">Alex Dolgove</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="single-video.html" class="video-post">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li>
                                                <span> <i class="uil-history"></i> Watch Later</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{URL::asset('/index/images/video-thumbal/img-5.png')}}" alt="">
                                </div>
                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn UI/UX Designing Latest Website In Adobe XD </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                                    <span class="video-post-user">Adrian Mohani</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="single-video.html" class="video-post">
                                <!-- Blog Post Thumbnail -->
                                <div class="video-post-thumbnail">
                                    <span class="video-post-count">1.4M</span>
                                    <span class="video-post-time">23:00</span>
                                    <span class="play-btn-trigger"></span>
                                    <!-- option menu -->
                                    <span class="btn-option">
                                            <i class="icon-feather-more-vertical"></i>
                                        </span>
                                    <div class="dropdown-option-nav"
                                         uk-dropdown="pos: bottom-right ;mode : hover ;animation: uk-animation-slide-bottom-small">
                                        <ul>
                                            <li>
                                                <span> <i class="uil-history"></i> Watch Later</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-bookmark"></i> Add Bookmark</span>
                                            </li>
                                            <li>
                                                <span> <i class="uil-share-alt"></i> Share Your Friends</span>
                                            </li>
                                        </ul>
                                    </div>

                                    <img src="{{URL::asset('/index/images/video-thumbal/img-1.png')}}" alt="">

                                </div>

                                <!-- Blog Post Content -->
                                <div class="video-post-content">
                                    <h3> Learn How-To Design & Prototype in Adobe XD Tutorial </h3>
                                    <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                    <span class="video-post-user">Jonathan Madano</span>
                                    <span class="video-post-views">531k views</span>
                                    <span class="video-post-date"> 2 weeks ago </span>
                                </div>
                            </a>
                        </li>

                    </ul>

                    <a class="uk-position-center-left-out uk-position-small slidenav-prev" href="#"
                       uk-slider-item="previous"></a>
                    <a class="uk-position-center-right-out uk-position-small slidenav-next" href="#"
                       uk-slider-item="next"></a>

                </div>

            </div>

            <hr class="m-0">

            <!-- Find channals sliders 1 -->

            <div class="section-small">

                <div uk-slider="finite: true">

                    <div class="grid-slider-header">
                        <div>
                            <h3> Find Channals </h3>
                        </div>
                        <div class="grid-slider-header-link">

                            <a href="browse-channals.html" class="button transparent uk-visible@m"> View all </a>
                            <a href="#" class="slide-nav-prev" uk-slider-item="previous"></a>
                            <a href="#" class="slide-nav-next" uk-slider-item="next"></a>


                        </div>
                    </div>

                    <ul class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-2@s uk-grid mb-3">

                        <li>
                            <a href="single-channal.html">
                                <div class="single-channal">
                                    <div class="single-channal-creator">
                                        <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                                    </div>
                                    <div class="single-channal-body">
                                        <h4>Rosanna Pansino </h4>
                                        <p> 42.2M subscribers </p>
                                        <a href="#" class="button primary small circle"> Subscribe </a>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="single-channal.html">
                                <div class="single-channal">
                                    <div class="single-channal-creator">
                                        <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                                    </div>
                                    <div class="single-channal-body">
                                        <h4>Supercoolben </h4>
                                        <p> 29.6M subscribers </p>
                                        <a href="#" class="button primary small circle"> Subscribe </a>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="single-channal.html">
                                <div class="single-channal">
                                    <div class="single-channal-creator">
                                        <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                                    </div>
                                    <div class="single-channal-body">
                                        <h4>The Young Turks </h4>
                                        <p> 32.8M subscribers </p>
                                        <a href="#" class="button primary small circle"> Subscribe </a>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="single-channal.html">
                                <div class="single-channal">
                                    <div class="single-channal-creator">
                                        <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                                    </div>
                                    <div class="single-channal-body">
                                        <h4>TechSmartt </h4>
                                        <p> 19.6M subscribers </p>
                                        <a href="#" class="button primary small circle"> Subscribe </a>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="single-channal.html">
                                <div class="single-channal">
                                    <div class="single-channal-creator">
                                        <img src="{{URL::asset('/index/images/avatars/avatar-5.jpg')}}" alt="">
                                    </div>
                                    <div class="single-channal-body">
                                        <h4>World Rugby </h4>
                                        <p> 23.2M subscribers </p>
                                        <a href="#" class="button primary small circle"> Subscribe </a>
                                    </div>
                                </div>
                            </a>
                        </li>


                        <li>
                            <a href="single-channal.html">
                                <div class="single-channal">
                                    <div class="single-channal-creator">
                                        <img src="{{URL::asset('/index/images/avatars/avatar-1.jpg')}}" alt="">
                                    </div>
                                    <div class="single-channal-body">
                                        <h4>RiceGum </h4>
                                        <p> 29.6M subscribers </p>
                                        <a href="#" class="button primary small circle"> Subscribe </a>
                                    </div>
                                </div>
                            </a>
                        </li>

                    </ul>

                </div>

            </div>


            <!-- find channals  header -->

            <div class="section-header mt-5">
                <div class="section-header-left">
                    <h4> Find Channals</h4>
                    <p> Channals Your Friends are in . </p>
                </div>
                <div class="section-header-right">
                    <a href="browse-channals.html" class="see-all"> See all</a>
                </div>
            </div>

            <!-- find channals -->
            <div class="uk-child-width-1-2@m" uk-grid>
                <div>

                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-auto">
                            <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" class="rounded-lg" width="80" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <h4 class="mb-2 uk-text-truncate"> Jonathan Madano</h4>
                            <p class="uk-text-small">
                                <span> 13 Subscribers - </span>
                                <span> 15 Video per week</span>
                            </p>
                        </div>
                        <div class="uk-width-auto">
                            <a href="single-channal.html" class="button soft-primary circle"> <i
                                        class="uil-plus mr-2"></i>Flow</a>
                        </div>
                    </div>

                </div>
                <div>

                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-auto">

                            <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" class="rounded-lg" width="80" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <h4 class="mb-2 uk-text-truncate"> Ninja Medai</h4>
                            <p class="uk-text-small">
                                <span> 13 Subscribers - </span>
                                <span> 15 Video per week</span>
                            </p>
                        </div>
                        <div class="uk-width-auto">
                            <a href="single-channal.html" class="button soft-primary circle"> <i
                                        class="uil-plus mr-2"></i>Flow</a>
                        </div>
                    </div>

                </div>
                <div>

                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-auto">
                            <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" class="rounded-lg" width="80" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <h4 class="mb-2 uk-text-truncate"> Alex Dolgove</h4>
                            <p class="uk-text-small">
                                <span> 13 Subscribers - </span>
                                <span> 15 Video per week</span>
                            </p>
                        </div>
                        <div class="uk-width-auto">
                            <a href="single-channal.html" class="button soft-primary circle"> <i
                                        class="uil-plus mr-2"></i>Flow</a>
                        </div>
                    </div>

                </div>
                <div>

                    <div class="uk-grid-small" uk-grid>
                        <div class="uk-width-auto">
                            <img src="{{URL::asset('/index/images/avatars/avatar-1.jpg')}}" class="rounded-lg" width="80" alt="">
                        </div>
                        <div class="uk-width-expand">
                            <h4 class="mb-2 uk-text-truncate"> Adrian Mohani </h4>
                            <p class="uk-text-small">
                                <span> 13 Subscribers - </span>
                                <span> 15 Video per week</span>
                            </p>
                        </div>
                        <div class="uk-width-auto">
                            <a href="single-channal.html" class="button soft-primary circle"> <i
                                        class="uil-plus mr-2"></i>Flow</a>
                        </div>
                    </div>

                </div>
            </div>

            <!-- footer
           ================================================== -->
            <div class="footer">
                <div class="uk-grid-collapse" uk-grid>
                    <div class="uk-width-expand@s uk-first-column">
                        <p>© 2020 <strong>Xdz</strong>. All Rights Reserved. </p>
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
    @show
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
</body>
</html>