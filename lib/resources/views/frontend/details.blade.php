@extends('frontend.master')
@section('title', 'Details')
@section('main')



					<div id="wrap-inner">
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$item->name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img width='200px' src="{{asset('lib/storage/app/avatar/'.$item->img)}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Price: <span class="price">{{$item->price}}</span></p>
									<p>Warranty: {{$item->warranty}}</p> 
									<p>Accessories: {{$item->accessories}}</p>
									<p>Condition: {{$item->condition}}</p>
									<p>Promotion: {{$item->promotion}}</p>
									<p>Status: 
										@if($item->status == 1)
											Selling
										@else
											Soldout
										@endif
									</p>
									<p class="add-cart text-center"><a href="{{asset('cart/add/'.$item->pro_id)}}">Order online</a></p>
								</div>
							</div>							
						</div>
						<div id="product-detail">
							<h3>Products' details</h3>
							<p class="text-justify">{!!$item->description!!}</p>
						</div>
						<div id="comment">
							<h3>Comments</h3>
							<div class="col-md-9 comment">
								<form method="post">
									<div class="form-group">
										<label for="email">Email:</label>
										<input required type="email" class="form-control" id="email" name="email">
									</div>
									<div class="form-group">
										<label for="name">Name:</label>
										<input required type="text" class="form-control" id="name" name="name">
									</div>
									<div class="form-group">
										<label for="cm">Comments:</label>
										<textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default">Comment</button>
									</div>
									{{csrf_field()}}
								</form>
							</div>
						</div>
						<div id="comment-list">
							@foreach($comment as $comt)
							<ul>
								<li class="com-title">
									{{$comt->comt_name}}
									<br>
									<span>{{date('d/m/Y H:i', strtotime($comt->created_at))}}</span>	
								</li>
								<li class="com-details">
									{{$comt->comt_comment}}
								</li>
							</ul>
							@endforeach
						</div>
					</div>					
					<!-- end main -->
				</div>
@stop