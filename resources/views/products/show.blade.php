@extends('layouts.master')

@section('breadcrumb')
<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('home') }}">Home</a><span>|</span></li>
				<li><i class="fa fa-shopping-cart" aria-hidden="true"></i><a href="{{ route('category.show',$product->category->id) }}">
					{{$product->category->name}}</a><span>|</span></li>
				<li>{{$product->title}}</li>
			</ul>
		</div>
</div>
@stop


@section('content')
<div class="{{$product->category->image_class_css}}">
	<h3>Best Deals For New Products<span class="blink_me"></span></h3>
</div>
<div class="agileinfo_single">
    <h5>{!! $product->title !!}</h5>
    <div class="col-md-4 agileinfo_single_left">
      <img id="example" src='{{ asset("images/$product->image") }}' alt=" " style="margin: 0 auto;" class="img-responsive">
    </div>
    <div class="col-md-8 agileinfo_single_right">
			<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
      <div class="w3agile_description">
        <h4>Description :</h4>
        <p>{!! $product->description !!}</p>
      </div>
      <div class="snipcart-item block">
        <div class="snipcart-thumb agileinfo_single_right_snipcart">
          <h4>${!! $product->discount_price !!} <span>$ {!! $product->original_price !!}</span></h4>
        </div>
        <div class="snipcart-details agileinfo_single_right_details">
          <form action="#" method="post">
            <fieldset>
              <input type="hidden" name="cmd" value="_cart">
              <input type="hidden" name="add" value="1">
              <input type="hidden" name="business" value=" ">
              <input type="hidden" name="item_name" value="pulao basmati rice">
              <input type="hidden" name="amount" value="21.00">
              <input type="hidden" name="discount_amount" value="1.00">
              <input type="hidden" name="currency_code" value="USD">
              <input type="hidden" name="return" value=" ">
              <input type="hidden" name="cancel_return" value=" ">
              <input type="submit" name="submit" value="Add to cart" class="button">
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    <div class="clearfix"> </div>
  </div>
@stop
