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
<link rel="stylesheet" href="frontend/css/uploadimages.css">

<!-- <link rel="stylesheet" id="color" href="frontend/css/default.css"> -->
<!-- <link rel="stylesheet" id="color" href="frontend/css/colors/pink.css"> -->
<link rel="stylesheet" href="frontend/css/dashbord-mobile-menu.css">
<link rel="stylesheet" href="frontend/css/post.css">
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
            <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 mt-3 user-dash2">
                <!-- <div class="dashboard_navigationbar dashxl">
                    <div class="dropdown">
                        <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i> Dashboard Navigation</button>
                        <ul id="myDropdown" class="dropdown-content">
                            <li>
                                <a href="profile">
                                    <i class="fa fa-user"></i>Th??ng tin c?? nh??n
                                </a>
                            </li>
                            <li>
                                <a href="profile/listitem">
                                    <i class="fa fa-list" aria-hidden="true"></i>Qu???n l?? tin ????ng
                                </a>
                            </li>
                            <li>
                                <a href="profile/changepassword">
                                    <i class="fa fa-lock"></i>?????i m???t kh???u
                                </a>
                            </li>
                            <li>
                                <a href="profile/logout">
                                    <i class="fas fa-sign-out-alt"></i>????ng xu???t
                                </a>
                            </li>
                        </ul>
                    </div>
                </div> -->

                <form id="validateForm" action="profile/articles/{{ isset($data)? 'edit/'.$data->id:'post' }}" method="POST" class="post" enctype="multipart/form-data"><input type="hidden" name="_token" value="{{csrf_token()}}" />
                <div class="row">
                    <div class="col-lg-9">
                        <div class="mobile-dashbord dashbord">
                            <div class="widget-boxed-header mb-3">
                                <h4>N???i dung tin ????ng</h4>
                            </div>
                            <div class="property-form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Lo???i h??nh b??s</label>
                                            <ul class="nav nav-tabs loaihinh flex" role="tablist">
                                                @foreach($category as $key => $val)
                                                <?php
                                                    if (isset($data)) {
                                                        if ($val->id == $parent->parent) {$active = 'active';}else{$active = '';}
                                                    }else{
                                                        if ($key==0) {$active = 'active';}else{$active = '';}
                                                    }
                                                ?>
                                                <li class="nav-item">
                                                    <a id="{{$val->id}}" onClick="reply_click(this.id)" class="nav-link {{ $active }}" data-toggle="tab" role="tab" href="#">{{$val->name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Lo???i nh?? ?????t</label>
                                            <select name="category_id" id="loainhadat" class="input-group select2">
                                                @foreach($subcategory as $val)
                                                <option <?php if(isset($data) && $data->category_id == $val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Ti??u ?????</label> <span style="font-size: .8rem;"> (K?? t??? c??n l???i: <span id="chars_title">120</span>) </span>
                                            <input onkeyup="changetitle(this);"  value="{{ isset($data)? $data->name:'' }}" class="input-group" type="text" name="name" placeholder="Ti??u ?????">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>N???i dung</label>
                                            <textarea class="input-group ckeditor" name="content" id="ckeditor">{!! isset($data)? $data->content:'' !!}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mobile-dashbord dashbord">
                            <div class="widget-boxed-header mb-3">
                                <h4>Th??ng tin c?? b???n</h4>
                            </div>
                            <div class="property-form-group">
                                <div class="row">
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="flex space-between">
                                                <label>Gi?? ti???n</label>
                                                <!-- <label class="click">Th???a thu???n</label> -->
                                            </div>
                                            <div class="flex price">
                                                <input value="{{ isset($data)? $data->product->price:'' }}" class="input-group" type="text" id="currency" data-type="currency" name="price" placeholder="Gi?? ti???n">
                                                <select name='unit' id="unit" class="input-group">
                                                    <option <?php if(isset($data) && $data->product->unit == 'T???'){ echo 'selected'; } ?> value="1000000000">T???</option>
                                                    <option <?php if(isset($data) && $data->product->unit == 'Tri???u'){ echo 'selected'; } ?> value="1000000">Tri???u</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group area">
                                            <label>Di???n t??ch</label>
                                            <input value="{{ isset($data)? $data->product->area:'' }}" class="input-group area" type="text" name="area" placeholder="Di???n t??ch">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label></label>
                                        <!-- <div class="viewprice">????n gi??: <span>100tr/m2</span></div> -->
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>T???nh / Th??nh</label>
                                            <select name="province_id" class="input-group tinhthanh" id="province">
                                                <option value="">...</option>
                                                @foreach($province as $val)
                                                <option <?php if(isset($data) && $data->product->province_id == $val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Qu???n / Huy???n</label>
                                            <select name="district_id" class="input-group quanhuyen" id="district">
                                                <option value="">...</option>
                                                @if(isset($data))
                                                @foreach($district as $val)
                                                <option <?php if(isset($data) && $data->product->district_id == $val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ph?????ng / X??</label>
                                            <select name="ward_id" class="input-group phuongxa" id="ward">
                                                <option value="">...</option>
                                                @if(isset($data))
                                                @foreach($ward as $val)
                                                <option <?php if(isset($data) && $data->product->ward_id == $val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>???????ng ph???</label>
                                            <select name="street_id" class="input-group duong" id="street">
                                                <option value="">...</option>
                                                @if(isset($data))
                                                @foreach($street as $val)
                                                <option <?php if(isset($data) && $data->product->street_id == $val->id){ echo 'selected'; } ?> value="{{$val->id}}">{{$val->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>?????a ch???: 
                                                <span class="address-val">{{ isset($data)? $data->product->address:'' }}</span> 
                                                <span class="street-val">{{ isset($data->product->street->name)? $data->product->street->name:'' }}</span> 
                                                <span class="ward-val">{{ isset($data->product->ward->name)? $data->product->ward->name:'' }}</span> 
                                                <span class="district-val">{{ isset($data->product->district->name)? $data->product->district->name:'' }}</span> 
                                                <span class="province-val">{{ isset($data->product->province->name)? $data->product->province->name:'' }}</span>
                                            </label>
                                            <input value="{{ isset($data)? $data->product->address:'' }}" id="address-val" class="input-group" type="text" name="address" placeholder="?????a ch??? chi ti???t">
                                        </div>
                                    </div>
                                </div>
                                <div id="demo" class="row collapse">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Ph??ng ng???</label>
                                            <input value="{{ isset($data)? $data->product->bedroom:'' }}" class="input-group" type="text" name="bedroom" placeholder="Ph??ng ng???">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>V??? sinh</label>
                                            <input value="{{ isset($data)? $data->product->toilet:'' }}" class="input-group" type="text" name="toilet" placeholder="V??? sinh">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>H?????ng nh??</label>
                                            <select class="direction input-group" name="direction">
                                                <option value="">...</option>
                                                <option <?php if(isset($data) && $data->product->direction == '????ng'){ echo 'selected'; } ?> value="????ng">????ng</option>
                                                <option <?php if(isset($data) && $data->product->direction == 'T??y'){ echo 'selected'; } ?> value="T??y">T??y</option>
                                                <option <?php if(isset($data) && $data->product->direction == 'Nam'){ echo 'selected'; } ?> value="Nam">Nam</option>
                                                <option <?php if(isset($data) && $data->product->direction == 'B???c'){ echo 'selected'; } ?> value="B???c">B???c</option>
                                                <option <?php if(isset($data) && $data->product->direction == '????ng Nam'){ echo 'selected'; } ?> value="????ng Nam">????ng Nam</option>
                                                <option <?php if(isset($data) && $data->product->direction == '????ng B???c'){ echo 'selected'; } ?> value="????ng B???c">????ng B???c</option>
                                                <option <?php if(isset($data) && $data->product->direction == 'T??y Nam'){ echo 'selected'; } ?> value="T??y Nam">T??y Nam</option>
                                                <option <?php if(isset($data) && $data->product->direction == 'T??y B???c'){ echo 'selected'; } ?> value="T??y B???c">T??y B???c</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>B???n ?????</label>
                                            <textarea class="input-group" name="maps" rows="2" placeholder="M?? nh??ng b???n ?????">{{ isset($data)? $data->product->maps:'' }}</textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                <button id="clickmore" type="button" data-toggle="collapse" data-target="#demo">Xem th??m</button>
                            </div>
                        </div>
                        <div class="mobile-dashbord dashbord">
                            <div class="widget-boxed-header mb-3">
                                <h4>C???u h??nh SEO</h4>
                            </div>
                            <div class="property-form-group">
                                <div id="seooption" class="row collapse">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input value="{{ isset($data)? $data->seo->title:'' }}" class="input-group" type="text" name="title" placeholder="...">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <input value="{{ isset($data)? $data->seo->description:'' }}" class="input-group" type="text" name="description" placeholder="...">
                                        </div>
                                    </div>
                                </div>
                                <button id="clickmore" type="button" data-toggle="collapse" data-target="#seooption">Xem th??m</button>
                            </div>
                        </div>
                        <div class="dashbord button sticky-bt0 postarctile">
                            <button type="submit" class="btn btn-info mr-3"><i class="far fa-save"></i> ????ng tin</button>
                            <button type="button" onclick="goBack()" class="btn btn-info back mr-3"><i class="fa fa-arrow-left" aria-hidden="true"></i> Tr??? v???</button>
                            @if(isset($data))<a style="float: right;" target="_blank" href="{{$data->category->slug}}/{{$data->slug}}"><button type="button" class="btn btn-outline btn-primary"><i class="fa fa-share" aria-hidden="true"></i> Xem th???c t???</button></a>@endif
                        </div>
                    </div>
                    <div class="col-lg-3 mobile-dashbord">
                        <div class="sticky-101">
                            <div class="widget-boxed-header dashbord ">
                                <div class="file-upload">
                                    <div class="file-upload-content" onclick="$('.file-upload-input').trigger( 'click' )">
                                        <img class="file-upload-image" src="{{ isset($data) ? 'data/product/'.$data->img : 'data/up-images.png' }}" />
                                    </div>
                                    <div class="image-upload-wrap">
                                        <input name="img" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" />
                                    </div>
                                </div>
                                <div class="upload__box">
                                    <label class="upload__btn">
                                        <p>Th??m ???nh</p>
                                        <input type="file" multiple name="images[]" data-max_length="20" class="upload__inputfile">
                                    </label>
                                    <p>Nh???n v?? gi??? ph??m CTRL ????? th??m nhi???u ???nh !!</p>
                                    <div class="upload__img-wrap">
                                        <div class="upload__btn-box">
                                            
                                        </div>
                                        @if(isset($data))
                                        @foreach($data->images as $val)
                                        <div class='upload__img-box' id="detail_img">
                                            <input type="hidden" id="id_img_detail" value="{{$val->id}}" />
                                            <div style='background-image: url("data/product/{{$val->img}}")' class='img-bg'>
                                                <div id="delimg" class='upload__img-close'></div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>

                            
                        </div>
                        
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
</section>
<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>

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
<script type="text/javascript"> $(document).ready(function() { $('.select2').select2({ placeholder: 'Danh m???c' }); }); </script>
<script type="text/javascript"> $(document).ready(function() { $('.tinhthanh').select2({ placeholder: 'T???nh / Th??nh' }); }); </script>
<script type="text/javascript"> $(document).ready(function() { $('.quanhuyen').select2({ placeholder: 'Qu???n / Huy???n' }); }); </script>
<script type="text/javascript"> $(document).ready(function() { $('.phuongxa').select2({ placeholder: 'Ph?????ng / X??' }); }); </script>
<script type="text/javascript"> $(document).ready(function() { $('.duong').select2({ placeholder: '???????ng' }); }); </script>
<script type="text/javascript"> $(document).ready(function() { $('.ngu').select2({ placeholder: 'Ph??ng ng???' }); }); </script>
<script type="text/javascript"> $(document).ready(function() { $('.wc').select2({ placeholder: 'WC' }); }); </script>
<script type="text/javascript"> $(document).ready(function() { $('.huong').select2({ placeholder: 'H?????ng nh??' }); }); </script>
<script type="text/javascript"> $(document).ready(function() { $('.gia').select2({ placeholder: 'Gi?? ti???n' }); }); </script>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
<script src="admin_asset/js/validate.js"></script>

<script src="ckeditor/ckeditor.js"></script>

<script src="admin_asset/js/pages/crud/file-upload/image-inpute3c3.js?v=7.2.5"></script>
<script src="frontend/js/custom.js"></script>

@endsection