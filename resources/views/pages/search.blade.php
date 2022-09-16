@extends('layout.index')

@section('title') Tìm kiếm {{$key}} @endsection
@section('description') Mô tả {{$key}} @endsection
@section('keywords') {{$key}} @endsection
@section('robots') noindex, nofollow @endsection
@section('url'){{asset('').'tim-kiem-san-pham'}}@endsection

@section('content')
@include('layout.header-1')

<?php use App\category; ?>

<section class="properties-list featured portfolio blog">
	<div class="container container-header">
		<section class="headings-2 pt-0 pb-0">
			<div class="pro-wrapper">
				<div class="detail-wrapper-body">
					<div class="listing-title-bar">
						<div class="text-heading text-left">
							<p><a href="{{asset('')}}">Trang chủ </a></p>
						</div>
						<h1>Từ khóa tìm kiếm: {{$key}}</h1>
					</div>
				</div>
			</div>
		</section>
		<!-- Search Form -->
		
		<div class="row">
			<div class="col-lg-9 col-md-12 blog-pots">
				<div class="row">
					@foreach($product as $val)
					<div class="item col-lg-4 col-md-4 col-xs-12 landscapes sale">
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


@endsection