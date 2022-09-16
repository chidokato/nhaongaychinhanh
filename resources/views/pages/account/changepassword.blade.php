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
<!-- <link rel="stylesheet" href="frontend/css/dashbord-mobile-menu.css"> -->
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
                        <h4>Đổi mật khẩu</h4>
                    </div>
                    <div class="sidebar-widget author-widget2">
                        <div class="agent-contact-form-sidebar">
                            <form id="validateForm" action="profile/postchangepassword/{{Auth::User()->id}}" class="validateForm" name="contact_form" method="POST" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <label>Mật khẩu <span class="colored">*</span></label>
                                    <input name="passwordold" value="{{ old('passwordold') }}" type="text" placeholder="Nhập mật khẩu">
                                </div>

                                <div class="form-group">
                                    <label>Mật khẩu mới <span class="colored">*</span></label>
                                    <input name="password" value="{{ old('password') }}" type="text" id="password" placeholder="Nhập mật khẩu">
                                </div>

                                <div class="form-group">
                                    <label>Nhập lại mật khẩu <span class="colored">*</span></label>
                                    <input name="passwordagain" value="{{ old('passwordagain') }}" type="text" placeholder="Nhập mật khẩu">
                                </div>
                                @if(session('Alerts')) <div id="hidden" class="colored"> {{session('Alerts')}} ! </div> @endif
                                @if(session('Success')) <div id="hidden" class="colorsuccess"> {{session('Success')}} ! </div> @endif
                                @if(count($errors) > 0)
                                    @foreach($errors->all() as $err)
                                    <div class="colored">{{$err}}</div>
                                    @endforeach
                                @endif
                                <input type="submit" name="sendmessage" class="multiple-send-message" value="Gửi đi" />
                            </form>
                            <br>
                            <p><a href="profile/resetpassword">Quyên mật khẩu</a></p>
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