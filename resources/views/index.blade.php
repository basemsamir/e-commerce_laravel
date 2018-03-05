@extends('layouts.master')

@section('content')
<section class="slider">
  <div class="flexslider">
    <ul class="slides">
      <li>
        <div class="w3l_banner_nav_right_banner">
          <h3>Make your <span>food</span> with Spicy.</h3>
          <div class="more">
            <a href="{{ route('home.bestdeals') }}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
          </div>
        </div>
      </li>
      <li>
        <div class="w3l_banner_nav_right_banner1">
          <h3>Make your <span>food</span> with Spicy.</h3>
          <div class="more">
            <a href="{{ route('home.bestdeals') }}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
          </div>
        </div>
      </li>
      <li>
        <div class="w3l_banner_nav_right_banner2">
          <h3>upto <i>50%</i> off.</h3>
          <div class="more">
            <a href="{{ route('home.bestdeals') }}" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
          </div>
        </div>
      </li>
    </ul>
  </div>
</section>
<!-- flexSlider -->
  <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
  <script defer src="js/jquery.flexslider.js"></script>
  <script type="text/javascript">
  $(window).load(function(){
    $('.flexslider').flexslider({
    animation: "slide",
    start: function(slider){
      $('body').removeClass('loading');
    }
    });
  });
  </script>
<!-- //flexSlider -->
@stop
@section('belowBanner')
<div class="banner_bottom">
    <div class="wthree_banner_bottom_left_grid_sub">
    </div>
    <div class="wthree_banner_bottom_left_grid_sub1">
      <div class="col-md-4 wthree_banner_bottom_left">
        <div class="wthree_banner_bottom_left_grid">
          <img src="images/4.jpg" alt=" " class="img-responsive" />
          <div class="wthree_banner_bottom_left_grid_pos">
            <h4>Discount Offer <span>25%</span></h4>
          </div>
        </div>
      </div>
      <div class="col-md-4 wthree_banner_bottom_left">
        <div class="wthree_banner_bottom_left_grid">
          <img src="images/5.jpg" alt=" " class="img-responsive" />
          <div class="wthree_banner_btm_pos">
            <h3>introducing <span>best store</span> for <i>groceries</i></h3>
          </div>
        </div>
      </div>
      <div class="col-md-4 wthree_banner_bottom_left">
        <div class="wthree_banner_bottom_left_grid">
          <img src="images/6.jpg" alt=" " class="img-responsive" />
          <div class="wthree_banner_btm_pos1">
            <h3>Save <span>Upto</span> $10</h3>
          </div>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
    <div class="clearfix"> </div>
