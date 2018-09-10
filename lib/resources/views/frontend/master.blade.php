<!DOCTYPE html>
<html>
<head>
	<base href="{{asset('public/frontend')}}/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/category.css">
	<link rel="stylesheet" href="css/cart.css">
	<link rel="stylesheet" href="css/details.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
	<style>
		#search button{
			margin-top: 30px;
			background: blue;
			color: #fff;
		}
		#header{
			background: #267FFF;
		}
		#search input[type=text]{
	width: 300px;
	height: 35px;
	border: 1px solid #fff;
	background: #fff;
	color:#ddd;
	font-size: 12px;
	padding-left: 15px;
	margin-left: 30px;
}
	.btn{
		background: blue;
	}
	#footer-t{
		background: blue;
	}
	#footer-b{
		background: #1B3772
	}
	#web{
		color: #ddd;
	}
	</style>
</head>
<body>    
	<!-- header -->
	<header id="header" bgcolor='blue'>
		
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{asset('/')}}" id='web'>The Web</a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
					<form action="{{asset('search')}}" method='get'>
					<input type="text" name="text" placeholder="Search">
					<button class='btn btn-success' type='submit'>Search</button>
					</form>
				</div>
				
				<div id="cart" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{asset('cart/show')}}">Shop Cart</a>
					<a href="{{asset('cart/show')}}">{{Cart::count()}}</a>				    
				</div>
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->



	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							<li class="menu-item">Categories</li>
							@foreach($category as $cate)
							<li class="menu-item"><a href="{{asset('category/'.$cate->id.'/'.$cate->cate_slug.'.html')}}" title="">{{$cate->cate_name}}</a></li>
							@endforeach			
						</ul>
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<img src="img/home/banner-l-1.png" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/banner-l-2.png" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/banner-l-3.png" alt="" class="img-thumbnail">
						</div>
						<div class="banner-l-item">
							<img src="img/home/banner-l-4.png" alt="" class="img-thumbnail">
						</div>
					</div>
				</div>
				
				<div id="main" class="col-md-9">
					
					<div class="btn-group btn-group-justified">
  						<a href="{{asset('news')}}" class="btn btn-primary">News</a>
  						<a href="{{asset('account')}}" class="btn btn-primary">Account</a>
  						<a href="{{asset('stores')}}" class="btn btn-primary">Stores</a>
  						@if(Session::has('email'))
  						<a href="{{asset('mystore2/'.Session::get('email'))}}" class="btn btn-primary">Mystore</a>
  						@else
  						<a href="{{asset('/')}}" class="btn btn-primary">Mystore</a>
  						@endif
  						<a href="{{asset('login')}}" class="btn btn-primary">Admin</a>
  						<a href="{{asset('accountLogin')}}" class="btn btn-primary">Login</a>
  						<a href="{{asset('logoutAccount')}}" class="btn btn-primary">Logout</a>

					</div>
					<div>
					<p class ='btn btn-primary'>Hello {{Session::get('email')}}</p>
					</div>
				
				@yield('main')

				</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
								
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">Nothing to say</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: 6666666666</p>
						<p>Email: buyOurProduct@gmail.com</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: Wall Street</p>
						<p>Address 2: The Great Wall of China</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Some Companies</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2017 Some Companies. All Rights Reserved</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>
</html>