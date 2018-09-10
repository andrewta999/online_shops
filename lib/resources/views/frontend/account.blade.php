@extends('frontend.master')
@section('main')
<script>
  function changeImg(input){
    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
    if(input.files && input.files[0]){
        var reader = new FileReader();
        //Sự kiện file đã được load vào website
        reader.onload = function(e){
            //Thay đổi đường dẫn ảnh
            $('#avatar').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {
    $('#avatar').click(function(){
        $('#img').click();
    });
});
</script>
<div>
<h2>Creat your own online store here by signing up for a store account</h2>
<form method='post' enctype='multipart/form-data'>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" name='mail'>
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" name='password'>
  </div>
   <div class="form-group">
    <label for="phone">Phone:</label>
    <input type="text" class="form-control" name='phone'>
  </div>
  <div class="form-group">
    <label for="img">Image: </label>
    <input required id="img" type="file" name="img" class="form-control">
  </div>
  <button type="submit" class="btn btn-default">Create Account</button>
  {{csrf_field()}}
</form>
</div>
@stop