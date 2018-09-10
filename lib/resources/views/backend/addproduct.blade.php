@extends('backend.master')
@section('title', 'Add Product')
@section('main')		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Products</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Add products</div>
					<div class="panel-body">
						<form method="post" enctype="multipart/form-data">
							@if(isset($errors))
								@foreach($errors->all() as $error)
									<div class='alert alert-danger'>{{$error}}</div>
								@endforeach
							@endif
							<div class="row" style="margin-bottom:40px">
								<div class="col-xs-8">
									<div class="form-group" >
										<label>Name</label>
										<input required type="text" name="name" class="form-control">
									</div>
									<div class="form-group" >
										<label>Price</label>
										<input required type="number" name="price" class="form-control">
									</div>
									<div class="form-group" >
										<label>Image</label>
										<input required id="img" type="file" name="img" class="form-control" onchange="changeImg(this)">
					                    <!-- <img id="avatar" class="thumbnail" width="300px" src="img/new_seo-10-512.png">  -->
									</div>
									<div class="form-group" >
										<label>Accessories</label>
										<input required type="text" name="accessories" class="form-control">
									</div>
									<div class="form-group" >
										<label>Warranty</label>
										<input required type="text" name="warranty" class="form-control">
									</div>
									<div class="form-group" >
										<label>Promotion</label>
										<input required type="text" name="promotion" class="form-control">
									</div>
									<div class="form-group" >
										<label>Condition</label>
										<input required type="text" name="condition" class="form-control">
									</div>
									<div class="form-group" >
										<label>Status</label>
										<select required name="status" class="form-control">
											<option value="1">Sold out</option>
											<option value="0">Selling</option>
					                    </select>
									</div>
									<div class="form-group" >
										<label>Description</label>
										<textarea required class='ckeditor' name="description"></textarea>
										<script type="text/javascript">
											var editor = CKEDITOR.replace('description',{
												language:'vi',
												filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
												filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
												filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl: 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
											});
										</script>

									</div>
									<div class="form-group" >
										<label>Category</label>
										<select required name="cate" class="form-control">
											@foreach($catelist as $cate)
											<option value="{{$cate->id}}">{{$cate->cate_name}}</option>
											@endforeach
					                    </select>
									</div>
									<div class="form-group" >
										<label>Popular product?</label><br>
										yes: <input type="radio" name="featured" value="1">
										no: <input type="radio" checked name="featured" value="0">
									</div>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="#" class="btn btn-danger">Cancel</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
@stop