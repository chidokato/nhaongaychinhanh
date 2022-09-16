@extends('layout.index')

@section('css')
<!-- ================= Style ================== --> 
<link rel="stylesheet" href="frontend/css/jquery-ui.css">
<!-- GOOGLE FONTS -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:500,600,800" rel="stylesheet">
<!-- FONT AWESOME -->
<link rel="stylesheet" href="frontend/css/fontawesome-all.min.css">
<link rel="stylesheet" href="frontend/css/fontawesome-5-all.min.css">
<link rel="stylesheet" href="frontend/css/font-awesome.min.css">
<!-- LEAFLET MAP -->
<!-- <link rel="stylesheet" href="frontend/css/leaflet.css">
<link rel="stylesheet" href="frontend/css/leaflet-gesture-handling.min.css">
<link rel="stylesheet" href="frontend/css/leaflet.markercluster.css">
<link rel="stylesheet" href="frontend/css/leaflet.markercluster.default.css"> -->
<!-- ARCHIVES CSS -->
<!-- <link rel="stylesheet" href="frontend/css/search-form.css"> -->
<!-- <link rel="stylesheet" href="frontend/css/search.css">  -->
<!-- <link rel="stylesheet" href="frontend/css/timedropper.css"> -->
<!-- <link rel="stylesheet" href="frontend/css/datedropper.css"> -->
<!-- <link rel="stylesheet" href="frontend/css/animate.css"> -->
<link rel="stylesheet" href="frontend/css/magnific-popup.css">
<!-- <link rel="stylesheet" href="frontend/css/lightcase.css"> -->
<link rel="stylesheet" href="frontend/css/swiper.min.css">
<!-- <link rel="stylesheet" href="frontend/css/owl.carousel.min.css"> -->
<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="frontend/css/menu.css">
<!-- <link rel="stylesheet" href="frontend/css/slick.css"> -->
<link rel="stylesheet" href="frontend/css/styles.css">
<!-- <link rel="stylesheet" id="color" href="frontend/css/default.css"> -->
<!-- <link rel="stylesheet" id="color" href="frontend/css/colors/pink.css"> -->
<link rel="stylesheet" href="frontend/css/dashbord-mobile-menu.css">
<link rel="stylesheet" href="frontend/css/responsive.css">
<!-- ================= js ================== --> 

<!-- select2 multiple css -->
<link href="admin_asset/select2/css/select2.min.css" rel="stylesheet">
@endsection

@section('content')
@include('layout.header')
<section class="dashboard-bd inner-pages">
<!-- START SECTION USER PROFILE -->
<section class="user-page">
    <div class="container-fluid">
        <div class="row">
            @include('layout.navbar')
            <div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-33 mt-5 mb-5 offset-lg-2 offset-md-3">
                <div class="col-lg-12 mobile-dashbord dashbord">
                    <div class="widget-boxed-header">
                        <h4>Thông tin cá nhân</h4>
                    </div>
                    <div class="sidebar-widget author-widget2">
                        <div class="author-box clearfix">
                            <img src="data/user/{{ isset(Auth::User()->avatar)? Auth::User()->avatar:'no_image.jpg'}}" alt="author-image" class="author__img">
                            <h4 class="author__title">{{Auth::User()->your_name}}</h4>
                            <ul class="author__contact">
                                <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>{{ isset(Auth::User()->address)? Auth::User()->address:"Đang cập nhật..." }}</li>
                                <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="tel:{{Auth::User()->phone}}">{{ isset(Auth::User()->phone)? Auth::User()->phone:"Đang cập nhật..." }}</a></li>
                                <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="mailto:{{Auth::User()->your_name}}">{{ isset(Auth::User()->email)? Auth::User()->email:"Đang cập nhật..." }}</a></li>
                            </ul>
                        </div>
                        
                        <div class="agent-contact-form-sidebar">
                            <form id="" name="contact_form" method="post" action="profile/postprofile/{{Auth::User()->id}}" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <label>Họ & Tên</label> 
                                <input value="{{Auth::User()->your_name}}" type="text" name="your_name" placeholder="Họ & Tên"  />
                                <label>Số điện thoại</label> 
                                <input value="{{Auth::User()->phone}}" type="text" name="phone" placeholder="Số điện thoại"  />
                                <label>Địa chỉ email</label> 
                                <input value="{{Auth::User()->email}}" disabled type="email" name="email" placeholder="Địa chỉ email"  />
                                <label>Địa chỉ</label> 
                                <input value="{{Auth::User()->address}}" type="text" name="address" placeholder="Địa chỉ"  />
                                <label>Avatar</label> <br>
                                <input type="file" name="img" placeholder="Upfile avatar"  />
                                @if(session('Alerts')) <div id="hidden"> {{session('Alerts')}} ! </div> @endif
                                @if(session('Success')) <div id="hidden" class="colorsuccess"> {{session('Success')}} ! </div> @endif
                                @if(count($errors) > 0)
                                    @foreach($errors->all() as $err)
                                    <div class="colored">{{$err}}</div>
                                    @endforeach
                                @endif
                                <input type="submit" name="sendmessage" class="multiple-send-message" value="Lưu lại" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION USER PROFILE -->
