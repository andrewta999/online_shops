@extends('frontend.master')
@section('title', 'Home')
@section('main')


					<div id="wrap-inner">
						<div class="products">
							<h3>Popular products</h3>
							<div class="product-list row">
								@foreach($featured as $feature)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img width='100px' src="{{asset('lib/storage/app/avatar/'.$feature->img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$feature->name}}</a></p>
									<p class="price">{{$feature->price}} VND</p>	  
									<div class="marsk">
										<a href="{{asset('details/'.$feature->pro_id.'/'.$feature->slug.'.html')}}">Details</a>
									</div>                                    
								</div>
								@endforeach
							</div>                	                	
						</div>

						<div class="products">
							<h3>New products</h3>
							<div class="product-list row">
								@foreach($news as $new)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img width='100px' src="{{asset('lib/storage/app/avatar/'.$new->img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$new->img}}</a></p>
									<p class="price">{{$new->price}}</p>	  
									<div class="marsk">
										<a href="{{asset('details/'.$new->pro_id.'/'.$new->slug.'.html')}}">Details</a>
									</div>                      	                        
								</div>
								@endforeach
							</div>    
						</div>
					</div>
					
					<!-- end main -->
</div>
@stop