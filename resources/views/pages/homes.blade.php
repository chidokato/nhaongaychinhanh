@extends('layout.index')

@section('title'){{ isset($head_setting->title) ? $head_setting->title : $head_setting->name }}@endsection
@section('description'){{$head_setting->description}}@endsection
@section('keywords'){{$head_setting->keywords}}@endsection
@section('robots'){{ $head_setting->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$head_setting['slug']}}@endsection

@section('css')
<!-- ================= Style ================== --> 
<link rel="stylesheet" href="frontend/css/jquery-ui.css">
<!-- GOOGLE FONTS -->
<link href="frontend/css/fonts-Roboto.css" rel="stylesheet">
<link href="frontend/css/fonts-OoohBaby.css" rel="stylesheet">
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
<link rel="stylesheet" href="frontend/css/search-form.css">
<!-- <link rel="stylesheet" href="frontend/css/search.css">  -->
<!-- <link rel="stylesheet" href="frontend/css/timedropper.css"> -->
<!-- <link rel="stylesheet" href="frontend/css/datedropper.css"> -->
<!-- <link rel="stylesheet" href="frontend/css/animate.css"> -->
<!-- <link rel="stylesheet" href="frontend/css/magnific-popup.css"> -->
<!-- <link rel="stylesheet" href="frontend/css/lightcase.css"> -->
<!-- <link rel="stylesheet" href="frontend/css/swiper.min.css"> -->
<!-- <link rel="stylesheet" href="frontend/css/owl.carousel.min.css"> -->
<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
<link rel="stylesheet" href="frontend/css/menu.css">
<!-- <link rel="stylesheet" href="frontend/css/slick.css"> -->
<link rel="stylesheet" href="frontend/css/styles.css">
<link rel="stylesheet" href="frontend/css/responsive.css">
<!-- <link rel="stylesheet" id="color" href="frontend/css/default.css"> -->
<!-- <link rel="stylesheet" id="color" href="frontend/css/colors/pink.css"> -->
<!-- ================= js ================== --> 
<!-- select2 multiple css -->
<link href="admin_asset/select2/css/select2.min.css" rel="stylesheet">


@endsection

@section('content')
@include('layout.header')
@include('layout.slider')

<section class="popular home18  pt-5 pb-5  bg-icon">
    <div class="container">
        <div class="sec-title">
            <h2><span>H???ng m???c </span>B???t ?????ng s???n</h2>
            <div class="sec-detal ml-4">Ch???n h???ng m???c b???t ?????ng ph?? h???p v???i b???n.</div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-6 aos-init">
                <!-- Image Box -->
                <div class="img-box">
                    <a href="mua-ban">
                    <img src="frontend/ban-dat.jpg" class="img-responsive" alt="">    
                    </a>
                </div>
                <a href="mua-ban" class="img-box">
                    <div class="img-box-content mt-4">
                        <span>678 s???n ph???m</span>
                        <h4 class="mt-2 mb-2">Mua B??n B???t ?????ng S???n</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-5 col-md-6 aos-init aos-animate" data-aos="fade-right">
                <!-- Image Box -->
                <div class="img-box">
                    <a href="cho-thue">
                    <img src="images/anh-chothue.jpg" class="img-responsive" alt="">    
                    </a>
                </div>
                <a href="cho-thue" class="img-box">
                    <div class="img-box-content mt-4">
                        <span>678 s???n ph???m</span>
                        <h4 class="mt-2 mb-2">Mua B??n B???t ?????ng S???n</h4>
                    </div>
                </a>
            </div>
            
        </div>
    </div>
</section>


<!-- START SECTION FEATURED PROPERTIES -->
<section class="featured portfolio home18 bg-white-2">
    <div class="container">
        <div class="sec-title">
            <h2><span>S???n ph???m </span>n???i b???t</h2>
            <div class="sec-detal ml-4">D?????i ????y l?? nh???ng s???n ph???m n???i b???t c???a ch??ng t??i</div>
        </div>
        <div class="row portfolio-items">
            @foreach($articles as $val)
            <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                @include('layout.iteamproduct')
            </div>
            @endforeach
        </div>
       <!--  <div class="bg-all">
            <a href="properties-full-grid-1.html" class="btn btn-outline-light">Xem t???t c???</a>
        </div> -->
    </div>
