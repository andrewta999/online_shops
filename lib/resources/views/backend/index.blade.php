@extends('backend.master')
@section('title', 'Master Page')
@section('main')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="panel panel-primary">
					<div class="panel-heading">Categories</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<table class="table table-bordered">
				              	<thead>
					                <tr class="bg-primary">
					                  <th>Name</th>
					                </tr>
				              	</thead>
				              	<tbody>
				              	@foreach($category as $cate)
								<tr>

									<td><a href="{{asset('admin/category/'.$cate->id)}}">{{$cate->cate_name}}</a></td>
									
			                  	</tr>
			                  	@endforeach
				                </tbody>
				            </table>
						</div>
						<div class="clearfix"></div>
					</div>
	</div>	
</div>
@stop
		  

	
