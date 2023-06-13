@extends('layouts.master')

@section('css')
@endsection

@section('content')
	<div class="rev-slider">
	<div class="fullwidthbanner-container">
					<div class="fullwidthbanner">
						<div class="bannercontainer" >
					    <div class="banner" >
							@isset($banner)
								<ul>
									<!-- THE FIRST SLIDE -->
								@foreach($banner as $banners)
								<li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible" style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
						            <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined" data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined" data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined" data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined" data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined" data-oheight="undefined">
													<div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined" src="/source/image/slide/{{$banners->image}}" data-src="/source/image/slide/{{$banners->image}}" style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('/source/image/slide/{{$banners->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
												</div>
											</div>
						      </li>
									@endforeach
								</ul>
								@endisset
							</div>
						</div>

						<div class="tp-bannertimer"></div>
					</div>
				</div>
				<!--slider-->
	</div>
	<div class="container">
	@if(session('success'))
            <br>
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
    @endif
		<div class="beta-products-list">
			<h4>Recommended Products</h4>
			<div class="beta-products-details">
				<p class="pull-left">4 styles found</p>
				<div class="clearfix"></div>
			</div>
			<div class="row">
			@foreach($recommended_products as $recommended_product)
				<div class="col-sm-3">
					<div class="single-item">
						<div class="single-item-header">
							<a href="{{ route('show', ['id' => $recommended_product->id]) }}"><img src="source/image/product/{{$recommended_product->image}}" alt="" width="270" height="260"></a>
						</div>
						<div class="single-item-body">
							<p class="single-item-title">{{$recommended_product->name}}</p>
							<p class="single-item-price">
								@if($recommended_product->promotion_price != 0)
									<span class="flash-del">{{$recommended_product->unit_price}}</span>
									<span class="flash-sale">{{$recommended_product->promotion_price}}</span>
								@else
									<span>{{$recommended_product->unit_price}}</span>
								@endif
							</p>
						</div>
						<div class="single-item-caption">
							<a class="add-to-cart pull-left" href="{{route('banhang.addToCart', $recommended_product->id)}}"><i class="fa fa-shopping-cart"></i></a>
							
							@if (Auth::check())
												@php
													$user = Auth::user();
													$love = $user->Love;
													$listlove = explode(",", $love);
													$productId = $recommended_product->id; // Lấy ID của sản phẩm cần thêm vào yêu thích
												@endphp
												<div class="d-flex align-items-center">
													@if (!in_array($productId, $listlove))
														<form action="{{ route('getLike', ['id' => $productId]) }}" method="POST">
															@csrf
															<button type="submit" class="btn btn-primary"><i class="fas fa-heart fa-lg"></i></button>
														</form>
													@else
													<form action="{{ route('getLike', ['id' => $productId]) }}" method="POST">
															@csrf
															<button type="submit" class="btn btn-primary"><i class="fas fa-heart fa-lg"></i></button>
														</form>
													@endif
													<a class="beta-btn primary ml-3" href="{{ route('show', ['id' => $recommended_product->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
												</div>
												@else
												<form action="{{ route('getLike', ['id' => $recommended_product->id]) }}" method="POST">
															@csrf
															<button type="submit" class="btn btn-primary"><i class="fas fa-heart fa-lg"></i></button>
														</form>
											@endif
											
							<div class="clearfix"></div>
						</div>
					</div>
				</div> 
			@endforeach

						</div>
					</div>

		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Products Promotion</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@isset($new_products)	
								@php 
									$stt=0; 
								@endphp
								@foreach($new_products as $new_product)
									@php 
										$stt++;
									@endphp
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{ route('show', ['id' => $new_product->id]) }}"><img src="source/image/product/{{$new_product->image}}" alt="" width="270" height="260"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$new_product->name}}</p>
											<p class="single-item-price">
												@if($new_product->promotion_price != 0 )
												<span class="flash-del">{{$new_product->unit_price}}</span>
												<span class="flash-sale">{{$new_product->promotion_price}}</span>
												@else
												<span >{{$new_product->unit_price}}</span>
												@endif
											</p>
											
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('banhang.addToCart',$new_product->id)}}"><i class="fa fa-shopping-cart"></i></a>
											@if (Auth::check())
												@php
													$user = Auth::user();
													$love = $user->Love;
													$listlove = explode(",", $love);
													$productId = $new_product->id; // Lấy ID của sản phẩm cần thêm vào yêu thích
												@endphp
												<div class="d-flex align-items-center">
													@if (!in_array($productId, $listlove))
														<form action="{{ route('getLike', ['id' => $productId]) }}" method="POST">
															@csrf
															<button type="submit" class="btn btn-primary"><i class="fas fa-heart fa-lg"></i></button>
														</form>
													@else
													<form action="{{ route('getLike', ['id' => $productId]) }}" method="POST">
															@csrf
															<button type="submit" class="btn btn-primary"><i class="fas fa-heart fa-lg"></i></button>
														</form>
													@endif
													<a class="beta-btn primary ml-3" href="{{ route('show', ['id' => $new_product->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
												</div>
												@else
												<form action="{{ route('getLike', ['id' => $new_product->id]) }}" method="POST">
															@csrf
															<button type="submit" class="btn btn-primary"><i class="fas fa-heart fa-lg"></i></button>
														</form>
											@endif
											<div class="clearfix"></div>
										</div>
									</div>
								</div> 
                @endforeach
							</div>
              @endisset
						</div> <!-- .beta-products-list -->
            @if($stt % 4==0)
						<div class="space50">&nbsp;</div>
            @endif

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="beta-products-list">
							<h4>Products</h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
								
                @isset($products)

                @foreach($products as $products) 

								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{ route('show', ['id' => $products->id]) }}"><img src="source/image/product/{{$products->image}}" alt="" width="270" height="260"></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$products->name}}</p>
											<p class="single-item-price">
											@if($products->promotion_price != 0 )
												<span class="flash-del">{{$products->unit_price}}</span>
												<span class="flash-sale">{{$products->promotion_price}}</span>
												@else
												<span >{{$products->unit_price}}</span>
												@endif
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('banhang.addToCart',$products->id)}}"><i class="fa fa-shopping-cart"></i></a>
											@if (Auth::check())
												@php
													$user = Auth::user();
													$love = $user->Love;
													$listlove = explode(",", $love);
													$productId = $products->id; // Lấy ID của sản phẩm cần thêm vào yêu thích
												@endphp
												<div class="d-flex align-items-center">
													@if (!in_array($productId, $listlove))
														<form action="{{ route('getLike', ['id' => $productId]) }}" method="POST">
															@csrf
															<button type="submit" class="btn btn-primary"><i class="fas fa-heart fa-lg"></i></button>
														</form>
													@else
													<form action="{{ route('getLike', ['id' => $productId]) }}" method="POST">
															@csrf
															<button type="submit" class="btn btn-primary"><i class="fas fa-heart fa-lg"></i></button>
														</form>
													@endif
													<a class="beta-btn primary ml-3" href="{{ route('show', ['id' => $products->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
												</div>
												@else
												<form action="{{ route('getLike', ['id' => $products->id]) }}" method="POST">
															@csrf
															<button type="submit" class="btn btn-primary"><i class="fas fa-heart fa-lg"></i></button>
														</form>
											@endif
											<div class="clearfix"></div>
										</div>
									</div>
								</div> 
                @endforeach
							</div>
              @endisset
						</div> <!-- .beta-products-list -->
            @if($stt % 4==0)
						<div class="space50">&nbsp;</div>
            @endif

					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->

@endsection


@section('js')
@endsection