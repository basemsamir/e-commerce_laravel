@extends('layouts.master')


@section('breadcrumb')
<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{ route('home') }}">Home</a><span>|</span></li>
				<li>Cart</li>
			</ul>
		</div>
</div>
@stop


@section('content')
<div class="services">
		<h3>Cart</h3>
		<div class="w3ls_service_grids">
			<div class="col-md-12 w3ls_service_grid_left">
				<h4>Items in cart</h4>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Product name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
							<?php $i=1;$total=0; ?>
							@foreach($cart_items as $cart_item)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{$cart_item->product_name}}</td>
								<td>{{$cart_item->price}}</td>
								<td>{{$cart_item->qty}}</td>
								<td>
									<form class="" onsubmit="sendItemData(event);" method="post">
										  {!! csrf_field(); !!}
											<input type="hidden" name="product_id" value="{{ $cart_item->product_id }}">
											<input type="hidden" name="user_token" value="{{ Auth::user()->api_token }}">
											<button type="submit" name="button" class="btn btn-danger"
											onclick="return confirm('Do you want delete this item?')"
											>
												<i class="fa fa-close"></i>
										  </button>
									</form>
									</td>
							</tr>
							<?php $total+=($cart_item->price*$cart_item->qty); ?>
							@endforeach
					</tbody>
				</table>
				<p><b id="totalItems">Total: {{isset($total)?$total:0}}</b>$</p>
			</div>
			<div class="clearfix"> </div>
		</div>
</div>
@stop

@section('javascript')
<script>

  function sendItemData(event){
    event.preventDefault();
    $.ajax({
      url: '{{ route("api.cart.delete")}}',
      type: 'DELETE',
      data: $(event.target).serialize(),
      success:function(response){
        alert(response.message);
				var total=$("#totalItems").text().split(' ')[1];
				total=parseFloat(total);
				var deletedItemQty=$(event.target).parent().prev().text();
				var deletedItemPrice=$(event.target).parent().prev().prev().text();
				var totalAfterDeletion=total-(parseFloat(deletedItemQty) * parseFloat(deletedItemPrice));
				$("#totalItems").text(totalAfterDeletion);
				$(event.target).parent().parent().remove();

      },
      error:function(error){
        console.log(error);
      }
    });

  }
</script>

@stop
