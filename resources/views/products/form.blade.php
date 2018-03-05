<form  method="post" onsubmit="sendItemData(event);">
  <fieldset>
    {!! csrf_field(); !!}
    <input type="hidden" name="cmd" value="_cart" />
    @if(Auth::user())
      <input type="hidden" name="user_token" value="{{ Auth::user()->api_token }}">
    @endif
    <input type="hidden" name="add" value="1" />
    <input type="hidden" name="business" value=" " />
    <input type="hidden" name="item_id" value="{{$product->id}}" />
    <input type="hidden" name="item_name" value="{{$product->title}}" />
    <input type="hidden" name="amount" value="{{$product->in_stock}}" />
    <input type="hidden" name="discount_amount" value="{{$product->original_price-$product->discount_price}}" />
    <input type="hidden" name="currency_code" value="USD" />
    <input type="hidden" name="return" value=" " />
    <input type="hidden" name="cancel_return" value=" " />
    <input type="submit" name="submit" value="Add to cart" class="button" />
  </fieldset>

</form>
