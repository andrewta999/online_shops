@extends('frontend.master')
@section('title', 'Cart')
@section('main')
<script>
	function updateCart(qty, rowId){
		$.get(
			'{{asset("cart/update")}}',
			{qty:qty, rowId:rowId},
			function(){
				location.reload();
			}
		);
	}

</script>

					<div id="wrap-inner">
						<div id="list-cart">
							<h3>Cart</h3>
							@if(Cart::count() > 0)
							<form>
								<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="11.111%">Image</td>
										<td width="22.222%">Name</td>
										<td width="22.222%">Quantity</td>
										<td width="16.6665%">Price</td>
										<td width="16.6665%">Charge</td>
										<td width="11.112%">Delete</td>
									</tr>
									@foreach($items as $item)
									<tr>
										<td><img class="img-responsive" src="{{asset('lib/storage/app/avatar/'.$item->options->img)}}"></td>
										<td>{{$item->name}}</td>
										<td>
											<div class="form-group">
												<input class="form-control" type="number" value='{{$item->qty}}'
												 onChange='updateCart(this.value, "{{$item->rowId}}")'>
											</div>
										</td>
										<td><span class="price">{{$item->price}} vnd</span></td>
										<td><span class="price">{{$item->price * $item->qty}} vnd</span></td>
										<td><a href="{{asset('cart/delete/'.$item->rowId)}}">Xóa</a></td>
									</tr>
									@endforeach
								</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Total: <span class="total-price">{{$total}} vnd</span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="{{asset('/')}}" class="my-btn btn">Continue shopping</a>
										<a href="{{asset('cart/delete/all')}}" class="my-btn btn">Delete you cart</a>
									</div>
								</div>
							</form>

							<div id="xac-nhan">
							<h3>Confirm your purchase</h3>
							<form method='post'>
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Name:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Phone:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Address:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Confirm</button>
								</div>

								{{csrf_field()}}
							</form>
							</div>
							@else
								<h2>Empty Cart</h2>
							@endif             	                	
						</div>

						
					</div>

					
					<!-- end main -->
</div>
@stop