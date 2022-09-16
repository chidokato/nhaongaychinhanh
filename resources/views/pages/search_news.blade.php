@extends('layout.index')

@section('title') Tìm kiếm {{$key}} @endsection
@section('description') Mô tả {{$key}} @endsection
@section('keywords') {{$key}} @endsection
@section('robots') noindex, nofollow @endsection
@section('url'){{asset('').'tim-kiem-tin-tuc'}}@endsection

@section('content')
@include('layout.header-1')
<div class="inner-pages">
  <section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>Từ khóa tìm kiếm: <i>{{$key}}</i></h1>
            <h2><a href="{{asset('')}}">Trang chủ </a></h2>
        </div>
    </div>
</section>

<section class="blog blog-section">
    <div class="container"> 
        <div class="row">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        @foreach($articles as $val)
                        <div class="news-item news-item-sm">
                            <a href="{{$val->category->slug}}/{{$val->slug}}" class="news-img-link">
                                <div class="news-item-img">
                                    <img class="resp-img" src="data/news/{{$val->img}}" alt="blog image">
                                </div>
                            </a>
                            <div class="news-item-text">
                                <a href="{{$val->category->slug}}/{{$val->slug}}"><h3>{{$val->name}}</h3></a>
                                <div class="dates">
                                    <ul class="action-list pl-0">
                                        <li class="action-item pl-0"><i class="fa fa-calendar" aria-hidden="true"></i> <span> {{date('d/m/Y',strtotime($val->created_at))}}</span></li>
                                        <li class="action-item"><i class="fa fa-user" aria-hidden="true"></i> <span> {{$val->user->name}}</span></li>
                                        <li class="action-item"><i class="fa fa-eye" aria-hidden="true"></i> <span> {{$val->hits}} view</span></li>
                                    </ul>
                                </div>
                                <div class="news-item-descr">
                                    <p>{{$val->detail}} ...</p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="{{$val->category->slug}}/{{$val->slug}}" class="news-link">Xem thêm...</a>
                                    <div class="admin">
                                        <p>{{$val->user->your_name}}</p>
                                        <img src="data/user/{{$val->user->avatar}}" alt="{{$val->user->your_name}}">
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
                    <h5 class="font-weight-bold mb-4">Tìm kiếm</h5>
                    <form action="search-news" method="POST" >
                    <input type="hidden"  name="_token" value="{{csrf_token()}}" />
                    <div class="input-group">
                        <input value="{{$key}}" name="key" type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div>
                    <!-- <div class="input-group">
                        <select class="form-control">
                            <option>ádasd</option>
                            <option>ádasd</option>
                        </select>
                    </div> -->
                    </form>

                    <div class="recent-post py-5">
                        <h5 class="font-weight-bold">Danh mục</h5>
                        <ul>
                            <li><a href="review-4-phuong"><i class="fa fa-caret-right" aria-hidden="true"></i>Review 4 phương</a></li>
                            <li><a href="tin-tuc"><i class="fa fa-caret-right" aria-hidden="true"></i>Tin tức</a></li>
                        </ul>
                    </div>
                    <div class="recent-post pt-5">
                        <h5 class="font-weight-bold mb-4">Tin được xem nhiều</h5>
                        @foreach($articles_hit as $val)
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/news/300/{{$val->img}}" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="{{$val->category->slug}}/{{$val->slug}}"><h6>{{$val->name}}</h6></a>
                                <!-- <p>May 10, 2020</p> -->
                            </div>
                            <div class="clr"></div>
                        </div>
                        @endforeach<!-- 
                        <div class="recent-main my-4">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="images/blog/b-2.jpg" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Real Estate</h6></a>
                                <p>May 10, 2020</p>
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="images/blog/b-3.jpg" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Real Estate</h6></a>
                                <p>May 10, 2020</p>
                            </div>
                            <div class="clr"></div>
                        </div> -->
                    </div>
                </div>
            </aside>
        </div>
        
    </div>
</section>




</div>

@endsection