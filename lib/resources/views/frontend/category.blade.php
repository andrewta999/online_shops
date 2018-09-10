@extends('frontend.master')
@section('title', 'Category')
@section('main')



					<div id="wrap-inner">
						<div class="products">
							<h3>{{$cate->cate_name}}</h3>
							<div class="product-list row">
								@foreach($items as $item)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img width='100px' src="{{asset('lib/storage/app/avatar/'.$item->img)}}" class="img-thumbnail"></a>
									<p><a href="#">{{$item->name}}</a></p>
									<p class="price">{{$item->price}} VND</p>	  
									<div class="marsk">
										<a href="{{asset('details/'.$item->pro_id.'/'.$item->slug.'.html')}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endforeach
							</div>                	                	
						</div>

						<div id="pagination">
							<ul class="pagination pagination-lg justify-content-center">
								{{$items->links()}}
							</ul>
						</div>
					</div>

					
					<!-- end main -->
				</div>
@stop