@extends('layouts.master')

@section('content')

	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Sản phẩm</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="/tc">Home</a> / <span>Sản phẩm</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-3">
						<ul class="aside-menu">
							<li><a href="#">Typography</a></li>
							<li><a href="#">Buttons</a></li>
							<li><a href="#">Dividers</a></li>
							<li><a href="#">Columns</a></li>
							<li><a href="#">Icon box</a></li>
							<li><a href="#">Notifications</a></li>
							<li><a href="#">Progress bars and Skill meter</a></li>
							<li><a href="#">Tabs</a></li>
							<li><a href="#">Testimonial</a></li>
							<li><a href="#">Video</a></li>
							<li><a href="#">Social icons</a></li>
							<li><a href="#">Carousel sliders</a></li>
							<li><a href="#">Custom List</a></li>
							<li><a href="#">Image frames &amp; gallery</a></li>
							<li><a href="#">Google Maps</a></li>
							<li><a href="#">Accordion and Toggles</a></li>
							<li class="is-active"><a href="#">Custom callout box</a></li>
							<li><a href="#">Page section</a></li>
							<li><a href="#">Mini callout box</a></li>
							<li><a href="#">Content box</a></li>
							<li><a href="#">Computer sliders</a></li>
							<li><a href="#">Pricing &amp; Data tables</a></li>
							<li><a href="#">Process Builders</a></li>
						</ul>
					</div>
					<div class="col-sm-9">
						<div class="beta-products-list">
							<h4> Loại Sản Phẩm </h4>
							<div class="beta-products-details">
								<p class="pull-left">438 styles found</p>
								<div class="clearfix"></div>
							</div>

							<div class="row">
							@isset($products)

								@foreach($products as $products) 
								<div class="col-sm-4">
									<div class="single-item">
										<div class="single-item-header">
										<a href="{{ route('show', ['id' => $products->id]) }}"><img src="/source/image/product/{{$products->image}}" alt="" width="270" height="260"></a>
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
											<a class="beta-btn primary" href="{{ route('show', ['id' => $products->id]) }}">Details <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>

							 @endforeach
							</div>
              @endisset
						</div> <!-- .beta-products-list -->

						<div class="space50">&nbsp;</div>
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection

	
@section('js')


	<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
@endsection