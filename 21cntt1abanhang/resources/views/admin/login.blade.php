@extends('admin.layouts.master')

@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<h6 class="inner-title">Đăng nhập</h6>
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="/tc">Home</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('admin.postLogin')}}" method="post" class="beta-form-checkout">
				@csrf
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<label for="email">Email address*</label>
							<input type="email" id="email" name="email" required/>
						</div>
						<div class="form-block">
							<label for="password">Password*</label>
							<input type="password" id="password" name="password" required/>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection

@section('js')



	<script type="text/javascript">
    $(function() {
        // this will get the full URL at the address bar
        var url = window.location.href;

        // passes on every "a" tag
        $(".main-menu a").each(function() {
            // checks if its the same on the address bar
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
				$(this).parents('li').addClass('parent-active');
            }
        });
    });   


</script>
<script>
	 jQuery(document).ready(function($) {
                'use strict';
				
// color box

//color
      jQuery('#style-selector').animate({
      left: '-213px'
    });

    jQuery('#style-selector a.close').click(function(e){
      e.preventDefault();
      var div = jQuery('#style-selector');
      if (div.css('left') === '-213px') {
        jQuery('#style-selector').animate({
          left: '0'
        });
        jQuery(this).removeClass('icon-angle-left');
        jQuery(this).addClass('icon-angle-right');
      } else {
        jQuery('#style-selector').animate({
          left: '-213px'
        });
        jQuery(this).removeClass('icon-angle-right');
        jQuery(this).addClass('icon-angle-left');
      }
    });
				});
	</script>
	@endsection
