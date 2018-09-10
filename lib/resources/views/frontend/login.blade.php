@extends('frontend.master')
@section('main')
<div>
<h2>Login</h2>
<h3>What are you doing here? After registering for an account by clicking "Account", you use your username and password to login and start posting your products.</h3>
<form method='post'>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name='mail'>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name='password'>
  </div>
  <button type="submit" class="btn btn-default">Login</button>
  {{csrf_field()}}
</form>
</div>
@stop