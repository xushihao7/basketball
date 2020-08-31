<!--首页左侧-->
<!-- sidebar -->
<div class="main_sidebar">
    <div class="side-overlay" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></div>

    <!-- sidebar header -->
    <div class="sidebar-header">
        <h4> Navigation</h4>
        <span class="btn-close" uk-toggle="target: #wrapper ; cls: collapse-sidebar mobile-visible"></span>
    </div>

    <!-- sidebar Menu -->
    <div class="sidebar">
        <div class="sidebar_innr" data-simplebar>

            <div class="sections">
                <h3> hello welcome </h3>
                <ul>
                    <li class="active"> <a href="home.html"> <i class="uil-home-alt"></i> <span> 主页 </span> </a></li>
                    <li> <a href="browse-channals.html">
                            <i class="uil-users-alt"></i> <span> 我的订阅 </span> </a></li>
                    <li> <a href="your-watch-later.html"> <i class="uil-clock"></i> <span> 看 </span> </a></li>
                    <li> <a href="/video/play"> <i class="uil-thumbs-up"></i> <span>  喜欢的视频 </span> </a></li>
                    <li> <a href="browse-catagroies.html"> <i class="uil-layers"></i> <span> 更多分类 </span> </a></li>
                    <li> <a href="your-history.html"> <i class="uil-history"></i> <span> 历史 </span> </a></li>
                </ul>
            </div>


            <div class="sections">
                <h3> 订阅内容 </h3>
                <ul>
                    <li> <a href="single-channal.html"> <img src="{{URL::asset('/index/images/avatars/avatar-3.jpg')}}" alt="">
                            <span> Stella Johnson </span> <span class="dot-notiv"></span></a></li>
                    <li> <a href="single-channal.html"> <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                            <span> Alex Dolgove </span> <span class="dot-notiv"></span></a></li>
                    <li> <a href="single-channal.html"> <img src="{{URL::asset('/index/images/avatars/avatar-4.jpg')}}" alt="">
                            <span> Adrian Mohani </span> </a> </li>
                    <li> <a href="single-channal.html"> <img src="{{URL::asset('/index/images/avatars/avatar-2.jpg')}}" alt="">
                            <span> Stella Johnson </span> </a> </li>
                </ul>
                <!-- view more subcription-->
                <div class="uk-flex uk-flex-center mb-3">
                    <a href="browse-channals.html" class="button default circle px-5">
                        <i class="uil-plus mr-2"></i> More Channals</a>
                </div>

            </div>

            <div class="sections">
                <h3>其它</h3>
                <ul>
                    <li> <a href="page-setting.html"><i class="uil-cog"></i> <span> 设置 </span> </a></li>
                    <li> <a href="page-help.html"><i class="uil-info-circle"></i> <span> 帮助社区  </span></a></li>
                    <li> <a href="#"><i class="uil-layers"></i> <span> 额外页面 </span> </a>
                        <ul>
                            <li>
                                <a href="page-maintanence.html"> 维护中 </a>
                                <a href="page-comming-soon.html"> 正在开发</a>
                            </li>
                        </ul>

                    </li>
                    <li> <a href="#"><i class="uil-code"></i> <span> 发展历程 </span> </a>
                        <ul>
                            <li>
                                <a href="development-elements.html"> 元素 </a>
                                <a href="development-components.html"> 组件</a>
                                <a href="development-icons.html"> 图标 </a>
                            </li>
                        </ul>

                    </li>
                    <li> <a href="#"><i class="uil-user-circle"></i> <span> Accounts </span> </a>
                        <ul>
                            <li>
                                <a href="form-login.html"> Login </a>
                                <a href="form-register.html"> Register </a>
                                <a href="form-modern-login.html"> Simple Register</a>
                                <a href="form-modern-singup.html"> Simple Register</a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>

            <div id="foot">
                <!--
                                        <ul>
                                            <li> <a href="page-term.html"> About Us </a></li>
                                            <li> <a href="page-setting.html"> Setting </a></li>
                                            <li> <a href="page-privacy.html"> Privacy Policy </a></li>
                                            <li> <a href="page-term.html"> Terms - Conditions </a></li>
                                        </ul> -->


                <div class="foot-content">
                    <p>© 2020 <strong>xdz</strong>. All Rights Reserved. </p>
                </div>

            </div>



        </div>


    </div>

</div>