</div>
<!-- top-brands -->
<div class="top-brands">
  <div class="container">
    <h3>Hot Offers</h3>
    <div class="agile_top_brands_grids">
      @foreach($hot_products  as $hot_product)
      <div class="col-md-3 top_brand_left">
        <div class="hover14 column">
          <div class="agile_top_brand_left_grid">
            <div class="tag"><img src="images/tag.png" alt=" " class="img-responsive" /></div>
            <div class="agile_top_brand_left_grid1">
              <figure>
                <div class="snipcart-item block" >
                  <div class="snipcart-thumb">
                    <a href="{!! route('product.show',$hot_product->product->id)!!}">
                      <?php $image=$hot_product->product->image;?>
                      <img title=" " alt=" " src='{{ asset("images/$image") }}' /></a>
                    <p>{!! $hot_product->product->title !!}</p>
                    <h4>{!! $hot_product->product->discount_price !!} <span>${!! $hot_product->product->original_price !!}</span></h4>
                  </div>
                  <div class="snipcart-details top_brand_home_details">
                    <form  method="post" onsubmit="sendItemData(event);">
                      <fieldset>
                        {!! csrf_field(); !!}
                        <input type="hidden" name="cmd" value="_cart" />
                        @if(Auth::user())
                          <input type="hidden" name="user_token" value="{{ Auth::user()->api_token }}">
                        @endif
                        <input type="hidden" name="add" value="1" />
                        <input type="hidden" name="business" value=" " />
                        <input type="hidden" name="item_id" value="{{$hot_product->product->id}}" />
                        <input type="hidden" name="item_name" value="{{$hot_product->product->title}}" />
                        <input type="hidden" name="amount" value="{{$hot_product->product->in_stock}}" />
                        <input type="hidden" name="discount_amount" value="{{$hot_product->product->original_price-$hot_product->product->discount_price}}" />
                        <input type="hidden" name="currency_code" value="USD" />
                        <input type="hidden" name="return" value=" " />
                        <input type="hidden" name="cancel_return" value=" " />
                        <input type="submit" name="submit" value="Add to cart" class="button" />
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
</div>
<!-- //top-brands -->
<!-- fresh-vegetables -->
<div class="fresh-vegetables">
  <div class="container">
    <h3>Top Products</h3>
    <div class="w3l_fresh_vegetables_grids">
      <div class="col-md-3 w3l_fresh_vegetables_grid w3l_fresh_vegetables_grid_left">
        <div class="w3l_fresh_vegetables_grid2">
          <ul>
            @foreach($categories as $category)
              @if($category->subcategories()->count() == 0)
                <li><i class="fa fa-check" aria-hidden="true"></i>
                  <a href="{{route('category.show',$category->id)}}">{{$category->name}}</a>
                </li>
              @else
                @foreach($category->subcategories()->get() as $sub_category)
                  <li><i class="fa fa-check" aria-hidden="true"></i>
                    <a href="{{route('category.show',$category->id)}}">{{$sub_category->name}}</a>
                  </li>
                @endforeach
              @endif
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-md-9 w3l_fresh_vegetables_grid_right">
        <div class="col-md-4 w3l_fresh_vegetables_grid">
          <div class="w3l_fresh_vegetables_grid1">
            <img src="images/8.jpg" alt=" " class="img-responsive" />
          </div>
        </div>
        <div class="col-md-4 w3l_fresh_vegetables_grid">
          <div class="w3l_fresh_vegetables_grid1">
            <div class="w3l_fresh_vegetables_grid1_rel">
              <img src="images/7.jpg" alt=" " class="img-responsive" />
              <div class="w3l_fresh_vegetables_grid1_rel_pos">
                <div class="more m1">
                  <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                </div>
              </div>
            </div>
          </div>
          <div class="w3l_fresh_vegetables_grid1_bottom">
            <img src="images/10.jpg" alt=" " class="img-responsive" />
            <div class="w3l_fresh_vegetables_grid1_bottom_pos">
              <h5>Special Offers</h5>
            </div>
          </div>
        </div>
        <div class="col-md-4 w3l_fresh_vegetables_grid">
          <div class="w3l_fresh_vegetables_grid1">
            <img src="images/9.jpg" alt=" " class="img-responsive" />
          </div>
          <div class="w3l_fresh_vegetables_grid1_bottom">
            <img src="images/11.jpg" alt=" " class="img-responsive" />
          </div>
        </div>
        <div class="clearfix"> </div>
        <div class="agileinfo_move_text">
          <div class="agileinfo_marquee">
            <h4>get <span class="blink_me">25% off</span> on first order and also get gift voucher</h4>
          </div>
          <div class="agileinfo_breaking_news">
            <span> </span>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
      <div class="clearfix"> </div>
    </div>
  </div>
</div>
<!-- //fresh-vegetables -->
@stop

@section('javascript')
<script>

function sendItemData(event){
  event.preventDefault();
  $.ajax({
    url: '{{ route("api.cart.add") }}',
    type: 'POST',
    data: $(event.target).serialize(),
    success:function(response){
      alert(response.message);
    },
    error:function(error){
      alert(error.responseJSON.error);
      console.log(error);
    }
  });

}
</script>
@stop