</section>
<!-- END SECTION FEATURED PROPERTIES -->  

<!-- START SECTION WHY CHOOSE US -->
<section class="how-it-works home18 ">
    <div class="container">
        <div class="sec-title">
            <h2><span>T???i sao </span>l???a ch???n ch??ng t??i</h2>
            <div class="sec-detal ml-4">Ch??ng t??i cung c???p ?????y ????? d???ch v??? ??? c??c l??nh v???c.</div>
        </div>
        <div class="row service-1">
            <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                <div class="serv-flex">
                    <div class="art-1 img-13">
                        <img src="images/ic1.png" alt="">
                        <h3>Nhi???u lo???i h??nh s???n ph???m</h3>
                    </div>
                    <div class="service-text-p">
                        <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                    </div>
                </div>
            </article>
            <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                <div class="serv-flex">
                    <div class="art-1 img-14">
                        <img src="images/ic2.png" alt="">
                        <h3>R???t nhi???u ng?????i tin c???y</h3>
                    </div>
                    <div class="service-text-p">
                        <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                    </div>
                </div>
            </article>
            <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt" data-aos="fade-up">
                <div class="serv-flex arrow">
                    <div class="art-1 img-15">
                        <img src="images/ic3.png" alt="">
                        <h3>Manh b???ch v??? ph??p l??</h3>
                    </div>
                    <div class="service-text-p">
                        <p class="text-center">lorem ipsum dolor sit amet, consectetur pro adipisici consectetur debits adipisicing lacus consectetur Business Directory.</p>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>
<!-- END SECTION WHY CHOOSE US -->

<!-- START SECTION POPULAR PLACES -->
<section class="visited-cities bg-white-2 home18">
    <div class="container">
        <div class="sec-title">
            <h2><span>S???n ph???m </span>tr??n ?????a b??n</h2>
            <div class="sec-detal ml-4">Nh???ng ?????a ??i???m c?? nhi???u s???n ph???m nh???t.</div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
            <div class="col-lg-6 col-md-6 pr-1 aos-init aos-animate" data-aos="fade-right">
                <!-- Image Box -->
                <a href="#" class="img-box hover-effect">
                    <img src="img/hanoi.jpg" class="img-responsive" alt="">
                    <!-- Badge -->
                    <div class="img-box-content visible">
                        <h4 class="mb-2">H?? N???i</h4>
                        <span>203 s???n ph???m</span>
                        <ul class="starts text-center mt-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 pr-1 aos-init aos-animate" data-aos="fade-left">
                <!-- Image Box -->
                <a href="#" class="img-box hover-effect">
                    <img src="img/hochiminh.jpg" class="img-responsive" alt="">
                    <div class="img-box-content visible">
                        <h4 class="mb-2">H??? Ch?? Minh</h4>
                        <span>307 s???n ph???m</span>
                        <ul class="starts text-center mt-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-half"></i>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 pr aos-init aos-animate" data-aos="fade-left">
                <!-- Image Box -->
                <a href="#" class="img-box hover-effect">
                    <img src="img/quangninh.jpg" class="img-responsive" alt="">
                    <div class="img-box-content visible">
                        <h4 class="mb-2">Qu???ng Ninh </h4>
                        <span>409 s???n ph???m</span>
                        <ul class="starts text-center mt-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 pr-1 aos-init aos-animate" data-aos="fade-right">
                <!-- Image Box -->
                <a href="#" class="img-box no-mb mi x3 hover-effect">
                    <img src="img/haiphong.jpg" class="img-responsive" alt="">
                    <div class="img-box-content visible">
                        <h4 class="mb-2">H???i Ph??ng</h4>
                        <span>507 s???n ph???m</span>
                        <ul class="starts text-center mt-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-half"></i>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 pr-1 aos-init aos-animate" data-aos="fade-right">
                <!-- Image Box -->
                <a href="#" class="img-box no-mb mi x3 hover-effect">
                    <img src="img/vinhphuc.jpg" class="img-responsive" alt="">
                    <div class="img-box-content visible">
                        <h4 class="mb-2">V??nh Ph??c</h4>
                        <span>99 s???n ph???m</span>
                        <ul class="starts text-center mt-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 pr aos-init aos-animate" data-aos="fade-left">
                <!-- Image Box -->
                <a href="#" class="img-box san no-mb x3 hover-effect">
                    <img src="img/thanhhoa.jpg" class="img-responsive" alt="">
                    <div class="img-box-content visible">
                        <h4 class="mb-2">Thanh H??a </h4>
                        <span>308 s???n ph???m</span>
                        <ul class="starts text-center mt-2">
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star"></i>
                            </li>
                            <li><i class="fa fa-star-half"></i>
                            </li>
                        </ul>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION POPULAR PLACES -->


