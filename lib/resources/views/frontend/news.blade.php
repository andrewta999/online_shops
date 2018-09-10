@extends('frontend.master')
@section('main')
<h3>Here are the links to the latest news about technologies. Post daily news and their sources here so people can see them</h3>
<form method='post'>
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" name='name'>
  </div>
  <div class="form-group">
    <label for="title">Title:</label>
    <input type="text" class="form-control" name='title'>
  </div>
  <div class=form-group>
  	<label for="detail">Details:</label>
  	<input type="text" class='form-control' name='detail'>
  </div>
  <div class="form-group">
    <label for='source'>Source: </label>
    <input id="img" type="text" name="source" class="form-control">
  </div>
  <button type="submit" class="btn btn-default">Post</button>
  {{csrf_field()}}
</form>

<style>
	#page{
		background: #3B5998;
		color: #fff;
	}
	#page a{
		color: #FFB3B3;
	}
	#page div{
		margin-left: 50px;
	}
</style>
<br/>
<br/>
<div>
	<h3>Latest Posts</h3>
	@foreach($news as $new)
	<div class="panel panel-default" id='page'>
  		<div class="panel-heading">
  			<p> <h4>Name</h4> {{$new->name}}</p>
  			<p> <h4>Title</h4> {{$new->title}}</p>
  			<p> <h4>Posted at</h4> {{$new->created_at}}</p>
  		</div>
  		<div class="panel-body">
  			<p> <h4>Detail</h4> {{$new->detail}}</p>
  			<a href="{{$new->source}}"> <h4>Source</h4></a>
  		</div>
	</div>
	<br/>
	@endforeach
</div>
@stop