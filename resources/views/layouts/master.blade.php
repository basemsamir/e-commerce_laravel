<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Grocery Store a Ecommerce Online Shopping website</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Grocery Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link rel="stylesheet" href="{!! asset('css/app.css') !!}">
<!-- //font-awesome icons -->
<!-- js -->
<script src="{!! asset('js/jquery-1.11.1.min.js') !!}"></script>

<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{!! asset('js/move-top.js')  !!}"></script>
<script type="text/javascript" src="{!! asset('js/easing.js')  !!}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->

<script src="{!! asset('js/okzoom.js')  !!}"></script>
<script>
	$(function(){
		$('#example').okzoom({
			width: 120,
			height: 120,
			border: "1px solid black",
			shadow: "0 0 5px #000"
		});
	});
</script>
</head>

<body>
<!-- header -->
	<div class="agileits_header">
		<div class="w3l_offers">
			<a href="{{ route('home.bestdeals') }}">Today's special Offers !</a>
		</div>
		<div class="w3l_search">
			<form action="{{ route('home.searchProduct')}}" method="post" onsubmit="return searchProduct();">
				{!! csrf_field(); !!}
				<input type="text" id="Product" name="Product" value="Search a product..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search a product...';}" required="">
				<input type="submit" value="">
			</form>
		</div>
		<div class="product_list_header">
			<a href="{{route('cart.index')}}" class="button">View your cart</a>

		</div>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						@if(Auth::id())
							{{ Auth::user()->name }}
						@endif
						<i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
								@if(Auth::guest())
									<li><a href="{{route('home.auth')}}">Sign In | Sign up</a></li>
								@else
									<li>
										<form id="logoutForm" action="{{route('logout')}}" method="post">
											{{ csrf_field() }}
											<a href="#"  onclick="$('#logoutForm').submit()">Logout</a>
										</form>
									</li>
								@endif
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
			<h2><a href="{{ route('home.contactus')}}">Contact Us</a></h2>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop();
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });

	});
	</script>
<!-- //script-for sticky-nav -->
	<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="{!! route('home') !!}"><span>Grocery</span> Store</a></h1>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="{{ route('home.events') }}">Events</a><i>/</i></li>
					<li><a href="{{ route('home.bestdeals') }}">Best Deals</a><i>/</i></li>
					<li><a href="{{ route('home.services') }}">Services</a></li>
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>(+0123) 234 567</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:store@grocery.com">store@grocery.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	@yield('breadcrumb')
<!-- //header -->
<!-- banner -->
	<div class="banner">
		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div>
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
						@foreach($categories as $category)
							@if($category->subcategories()->count() == 0)
								<li><a href='{{ route("category.show",$category->id) }}'>{{ $category->name }}</a></li>
							@else
								<li class="dropdown mega-dropdown active">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $category->name }}<span class="caret"></span></a>
									<div class="dropdown-menu mega-dropdown-menu w3ls_vegetables_menu">
										<div class="w3ls_vegetables">
											<ul>
												@foreach($category->subcategories as $sub_category)
													<li><a href='{{ route("category.show",$sub_category->id) }}'>{{ $sub_category->name }}</a></li>
												@endforeach
											</ul>
										</div>
									</div>
								</li>
							@endif
						@endforeach
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>
		<div class="w3l_banner_nav_right">
			@yield('content')
		</div>
		<div class="clearfix"></div>
	</div>
<!-- banner -->
	@yield('belowBanner')
<!-- newsletter -->
	<div class="newsletter">
		<div class="container">
			<div class="w3agile_newsletter_left">
				<h3>sign up for our newsletter</h3>
			</div>
			<div class="w3agile_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
					<input type="submit" value="subscribe now">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //newsletter -->
<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="col-md-4 w3_footer_grid">
				<h3>information</h3>
				<ul class="w3_footer_grid_list">
					<li><a href="{{ route('home.events') }}">Events</a></li>
					<li><a href="{{ route('home.bestdeals') }}">Best Deals</a></li>
					<li><a href="{{ route('home.services') }}">Services</a></li>
				</ul>
			</div>
			<div class="col-md-4 w3_footer_grid">
				<h3>what in stores</h3>
				<ul class="w3_footer_grid_list">
					@foreach($categories as $category)
						@if($category->subcategories()->count() == 0)
							<li><a href="{{ route('category.show',$category->id)}}">{{$category->name}}</a></li>
						@else
							<?php $subcategory=$category->subcategories()->first(); ?>
							<li><a href="{{ route('category.show',$subcategory->id)}}">{{$subcategory->name}}</a></li>
						@endif
					@endforeach
				</ul>
			</div>
			<div class="col-md-4 w3_footer_grid">
				<div class="w3_footer_grid_bottom">
					<h4>100% secure payments</h4>
					<img src="{!! asset('images/card.png') !!}" alt=" " class="img-responsive" />
				</div>
			</div>
			<div class="clearfix"> </div>
			<div class="wthree_footer_copy">
				<p>© {{ date('Y') }} Grocery Store. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a> Coded in Laravel by <a href="github.com/basemsamir">Basem Samir</a> </p>
			</div>
		</div>
	</div>
<!-- //footer -->
<!-- Bootstrap Core JavaScript -->
<script src="{!! asset('js/bootstrap.min.js') !!}"></script>
<script>
$(document).ready(function(){
    $(".dropdown").hover(
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');
        }
    );

});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->
<!--
<script src="{!! asset('js/minicart.js') !!}"></script>
<script>
		paypal.minicart.render();

		paypal.minicart.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;
			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});

	</script>
-->
	@yield('javascript')
	<script>
	function searchProduct(){
		if($("#Product").val() != "Search a product...")
			return true;
		else
			return false;
	}
	</script>
</body>
</html>
