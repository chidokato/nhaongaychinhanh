@extends('layout.index')

@section('title'){{ isset($articles->title) ? $articles->title : $articles->name }}@endsection
@section('description'){{$articles->description}}@endsection
@section('keywords'){{$articles->keywords}}@endsection
@section('robots'){{ $articles->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$articles->category->slug.'/'.$articles->slug.'.html'}}@endsection

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
<link rel="stylesheet" href="frontend/css/search-form.css">
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
<link rel="stylesheet" href="frontend/css/responsive.css">
<!-- <link rel="stylesheet" id="color" href="frontend/css/default.css"> -->
<!-- <link rel="stylesheet" id="color" href="frontend/css/colors/pink.css"> -->
<!-- ================= js ================== --> 


<!-- select2 multiple css -->
<link href="admin_asset/select2/css/select2.min.css" rel="stylesheet">
@endsection

@section('content')
<?php use App\user; ?> 
@include('layout.header')

<!-- <div class="single-property-4">
    <div class="container-fluid p0">
        <div class="row">
            <div class="col-sm-6 col-lg-6 p0">
                <div class="row m0">
                    <div class="col-lg-12 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="frontend/images/interior/p-1.jpg"><img class="img-fluid w100" src="frontend/images/interior/p-1.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-6 p0">
                <div class="row m0">
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="frontend/images/interior/p-2.jpg"><img class="img-fluid w100" src="frontend/images/interior/p-2.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="frontend/images/interior/p-3.jpg"><img class="img-fluid w100" src="frontend/images/interior/p-3.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="frontend/images/interior/p-4.jpg"><img class="img-fluid w100" src="frontend/images/interior/p-4.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 p0">
                        <div class="popup-images">
                            <a class="popup-img" href="frontend/images/interior/p-5.jpg"><img class="img-fluid w100" src="frontend/images/interior/p-5.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="swiper-container">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <a href="{{asset('')}}data/product/{{$articles->img}}" class="grid image-link popup-img">
                <img src="{{asset('')}}data/product/{{$articles->img}}" class="img-fluid" alt="#">
            </a>
        </div>
        @foreach($articles->images as $img)
        <div class="swiper-slide">
            <a href="{{asset('')}}data/product/{{$img->img}}" class="grid image-link popup-img">
                <img src="{{asset('')}}data/product/{{$img->img}}" class="img-fluid" alt="#">
            </a>
        </div>
        @endforeach
    </div>
    <style type="text/css">
        .swiper-slide img{ width: 100%; height: 400px; object-fit: cover; }
    </style>
    <div class="swiper-pagination swiper-pagination-white"></div>
    <div class="swiper-button-next swiper-button-white mr-3"></div>
    <div class="swiper-button-prev swiper-button-white ml-3"></div>
</div>

<!-- END SECTION HEADINGS -->
<section class="pooter-slider">
    <div class="container">
        <div class="price">
            @if($articles->product->price > 0)
            <span class="m-none">Giá bán:</span> {{$articles->product->price}} {{$articles->product->unit}}
            @else
            <span class="m-none">Giá bán:</span> Liên hệ
            @endif
        </div>
        <div class="hotline">
            <span class="m-none">Hotline tư vấn</span> <a href="tel:{{$articles->user->phone}}"><i class="fa fa-phone" aria-hidden="true"></i> {{$articles->user->phone}}</a>
        </div>
    </div>
