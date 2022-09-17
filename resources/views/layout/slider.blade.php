<!-- STAR HEADER SEARCH -->
@foreach($slider as $val)
        <section id="hero-area" class="parallax-searchs home15 overlay thome-6 thome-1" data-stellar-background-ratio="0.5" style="background:url(data/themes/{{$val->img}}) no-repeat center top;background-size: cover;">
            <div class="hero-main">
                <div class="container container-seaech" data-aos="zoom-in"> 
            <div class="hero-inner">
                <!-- Welcome Text -->
                <div class="welcome-text">
                    <p class="style">Tìm kiếm ngay</p>
                    <p class="title">Ngôi nhà mơ ước của <span>Bạn</span></p>
                    <p>{{$val->name}}</p>
                </div>
                <!--/ End Welcome Text -->
                <!-- Search Form -->
                <div class="row">
                    <div class="col-12 col-xl-7">
                    <div class="banner-search-wrap">
                        <ul class="nav nav-tabs rld-banner-tab">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs_1">MUA / BÁN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs_2">CHO THUÊ</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs_1">
                                <div class="rld-main-search">
                                    <form action="search-product" method="POST" class="widget-search" >
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="cat_parent" value="134" />
                                        <div class="row space-between">
                                            <div class="rld-single-select ml-3">
                                                <label>Loại nhà đất</label>
                                                <select class="select single-select select2" name="category_search_id">
                                                    <option value="">Danh mục</option>
                                                    @foreach($s_category as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="rld-single-input">
                                                <label>Tìm kiếm theo từ khóa</label>
                                                <input type="text" placeholder="Enter Keyword...">
                                            </div>
                                            <div class="ml-3 mr-2">
                                                <button class="btn btn-yellow" type="submit">TÌM KIẾM</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tabs_2">
                                <div class="rld-main-search">
                                    <form action="search-product" method="POST" class="widget-search" >
                                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                        <input type="hidden" name="cat_parent" value="134" />
                                        <div class="row space-between">
                                            <div class="rld-single-select ml-3">
                                                <label>Loại nhà đất</label>
                                                <select class="select single-select select2" name="category_search_id">
                                                    <option value="">Danh mục</option>
                                                    @foreach($s_category as $val)
                                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="rld-single-input">
                                                <label>Tìm kiếm theo từ khóa</label>
                                                <input type="text" placeholder="Enter Keyword...">
                                            </div>
                                            <div class="ml-3 mr-2">
                                                <button class="btn btn-yellow" type="submit">TÌM KIẾM</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <!--/ End Search Form -->
            </div>
        </div>
    </div>
</section>
@endforeach
<!-- END HEADER SEARCH -->


