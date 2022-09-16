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
<?php use App\category; ?>
<section class="dashboard-bd inner-pages">
<!-- START SECTION USER PROFILE -->
<section class="user-page">
    <div class="container-fluid">
        <div class="row">
            @include('layout.navbar')
            <div class="col-lg-9 col-md-12 col-xs-12 pb-5 pt-5 royal-add-property-area section_100 user-dash2">
                <div class="property-form-group mt-3">
                    <form action="profile/search_post" method="POST"><input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="flex">
                            <p class="mr-4"><input value="{{ isset($key)? $key:'' }}" type="text" name="key" placeholder="Nhập từ khóa"></p>
                            <p class="mr-4">
                                <select name="category_id" class="select2">
                                    <option value="">Tất cả danh mục</option>
                                    @foreach($category as $val)
                                    <option {{ isset($category_id) && $category_id==$val->id ? 'selected':''  }} value="{{$val->id}}">{{$val->name}}</option>
                                    <?php $subcats = category::where('parent', $val->id)->get(); ?>
                                    @foreach($subcats as $subcat)
                                    <option {{ isset($category_id) && $category_id==$subcat->id ? 'selected':''  }} value="{{$subcat->id}}">--{{$subcat->name}}</option>
                                    @endforeach
                                    @endforeach
                                </select>
                            </p>
                            <p class="mr-4"><input value="{{ isset($datefilter)? $datefilter:'' }}" type="text" class="form-control mr-3" name="datefilter" value="{{ isset($datefilter) ? $datefilter : '' }}" placeholder='Ngày đăng ...' /></p>
                            <p class="mr-4"><input type="submit" value="Tìm kiếm"></p>
                        </div>
                    </form>
                </div>

                <div class="my-properties">
                    <table class="table-responsive">
                        <thead class="sticky-71 m-none">
                            <tr>
                                <th class="pl-2" colspan="2">Thông tin bất động sản</th>
                                <th>Ngày update <i>(Ngày đăng)</i></th>
                                <!-- <th>Lượt xem</th> -->
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($articles as $val)
                            <tr class="content">
                                <td class="image myelist">
                                    <a target="_blank" href="{{$val->category->slug}}/{{$val->slug}}"><img alt="my-properties-3" src="data/product/{{$val->img}}" class="img-fluid"></a>
                                </td>
                                <td>
                                    <div class="inner">
                                        <a target="_blank" href="{{$val->category->slug}}/{{$val->slug}}"><h2>{{$val->name}}</h2></a>
                                        <figure class="mb-2"><i class="fa fa-map-marker"></i>
                                            {{$val->address}}
                                            {{ isset($val->product->ward_id) ? $val->product->ward->name.', ' : ''}}
                                            {{ isset($val->product->district_id) ? $val->product->district->name.', ' : ''}}
                                            {{ isset($val->product->province_id) ? $val->product->province->name : ''}}
                                        </figure>
                                        <div class="listing-title-bar price" >
                                            @if( isset($val->product->price) )
                                            <h4 style="font-size: .9rem">Giá bán: <span style="color: #f4821e; font-size: 1.2rem">{{$val->product->price}} {{$val->product->unit}}</span></h4>
                                            @else 
                                            <h4 style="font-size: .9rem">Giá bán: Liên hệ</h4>
                                            @endif
                                            <!-- <span>$ 1,200 / sq ft</span> -->
                                        </div>
                                    </div>
                                </td>
                                <td>{{date('d/m/Y',strtotime($val->updated_at))}}  <i>({{date('d/m/Y',strtotime($val->created_at))}})</i></td>
                                <!-- <td>{{ $val->hist }}</td> -->
                                <td class="actions">
                                    <a href="profile/articles/edit/{{$val->id}}" class="edit mr-3"><i class="fa fa-pencil"></i> Sửa</a>
                                    <a href="profile/articles/delete/{{$val->id}}"><i class="far fa-trash-alt mr-1"></i> Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="prperty-submit-button"><button id="loadMore">Xem thêm</button></div>
                </div>


<style type="text/css">
.content {
  display: none; padding: 0px 10px;
}
#loadMore {
  display: block;
  transition: .3s;
}
.noContent {
  color: #000 !important;
  background-color: transparent !important;
  pointer-events: none;
}
.inner-pages .prperty-submit-button > button:hover {
    background: #0a5597 none repeat scroll 0 0;
    color: #fff !important;
}
.inner-pages .prperty-submit-button > button:focus{ outline: none !important; }
</style>

                <!-- START FOOTER -->
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

<!-- date -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
$(function() {
    $('input[name="datefilter"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
    });
    $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
    });
    $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  $(".content").slice(0, 12).show();
  $("#loadMore").on("click", function(e){
    e.preventDefault();
    $(".content:hidden").slice(0, 5).slideDown();
    if($(".content:hidden").length == 0) {
      $("#loadMore").text("No Content").addClass("noContent");
    }
  });
  
})
</script>

<!-- select2 multiple JavaScript -->
<script src="admin_asset/select2/js/select2.min.js"></script>
<script type="text/javascript"> $(document).ready(function() { $('.select2').select2({ placeholder: 'Danh mục' }); }); </script>



@endsection