</section>
<!-- START SECTION PROPERTIES LISTING -->
<div class="inner-pages">
        <section class="single-proper blog details inner-pages bg-icon">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 blog-pots">
                        <div class="text-heading text-left">
                            <p><a style="color: #666;" href="{{asset('')}}">Trang chủ </a> &nbsp;/&nbsp; <span>{{$articles->category->name}}</span></p>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="headings-2 pt-0">
                                    <div class="pro-wrapper">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h1 class="mb-2">{{$articles->name}} <!-- <span class="mrg-l-5 category-tag">For Sale</span> --></h1>
                                                <div class="mt-0 address">
                                                    <a class="listing-address">
                                                        <i class="fa fa-map-marker"></i><span>
														{{$articles->address}}
														{{$articles->product->ward_id > 0 ? $articles->product->ward->name.', ' : ''}}
														{{$articles->product->district_id > 0 ? $articles->product->district->name.', ' : ''}}
														{{$articles->product->province_id > 0 ? $articles->product->province->name : ''}}
														</span>
                                                    </a>
                                                    <span class="eye"><i class="fa fa-eye"></i> {{$articles->hits}} view</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single detail-wrapper mr-2">
                                            <div class="detail-wrapper-body">
                                                <div class="price-properties">
                                                    <div class="title title1">
                                                        @if($articles->product->price > 0)
                                                        <span>Giá:</span> {{$articles->product->price}} {{$articles->product->unit}}
                                                        @else
                                                        <span>Giá:</span> Liên hệ
                                                        @endif
                                                    </div>
                                                    <ul class="homes-list clearfix">
                                                        <li>
                                                            <i class="fa fa-object-group" aria-hidden="true"></i>
                                                            <span>{{$articles->product->area}} m2</span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-bed" aria-hidden="true"></i>
                                                            <span>{{$articles->product->bedroom}}</span>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-bath" aria-hidden="true"></i>
                                                            <span>{{$articles->product->toilet}}</span>
                                                        </li>
                                                        
                                                        <!-- <li>
                                                            <i class="fas fa-warehouse" aria-hidden="true"></i>
                                                            <span>{{$articles->product->direction}}</span>
                                                        </li> -->
                                                    </ul>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>

                        <div class="single homes-content  mb-30">
                            <h5 class="mb-3">Chi tiết sản phẩm</h5>
                            {!! $articles->content !!}
                        </div>

                        <div class="single homes-content boxf8 mb-30">
                            <!-- title -->
                            <h5 class="mb-3">Chi tiết sản phẩm</h5>
                            <ul class="homes-list chitiet clearfix">
                                <li>
                                    <span class=" mr-1">Mã SP:</span>
                                    <span class="det font-weight-bold">SP{{$articles->id}}</span>
                                </li>
                                <li>
                                    <span class=" mr-1">Trạng thái:</span>
                                    <span class="det font-weight-bold">Còn hàng</span>
                                </li>
                                <li>
                                    <span class="mr-1">Giá bán:</span>
                                    <span class="font-weight-bold det">{{$articles->product->price}} {{$articles->product->unit}}</span>
                                </li>
                                <li>
                                    <span class="mr-1">Phòng ngủ:</span>
                                    <span class="font-weight-bold det">{{$articles->product->bedroom}}</span>
                                </li>
                                <li>
                                    <span class="mr-1">Phòng tắm:</span>
                                    <span class="font-weight-bold det">{{$articles->product->toilet}}</span>
                                </li>
                                <li>
                                    <span class=" mr-1">Hướng nhà:</span>
                                    <span class="font-weight-bold det">{{$articles->product->direction}}</span>
                                </li>
                                <li>
                                    <span class="mr-1">Diện tích:</span>
                                    <span class="font-weight-bold det">{{$articles->product->area}} m2</span>
                                </li>
                            </ul>
                            <!-- title -->
                        </div>

                        
                        @if($articles->product->maps)
                        <div class="single homes-content  mb-30">
                            <h5 class="mb-3">Bản đồ</h5>
                            {!! $articles->product->maps !!}
                        </div>
                        @endif

                        <!-- <div class="widget-boxed popular mt-5">
                            <div class="widget-boxed-header">
                                <h4>Từ khóa</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <div class="recent-post">
                                    <div class="tags">
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Houses</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                        <span><a href="{{asset('')}}#" class="btn btn-outline-primary">Real Home</a></span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div> -->

                        <div class="single homes-content mb-30 short-info">
                            <ul>
                                <li>
                                    <p>Ngày đăng</p>
                                    <p>{{date('d/m/Y',strtotime($articles->product->updated_at))}}</p>
                                </li>
                                <li>
                                    <p>Người đăng</p>
                                    <p>{{$articles->user->your_name}}</p>
                                </li>
                                <li>
                                    <p>Mã tin</p>
                                    <p>NOV001</p>
                                </li>
                                <li>
                                    <p>Chuyên mục</p>
                                    <p>{{$articles->category->name}}</p>
                                </li>
                            </ul>
                        </div>
                        
                        
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">
                            <!-- end author-verified-badge -->
                            <div class="sidebar">
                                <div class="widget-boxed">
                                    <div class="widget-boxed-body">
                                        <div class="sidebar-widget">
                                            <div class="author-articles author-widget2">
                                                <div class="author-box clearfix">
                                                    <img src="{{asset('')}}data/user/{{$articles->user->avatar}}" alt="author-image" class="author__img">
                                                    <h4 class="author__title">{{$articles->user->your_name}}</h4>
                                                    <p class="author__meta">Tài khoản đã xác minh</p>
                                                </div>
                                                <ul class="author__contact">
                                                    <li><span class="la la-map-marker"><i class="fa fa-map-marker"></i></span>Hà Nội</li>
                                                    <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><a href="{{asset('')}}#">{{$articles->user->phone}}</a></li>
                                                    <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="{{asset('')}}#">{{$articles->user->email}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="agent-contact-form-sidebar">
                                                <h4  class="line_after">Để lại thông tin cần tư vấn</h4>
                                                <form name="contact_form" method="post" action="https://code-theme.com/html/findhouses/functions.php">
                                                    <input type="text" id="fname" name="full_name" placeholder="Họ & Tên" required />
                                                    <input type="number" id="pnumber" name="phone_number" placeholder="Số điện thoại" required />
                                                    <input type="email" id="emailid" name="email_address" placeholder="Địa chỉ email" required />
                                                    <textarea placeholder="Lời nhắn" name="message" required></textarea>
                                                    <input type="submit" name="sendmessage" class="multiple-send-message" value="Gửi đi" />
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-search-field-2">
                                    <div class="widget-boxed mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Sản phẩm mới nhất</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="recent-post">
                                                @foreach($articles_hot as $val)
                                                <div class="recent-main">
                                                    <div class="recent-img">
                                                        <a href="{{asset('')}}{{$val->category->slug}}/{{$val->slug}}"><img src="{{asset('')}}data/product/300/{{$val->img}}" alt=""></a>
                                                    </div>
                                                    <div class="info-img">
                                                        <a href="{{asset('')}}{{$val->category->slug}}/{{$val->slug}}"><h6>{{$val->name}}</h6></a>
                                                        <!-- <p>$230,000</p> -->
                                                    </div>
                                                    <div class="clr"></div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- End: Specials offer -->
                                    
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <!-- START SIMILAR PROPERTIES -->
                <section class="similar-property portfolio bshd p-0 bg-white-inner related-products">
                    <h5>Sản phẩm liên quan</h5>
                    <div class="row portfolio-items">
                        @foreach($lienquan as $val)
                        <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                            @include('layout.iteamproduct')
                        </div>
                        @endforeach
                    </div>
                </section>
                <!-- END SIMILAR PROPERTIES -->
            </div>
        </section>

        </div>
        <!-- END SECTION PROPERTIES LISTING -->
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
<!-- <script src="admin_asset/select2/js/select2.min.js"></script> -->
<!-- <script type="text/javascript"> $(document).ready(function() { $('.select2').select2({ placeholder: 'Danh mục' }); }); </script> -->

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 3,
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
                spaceBetween: 5,
            },
            768: {
                slidesPerView: 1,
                spaceBetween: 5,
            },
            1024: {
                slidesPerView: 2,
                spaceBetween: 5,
            },
        }
    });
</script>

@endsection