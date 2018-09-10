@extends('backend.master')
@section('title', 'Category')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Categories</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-5 col-lg-5">
				<form action="" method='post'>
					<div class="panel panel-primary">
						<div class="panel-heading">
							Add Categories
						</div>
						<div class="panel-body">
							<div class="form-group">
								@if(isset($errors))
									@foreach($errors->all() as $error)
										<div class='alert alert-danger'>{{$error}}</div>
									@endforeach
								@endif
								<label>Name:</label>
    							<input type="text" name="name" class="form-control" placeholder="Category...">
							</div>
							<div class="form-group">
								<input type="submit" name='sbm' class='btn btn-success' value='Add'>
							</div>
						</div>
						{{csrf_field()}}
					</div>
				</form>
			</div>
			<div class="col-xs-12 col-md-7 col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">Categories</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Name</th>
					                  <th style="width:30%">Option</th>
					                </tr>
				              	</thead>
				              	<tbody>
				              	@foreach($catelist as $cate)
								<tr>
									<td>{{$cate->cate_name}}</td>
									<td>
			                    		<a href="{{asset('admin/category/edit/'.$cate->id)}}" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
			                    		<a href="{{asset('admin/category/delete/'.$cate->id)}}" onclick="return confirm('Confirm your delete')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Delete</a>
			                  		</td>
			                  	</tr>
			                  	@endforeach
				                </tbody>
				            </table>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>
@stop
	