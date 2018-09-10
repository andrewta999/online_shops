@extends('backend.master')
@section('title', 'Edit Category')
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
					@if(isset($errors))
						@foreach($errors->all() as $error)
							<div class='alert alert-danger'>{{$error}}</div>
						@endforeach
					@endif
					<div class="panel panel-primary">
						<div class="panel-heading">
							Edit
						</div>
						<div class="panel-body">
							<div class="form-group">
								<label>Name:</label>
    							<input type="text" name="name" class="form-control" placeholder="Name..." value='{{$cate->cate_name}}'>
							</div>
						</div>
					</div>
					<input type="submit" name='sbm' value='Edit' class='btn btn-success'>
					<div><a href="{{asset('admin/category')}}" class='btn btn-danger'>Delete</a></div>
					{{csrf_field()}}
					<form>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop