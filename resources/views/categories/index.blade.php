@extends('layouts.master')

@section('breadcrumb')
<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('home') }}">Home</a><span>|</span></li>
				@if($category->parentcategory)
					<li>{{$category->parentcategory->name}}</li>
				@else
					<li>{{$category->name}}</li>
				@endif
			</ul>
		</div>
</div>
@stop

@section('content')
<div class="{{ $category->image_class_css }}">
	<h3>Best Deals For New Products<span class="blink_me"></span></h3>
</div>
<div class="clearfix"> </div>
<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
	<h3>{{$category->name}} Products</h3>
	<div class="w3ls_w3l_banner_nav_right_grid1">

		@foreach($category->products as $product)
			<div class="col-md-3 w3ls_w3l_banner_left">
				<div class="hover14 column">
				<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
					<div class="agile_top_brand_left_grid_pos">
						<img src="{{ asset('images/offer.png') }}" alt=" " class="img-responsive">
					</div>
					<div class="agile_top_brand_left_grid1">
						<figure>
							<div class="snipcart-item block">
								<div class="snipcart-thumb">
									<a href="{{route('product.show',$product->id)}}"><img src='{{ asset("images/$product->image") }}' alt=" " class="img-responsive"></a>
									<p>{{$product->title}}</p>
									<h4>${{$product->original_price}} <span>${{$product->discount_price}}</span></h4>
								</div>
								<div class="snipcart-details">
									<form action="#" method="post">
										<fieldset>
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="business" value=" ">
											<input type="hidden" name="item_name" value="knorr instant soup">
											<input type="hidden" name="amount" value="3.00">
											<input type="hidden" name="discount_amount" value="1.00">
											<input type="hidden" name="currency_code" value="USD">
											<input type="hidden" name="return" value=" ">
											<input type="hidden" name="cancel_return" value=" ">
											<input type="submit" name="submit" value="Add to cart" class="button">
										</fieldset>
									</form>
								</div>
							</div>
						</figure>
					</div>
				</div>
				</div>
			</div>
		@endforeach
		<div class="clearfix"> </div>
	</div>
</div>
@stop
