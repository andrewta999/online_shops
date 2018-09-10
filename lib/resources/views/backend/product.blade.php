@extends('backend.master')
@section('title', 'Product')
@section('main')	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Product</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Products</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{asset('admin/product/add')}}" class="btn btn-primary">Name</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="30%">Name</th>
											<th>Price</th>
											<th width="20%">Image</th>
											<th>Category</th>
											<th>Option</th>
										</tr>
									</thead>
									<tbody>
										@foreach($productlist as $product)
										<tr>
											<td>{{$product->pro_id}}</td>
											<td>{{$product->name}}</td>
											<td>{{$product->price}} VND</td>
											<td>
												<img width="100px" src="{{asset('lib/storage/app/avatar/'.$product->img)}}" class="thumbnail">
											</td>
											<td>{{$product->cate_name}}</td>
											<td>
												<a href="{{asset('admin/product/edit/'.$product->pro_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
												<a onCLick='return confirm("Are you sure you wnat to delete this product?")' href="{{asset('admin/product/delete/'.$product->pro_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop
	
