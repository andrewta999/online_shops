@extends('frontend.master')
@section('main')
<h2 color='red'>Here are other people's stores. You can contact them to buy their products</h2>

@foreach($owners as $owner)
<div>
	<h3>Owner: {{$owner->email}}</h2>
	<h3>Contact Number: {{$owner->phone}}</h3>
	<div class="products">
		<h3>Products</h3>
		<div class="product-list row">
			@foreach($products as $product)
			@if($product->p_id == $owner->acc_id)
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<img width='100px' src="{{asset('lib/storage/app/products/'.$product->img)}}" class="img-thumbnail">
				<p>{{$product->name}}</p>
				<p class="price">{{$product->price}} VND</p>	  
				<p>{{$product->detail}}</p>                                   
			</div>
			@endif
			@endforeach
		</div>                	                	
	</div>
</div>
@endforeach


@stop