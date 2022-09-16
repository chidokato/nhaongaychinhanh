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
<link rel="stylesheet" href="frontend/css/search.css"> 
<link rel="stylesheet" href="frontend/css/responsive.css">
<!-- <link rel="stylesheet" id="color" href="frontend/css/default.css"> -->
<!-- <link rel="stylesheet" id="color" href="frontend/css/colors/pink.css"> -->
<!-- ================= js ================== --> 
<!-- select2 multiple css -->
<link href="frontend/select2/css/select2.min.css" rel="stylesheet">
@endsection

@section('content') 
@include('layout.header')

<!-- @include('layout.search') -->

<section class="properties-list featured portfolio blog bg-icon">
	<div class="container container-header">
        <div class="row">
            <div class="col-lg-9 col-md-12 blog-pots">
        		<section class="headings-2 pt-0 pb-0">
        			<div class="pro-wrapper">
        				<div class="detail-wrapper-body">
        					<div class="listing-title-bar">
        						<div class="text-heading text-left">
        							<p><a href="{{asset('')}}">Trang chủ </a> &nbsp;/&nbsp; <span>{{$category->name}}</span></p>
        						</div>
        						<div style="display: flex; justify-content: space-between; align-items: center;">
                                    <h1>{{$category->name}}</h1> <span><span class="number-pro">{{ count($product) }}</span> sản phẩm</span>                  
                                </div>
        					</div>
        				</div>
        			</div>
        		</section>
            </div>
        </div>
		<!-- Search Form -->
		<div class="row">
			<div class="col-lg-9 col-md-12 blog-pots">
				<div class="row">
					@foreach($product as $val)
					<div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                        @include('layout.iteamproduct')
					</div>
					@endforeach
					
				</div>
			</div>
			<aside class="col-lg-3 col-md-12 blog blog-section inner-pages">
                @include('layout.sidebar_pro')
            </aside>
		</div>
		<nav class="agents pt-55">
            {{ $product->links() }}
        </nav>
	</div>
</section>
@include('layout.footer')
@endsection

@section('js')
<!-- ARCHIVES JS -->
<script src="frontend/js/jquery-3.5.1.min.js"></script>
<script src="frontend/js/bootstrap.min.js"></script>
<script src="frontend/js/mmenu.min.js"></script>
<script src="frontend/js/mmenu.js"></script>
<script src="frontend/js/smooth-scroll.min.js"></script>
<script src="frontend/js/inner.js"></script>
<script src="frontend/js/custom.js"></script>

<script src="frontend/select2/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2({ placeholder: 'Danh mục' });
        $('.tinhthanh').select2({ placeholder: 'Tỉnh / Thành' });
        $('.quanhuyen').select2({ placeholder: 'Quận / Huyện' });
        $('.phuongxa').select2({ placeholder: 'Phường / Xã' });
        $('.duong').select2({ placeholder: 'Đường' });
        $('.ngu').select2({ placeholder: 'Phòng ngủ' });
        $('.wc').select2({ placeholder: 'WC' });
        $('.huong').select2({ placeholder: 'Hướng nhà' });
        $('.gia').select2({ placeholder: 'Giá tiền' });
    });
</script>
@endsection