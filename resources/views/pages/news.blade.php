@extends('layout.index')

@section('title'){{ isset($category->title) ? $category->title : $category->name }}@endsection
@section('description'){{$category->description}}@endsection
@section('keywords'){{$category->keywords}}@endsection
@section('robots'){{ $category->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$category['slug']}}@endsection


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
<link rel="stylesheet" href="frontend/css/search.css"> 
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
<div class="inner-pages">
<section class="main-search">
    <div class="container search-news">
        <div class="text-left">
            <a href="{{asset('')}}">Trang chủ </a> &nbsp;/&nbsp; <span>{{$category->name}}</span>
        </div>
        <div class="search">
            <form action="search-news" method="POST" >
                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="input-group">
                    <input name="key" type="text" class="form-control mr-2" placeholder="Search for...">
                    <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>
</section>

<section class="blog blog-section bg-icon">
    <div class="container"> 
        <div class="row  pt-4">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <section class="headings-2 pt-0 pb-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <h1 class="mb-4">{{$category->name}}</h1>                 
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        @foreach($articles as $val)
                        <div class="news-item news-item-sm">
                            <a href="{{$val->category->slug}}/{{$val->slug}}" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="resp-img" src="data/news/{{$val->img}}" alt="blog image">
                                    <div class="date-news">
                                        <span>20</span>
                                        <span>T8/2022</span>
                                    </div>
                                </div>
                            </a>
                            <div class="news-item-text">
                                <a href="{{$val->category->slug}}/{{$val->slug}}"><h2 class="h2" >{{$val->name}}</h2></a>
                                
                                <div class="news-item-descr">
                                    <p>{{$val->detail}}</p>
                                </div>
                                <div class="news-item-bottom">
                                    <div class="admin">
                                        <img src="data/user/{{$val->user->avatar}}" alt="{{$val->user->your_name}}">
                                        <p class="ml-2 m-none">by: <span>{{$val->user->your_name}}</span></p>
                                    </div>
                                    <div class="dates">
                                        <ul class="action-list pl-0">
                                            <li class="action-item pl-0 mr-3"><i class="fa fa-calendar" aria-hidden="true"></i> <span> {{date('d/m/Y',strtotime($val->created_at))}}</span></li>
                                            <li class="action-item"><i class="fa fa-eye" aria-hidden="true"></i> <span> {{$val->hits}} view</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <nav class="agents pt-55">
                        {{ $articles->links() }}
                    </nav>
                </div>
            </div>
            <aside class="col-lg-3 col-md-12">
                <div class="widget">
                    <div class="recent-post py-4">
                        <h5 class="font-weight-bold">Danh mục</h5>
                        <ul>
                            <li><a href="review-4-phuong"><i class="fa fa-caret-right" aria-hidden="true"></i>Review 4 phương</a></li>
                            <li><a href="tin-tuc"><i class="fa fa-caret-right" aria-hidden="true"></i>Tin tức</a></li>
                        </ul>
                    </div>
                    <div class="recent-post pt-4">
                        <h5 class="font-weight-bold mb-4">Tin được xem nhiều</h5>
                        @foreach($articles_hit as $val)
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/news/300/{{$val->img}}" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="{{$val->category->slug}}/{{$val->slug}}"><h4>{{$val->name}}</h4></a>
                                <!-- <p>May 10, 2020</p> -->
                            </div>
                            <div class="clr"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
        
    </div>
</section>




</div>
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
<!-- <script src="frontend/js/jquery.magnific-popup.min.js"></script> -->
<!-- <script src="frontend/js/popup.js"></script> -->
<!-- <script src="frontend/js/ajaxchimp.min.js"></script> -->
<!-- <script src="frontend/js/newsletter.js"></script> -->
<!-- <script src="frontend/js/timedropper.js"></script> -->
<!-- <script src="frontend/js/datedropper.js"></script> -->
<!-- <script src="frontend/js/searched.js"></script> -->
<!-- <script src="frontend/js/leaflet.js"></script>
<script src="frontend/js/leaflet-gesture-handling.min.js"></script>
<script src="frontend/js/leaflet-providers.js"></script>
<script src="frontend/js/leaflet.markercluster.js"></script>
<script src="frontend/js/map-single.js"></script>
<script src="frontend/js/color-switcher.js"></script>
<script src="frontend/js/swiper.min.js"></script>
<script src="frontend/js/inner.js"></script> -->

<!-- select2 multiple JavaScript -->
<!-- <script src="admin_asset/select2/js/select2.min.js"></script> -->
<!-- <script type="text/javascript"> $(document).ready(function() { $('.select2').select2({ placeholder: 'Danh mục' }); }); </script> -->
@endsection