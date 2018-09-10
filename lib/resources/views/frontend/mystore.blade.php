@extends('frontend.master')
@section('main')

<div>
<h2>You can creat your own store here, where you can advertise your ued or new products</h2>
<h2>Start by adding your products. People will contact you if they want your products.</h2>
<form method='post' enctype='multipart/form-data'>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name='name'>
  </div>
  <div class="form-group">
    <label for="detail">Details:</label>
    <input type="text" class="form-control" name='detail'>
  </div>
  <div class=form-group>
  	<label for="price">Price:</label>
  	<input type="text" class='form-control' name='price'>
  </div>
  <div class="form-group">
    <label for="img">Image: </label>
    <input required id="img" type="file" name="img" class="form-control">
  </div>
  <button type="submit" class="btn btn-default">Add Product</button>
  {{csrf_field()}}
</form>
</div>

<div class="products">
							<h3>Your Products</h3>
							<div class="product-list row">
								@foreach($items as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img width='100px' src="{{asset('lib/storage/app/products/'.$item->img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->name}}</a></p>
									<p class="price">{{$item->price}} VND</p>	  
									<p>{{$item->detail}}</p>                                   
								</div>
								@endforeach
							</div>                	                	
</div>

@stop