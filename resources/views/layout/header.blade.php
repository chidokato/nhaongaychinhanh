<?php use App\menu; ?>
<!-- START SECTION HEADINGS -->
<!-- Header Container
================================================== -->
<header id="header-container" class="header head-tr {{ isset($active) && $active=='' ? 'header-home' : 'header-sub' }}">
    <!-- Header -->
    <div id="" class="head-tr bottom">
        <div class="container container-header">
            <!-- Left Side Content -->
            <div class="left-side">
                <!-- Logo -->
                <div id="logo">
                    <a href="{{asset('')}}"><img src="data/themes/{{$head_logo->img}}" data-sticky-logo="data/themes/{{$head_logo_trang->img}}" alt="{{$head_logo->name}}"></a>
                </div>
                <!-- Mobile Navigation -->
                <div class="mmenu-trigger">
                    <button class="hamburger hamburger--collapse" type="button">
                        <span class="hamburger-box">
					<span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
                <!-- Main Navigation -->
                <nav id="navigation" class="style-1 head-tr">
                    <ul id="responsive">
                        <li class="{{ isset($active) && $active=='' ? 'active' : '' }}"><a href="{{asset('')}}">Trang chủ</a></li>
                        @foreach($menu as $val)
                        <?php $sub_menus = menu::where('status','true')->where('parent', $val->id)->orderBy('view','asc')->get(); ?>
                        <li class="{{ isset($active) && $active==$val->slug ? 'active' : '' }}"><a href="{{$val->slug}}">{{$val->name}}</a>
                            @if(count($sub_menus) > 0)
                            <ul>
                                @foreach($sub_menus as $sub_menu)
                                <li><a href="{{$sub_menu->slug}}">{{$sub_menu->name}}</a>
                                    <!-- <ul>
                                        <li><a href="properties-grid-1.html">Grid View 1</a></li>
                                    </ul> --> 
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </nav>
                <!-- Main Navigation / End -->
            </div>
            <!-- Left Side Content / End -->

            <!-- Right Side Content / End -->
            @if(Auth::check())
            <div class="right-side d-none d-lg-none d-xl-flex">
                <!-- Header Widget -->
                <div class="header-widget">
                    <a href="profile/articles/post" class="button border">Đăng tin<i class="fas fa-laptop-house ml-2"></i></a>
                </div>
                <!-- Header Widget / End -->
            </div>
            <!-- Right Side Content / End -->

            <!-- Right Side Content / End -->

            
            <div class="header-user-menu user-menu add">
                <div class="header-user-name">
                    <span><img src="data/user/{{ isset(Auth::User()->avatar)? Auth::User()->avatar:'no_image.jpg'}}" alt=""></span> <div class="m-none">Hi, {{Auth::User()->your_name}}!</div>
                </div>
                <ul>
                    <li><a href="profile"> Thông tin cá nhân</a></li>
                    <li><a href="profile/articles/listitem"> Quản lý tin đăng</a></li>
                    <li><a href="profile/changepassword"> Đổi mật khẩu</a></li>
                    <li><a href="profile/logout">Đăng xuất</a></li>
                </ul>
            </div>
            @else
            <!-- <div class="header-user-menu user-menu add signin" >
                <a  href="#">
                    <div class="header-user-name  show-reg-form modal-open" style="padding-top: 5px">
                        <i class="fa fa-user"></i> <div class="m-none">Đăng nhập</div>
                    </div>
                </a>
            </div> -->

            <div class="right-side d-none d-lg-none d-xl-flex">
                <!-- Header Widget -->
                <div class="header-widget">
                    <a href="profile/login" class="button border">Đăng tin<i class="fas fa-laptop-house ml-2"></i></a>
                </div>
                <!-- Header Widget / End -->
            </div>

            <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                <!-- Header Widget -->
                <div class="header-widget sign-in">
                    <div class="show-reg-form"><a href="profile/login">Đăng nhập</a></div>
                </div>
                <!-- Header Widget / End -->
            </div>

            @endif
            <!-- Right Side Content / End -->
            
        </div>
    </div>
    <!-- Header / End -->

</header>
<!-- <div class="clearfix"></div> -->
<!-- Header Container / End -->

