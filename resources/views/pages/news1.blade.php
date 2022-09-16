@extends('layout.index')

@section('title'){{ isset($category->title) ? $category->title : $category->name }}@endsection
@section('description'){{$category->description}}@endsection
@section('keywords'){{$category->keywords}}@endsection
@section('robots'){{ $category->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$category['slug']}}@endsection

@section('content')
@include('layout.header-1')
<div class="inner-pages">
  <section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>{{$category->name}}</h1>
            <h2><a href="{{asset('')}}">Trang chủ </a> &nbsp;/&nbsp; {{$category->name}}</h2>
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
                                    <span class="date">April 11, 2020 &nbsp;/</span>
                                    <ul class="action-list pl-0">
                                        <li class="action-item pl-2"><i class="fa fa-heart"></i> <span>306</span></li>
                                        <li class="action-item"><i class="fa fa-comment"></i> <span>34</span></li>
                                        <li class="action-item"><i class="fa fa-share-alt"></i> <span>122</span></li>
                                    </ul>
                                </div>
                                <div class="news-item-descr">
                                    <p>{{$val->detail}} ...</p>
                                </div>
                                <div class="news-item-bottom">
                                    <a href="{{$val->category->slug}}/{{$val->slug}}" class="news-link">Read more...</a>
                                    <div class="admin">
                                        <p>{{$val->user->your_name}}</p>
                                        <img src="data/user/{{$val->user->avatar}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    
                </div>
            </div>
            <aside class="col-lg-3 col-md-12">
                <div class="widget">
                    <h5 class="font-weight-bold mb-4">Tìm kiếm</h5>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                    <button class="btn btn-primary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </span>
                    </div>
                    <div class="recent-post py-5">
                        <h5 class="font-weight-bold">Danh mục</h5>
                        <ul>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>House</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Garages</a></li>
                            
                        </ul>
                    </div>
                    <!-- <div class="recent-post pt-5">
                        <h5 class="font-weight-bold mb-4">Recent Posts</h5>
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="images/blog/b-1.jpg" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Real Estate</h6></a>
                                <p>May 10, 2020</p>
                            </div>
                        </div>
                        <div class="recent-main my-4">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="images/blog/b-2.jpg" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Real Estate</h6></a>
                                <p>May 10, 2020</p>
                            </div>
                        </div>
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="images/blog/b-3.jpg" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Real Estate</h6></a>
                                <p>May 10, 2020</p>
                            </div>
                        </div>
                    </div> -->
                </div>
            </aside>
        </div>
        <nav aria-label="..." class="agents pt-55">
            <ul class="pagination disabled">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>




</div>

@endsection