</section>
<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!-- END FOOTER -->

<!-- START PRELOADER -->
<!-- <div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div> -->
<!-- END PRELOADER -->
@include('layout.footer')
@endsection

@section('js')
<!-- ARCHIVES JS -->
<script src="frontend/js/jquery-3.5.1.min.js"></script>
<!-- <script src="frontend/js/jquery-ui.js"></script> -->
<!-- <script src="frontend/js/range-slider.js"></script> -->
<!-- <script src="frontend/js/tether.min.js"></script> -->
<!-- <script src="frontend/js/popper.min.js"></script> -->
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/mmenu.min.js"></script>
<script src="frontend/js/mmenu.js"></script>
<!-- <script src="frontend/js/slick.min.js"></script> -->
<!-- <script src="frontend/js/slick4.js"></script> -->
<!-- <script src="frontend/js/fitvids.js"></script> -->
<!-- <script src="frontend/js/smooth-scroll.min.js"></script> -->
<!-- <script src="frontend/js/search.js"></script> -->
<script src="frontend/js/jquery.magnific-popup.min.js"></script>
<script src="frontend/js/popup.js"></script>
<!-- <script src="frontend/js/ajaxchimp.min.js"></script> -->
<!-- <script src="frontend/js/newsletter.js"></script> -->
<!-- <script src="frontend/js/timedropper.js"></script> -->
<!-- <script src="frontend/js/datedropper.js"></script> -->
<!-- <script src="frontend/js/searched.js"></script> -->
<script src="frontend/js/jqueryadd-count.js"></script>
<!-- <script src="frontend/js/leaflet.js"></script> -->
<!-- <script src="frontend/js/leaflet-gesture-handling.min.js"></script> -->
<!-- <script src="frontend/js/leaflet-providers.js"></script> -->
<!-- <script src="frontend/js/leaflet.markercluster.js"></script> -->
<!-- <script src="frontend/js/map-single.js"></script> -->
<!-- <script src="frontend/js/color-switcher.js"></script> -->
<script src="frontend/js/swiper.min.js"></script>
<!-- <script src="frontend/js/inner.js"></script> -->

<!-- select2 multiple JavaScript -->
<script src="admin_asset/select2/js/select2.min.js"></script>
<script type="text/javascript"> $(document).ready(function() { $('.select2').select2({ placeholder: 'Danh mục' }); }); </script>

<!-- <script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 4,
        slidesPerGroup: 1,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 1,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 50,
            },
        }
    });
</script> -->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="admin_asset/js/validate.js"></script>

@endsection