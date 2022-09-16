<?php use App\category; ?>
<div class="widget recent-post">
    @foreach($category_parent as $cat)
    <div class="recent-post mb-5">
        <h5 class="font-weight-bold">{{$cat->name}}</h5>
        <ul>
            <?php $category_sibar_sub = category::where('status','true')->where('parent', $cat->id)->orderBy('view','asc')->get(); ?>
            @foreach($category_sibar_sub as $sub_cat)
            <li><a href="{{$sub_cat->slug}}"><i class="fa fa-caret-right" aria-hidden="true"></i>{{$sub_cat->name}}</a></li>
            @endforeach
        </ul>
    </div>
    @endforeach
    
    <div class="widget-boxed mt-5">
        <div class="widget-boxed-header">
            <h4>Sản phẩm được xem nhiều</h4>
        </div>
        <div class="widget-boxed-body">
            <div class="recent-post">
                @foreach($articles_hit as $val)
                <div class="recent-main">
                    <div class="recent-img recent-img1">
                        <a href="blog-details.html"><img src="data/product/300/{{$val->img}}" alt=""></a>
                    </div>
                    <div class="info-img">
                        <a href="blog-details.html"><h6>{{$val->name}}</h6></a>
                        <div class="info-price">
                            <span>Giá: <span class="giaban">{{$val->product->price}} {{$val->product->unit}}</span></span>
                            <span><i class="fa fa-eye" aria-hidden="true"></i> {{$val->hits}} view</span>
                        </div>
                    </div>
                    <div class="clr"></div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <style type="text/css">
        .info-price{display: flex;justify-content: space-between;}
    </style>
</div>