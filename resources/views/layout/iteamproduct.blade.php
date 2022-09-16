<div class="project-single">
        <div class="project-inner project-head">
            <div class="homes-price"><img class="avatar" src="data/user/{{$val->user->avatar}}"></div>
            <a href="{{$val->category->slug}}/{{$val->slug}}"><div class="project-bottom"></div></a>
            <div class="homes">
                <a href="{{$val->category->slug}}" class="homes-img">
                    <img src="{{asset('')}}data/product/{{$val->img}}" alt="home-1" class="">
                </a>
            </div>
            <div class="button-effect">
                @if($val->video)
                <a href="{{$val->video}}" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                @endif
            </div>
        </div>
    
    <!-- homes content -->
    <div class="homes-content">
        <!-- homes address -->
        <div class="category">{{$val->category->name}}</div>
        <h3 class="mb-3"><a href="{{$val->category->slug}}/{{$val->slug}}">{{$val->name}}</a></h3>
        <p class="homes-address mb-3">
            <a href="{{$val->category->slug}}/{{$val->slug}}">
                <i class="fa fa-map-marker"></i><span>
				{{$val->product->ward_id > 0 ? $val->product->ward->name.', ' : ''}}
				{{$val->product->district_id > 0 ? $val->product->district->name.', ' : ''}}
				{{$val->product->province_id > 0 ? $val->product->province->name : ''}}
				</span>
            </a>
            <span class="eye"><i class="fa fa-eye"></i> {{$val->hits}} view</span>
        </p>
        <!-- homes List -->
        
        <!-- Price -->
        <div class="price-properties">
            <ul class="homes-list clearfix">
                <li>
                    <i class="fa fa-object-group" aria-hidden="true"></i>
                    <span>{{$val->product->area}} m2</span>
                </li>
                <li>
                    <i class="fa fa-bed" aria-hidden="true"></i>
                    <span>{{$val->product->bedroom}}</span>
                </li>
                <li>
                    <i class="fa fa-bath" aria-hidden="true"></i>
                    <span>{{$val->product->toilet}}</span>
                </li>
                
                <!-- <li>
                    <i class="fas fa-warehouse" aria-hidden="true"></i>
                    <span>{{$val->product->direction}}</span>
                </li> -->
            </ul>
            <div class="title">
                @if($val->product->price > 0)
                <span>Giá:</span> {{$val->product->price}} {{$val->product->unit}}
                @else
                <span>Giá:</span> Liên hệ
                @endif
            </div>
            <!-- <div class="compare">
                <a href="#" title="Compare">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <a href="#" title="Share">
                    <i class="fas fa-share-alt"></i>
                </a>
                <a href="#" title="Favorites">
                    <i class="fa fa-heart-o"></i>
                </a>
            </div> -->
        </div>
    </div>
</div>