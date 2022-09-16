@extends('layout.index')

@section('title'){{ isset($articles->title) ? $articles->title : $articles->name }}@endsection
@section('description'){{$articles->description}}@endsection
@section('keywords'){{$articles->keywords}}@endsection
@section('robots'){{ $articles->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$articles->category->slug.'/'.$articles->slug.'.html'}}@endsection

@section('content')
<?php use App\user; ?>
@include('layout.header-1')

<div class="inner-pages">
  <section class="headings">
    <div class="text-heading text-center">
        <div class="container">
            <h1>{{$articles->name}}</h1>
            <h2><a href="{{asset('')}}">Trang chủ </a> &nbsp;/&nbsp; {{$articles->name}}</h2>
        </div>
    </div>
</section>

<section class="blog blog-section bg-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 blog-pots">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="news-item details no-mb2">
                            <div class="news-item-text details pb-0">
                                <h1>{{$articles->name}}</h1>
                                <div class="dates">
                                    <ul class="action-list pl-0">
                                        <li class="action-item pl-0"><i class="fa fa-calendar" aria-hidden="true"></i> <span> {{date('d/m/Y',strtotime($articles->created_at))}}</span></li>
                                        <li class="action-item"><i class="fa fa-user" aria-hidden="true"></i> <span> {{$articles->user->name}}</span></li>
                                        <li class="action-item"><i class="fa fa-eye" aria-hidden="true"></i> <span> {{$articles->hits}} view</span></li>
                                    </ul>
                                </div>
                                <div class="content-detail">
                                    {!!$articles->content!!}
                                </div>
                            </div>
                        </div>
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
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Real Estate</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Real Home</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Bath</a></li>
                            <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>Beds</a></li>
                        </ul>
                    </div>
                    <!-- <div class="recent-post">
                        <h5 class="font-weight-bold mb-4">Popular Tags</h5>
                        <div class="tags">
                            <span><a href="#" class="btn btn-outline-primary">Houses</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Real Home</a></span>
                        </div>
                        <div class="tags">
                            <span><a href="#" class="btn btn-outline-primary">Baths</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Beds</a></span>
                        </div>
                        <div class="tags">
                            <span><a href="#" class="btn btn-outline-primary">Garages</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Family</a></span>
                        </div>
                        <div class="tags">
                            <span><a href="#" class="btn btn-outline-primary">Real Estates</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Properties</a></span>
                        </div>
                        <div class="tags">
                            <span><a href="#" class="btn btn-outline-primary">Location</a></span>
                            <span><a href="#" class="btn btn-outline-primary">Price</a></span>
                        </div>
                    </div> -->
                    <!-- <div class="recent-post pt-5">
                        <h5 class="font-weight-bold mb-4">Recent Posts</h5>
                        <div class="recent-main">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="https://code-theme.com/html/findhouses/images/blog/b-1.jpg" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Real Estate</h6></a>
                                <p>May 10, 2020</p>
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="recent-main my-4">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="https://code-theme.com/html/findhouses/images/blog/b-1.jpg" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Real Estate</h6></a>
                                <p>May 10, 2020</p>
                            </div>
                            <div class="clr"></div>
                        </div>
                        <div class="recent-main no-mb">
                            <div class="recent-img">
                                <a href="blog-details.html"><img src="https://code-theme.com/html/findhouses/images/blog/b-1.jpg" alt=""></a>
                            </div>
                            <div class="info-img">
                                <a href="blog-details.html"><h6>Real Estate</h6></a>
                                <p>May 10, 2020</p>
                            </div>
                            <div class="clr"></div>
                        </div>
                    </div> -->
                </div>
            </aside>
        </div>
    </div>
</section>

@endsection