<!-- START SECTION BLOG -->
<section class="blog-section home18">
    <div class="container">
        <div class="sec-title">
            <h2><span>Tin t???c &amp; </span>Th??? tr?????ng</h2>
            <div class="sec-detal ml-4">?????c nh???ng tin t???c m???i nh???t t??? blog c???a ch??ng t??i.</div>
        </div>
        <div class="news-wrap">
            <div class="row">
                @foreach($news_new as $val)
                <div class="col-xl-4 col-md-6 col-xs-12">
                    <div class="news-item" data-aos="fade-up">
                        <a href="{{$val->category->slug}}/{{$val->slug}}" class="news-img-link">
                            <div class="news-item-img">
                                <img class="img-responsive" src="data/news/{{$val->img}}" alt="blog image">
                            </div>
                        </a>
                        <div class="news-item-text">
                            <a href="{{$val->category->slug}}/{{$val->slug}}"><h3>{{$val->name}}</h3></a>
                            <div class="dates">
                                <ul class="action-list pl-0">
                                    <li class="action-item pl-0"><i class="fa fa-calendar" aria-hidden="true"></i> <span> {{date('d/m/Y',strtotime($val->created_at))}}</span></li>
                                    <li class="action-item"><i class="fa fa-user" aria-hidden="true"></i> <span> {{$val->User->name}}</span></li>
                                    <li class="action-item"><i class="fa fa-eye" aria-hidden="true"></i> <span> {{$val->hits}} view</span></li>
                                </ul>
                            </div>
                            <div class="news-item-descr big-news">
                                <p>{{$val->detail}}</p>
                            </div>
                            <div class="news-item-bottom">
                                <a href="{{$val->category->slug}}/{{$val->slug}}" class="news-link">Xem th??m...</a>
                                <div class="admin">
                                    <p>By, {{$val->User->name}}</p>
                                    <img src="data/user/{{$val->User->avatar}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
    </div>
</section>
<!-- END SECTION BLOG -->

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
<script src="frontend/js/smooth-scroll.min.js"></script>
<!-- <script src="frontend/js/search.js"></script> -->
<!-- <script src="frontend/js/jquery.magnific-popup.min.js"></script> -->
<!-- <script src="frontend/js/popup.js"></script> -->
<!-- <script src="frontend/js/ajaxchimp.min.js"></script> -->
<!-- <script src="frontend/js/newsletter.js"></script> -->
<!-- <script src="frontend/js/timedropper.js"></script> -->
<!-- <script src="frontend/js/datedropper.js"></script> -->
<!-- <script src="frontend/js/searched.js"></script> -->
<!-- <script src="frontend/js/leaflet.js"></script> -->
<!-- <script src="frontend/js/leaflet-gesture-handling.min.js"></script> -->
<!-- <script src="frontend/js/leaflet-providers.js"></script> -->
<!-- <script src="frontend/js/leaflet.markercluster.js"></script> -->
<!-- <script src="frontend/js/map-single.js"></script> -->
<!-- <script src="frontend/js/color-switcher.js"></script> -->
<!-- <script src="frontend/js/swiper.min.js"></script> -->
<script src="frontend/js/inner.js"></script>

<!-- select2 multiple JavaScript -->
<script src="admin_asset/select2/js/select2.min.js"></script>
<script type="text/javascript"> $(document).ready(function() { $('.select2').select2({ placeholder: 'Danh m???c' }); }); </script>
@endsection