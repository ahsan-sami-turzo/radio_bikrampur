
<!DOCTYPE html>
<html lang="zxx" class="no-js">


<div class="row" style="margin-bottom: 120px !important;">

	<div class="col-md-12">
		<head>

			<!-- Mobile Specific Meta -->
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			<!-- Favicon-->
			<link rel="shortcut icon" href="{{url('/public/favicon.ico')}}" type="image/x-icon">
			<!-- Author Meta -->
			<meta name="author" content="codepixer">
			<!-- Meta Description -->
			<meta name="description" content="">
			<!-- Meta Keyword -->
			<meta name="keywords" content="">
			<!-- meta character set -->
			<meta charset="UTF-8">
			<!-- Site Title -->
			<title>Ezy Fintech</title>

			<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="{{asset('public/security/user/css/linearicons.css')}}">
			<link rel="stylesheet" href="{{asset('public/security/user/css/font-awesome.min.css')}}">
			<link rel="stylesheet" href="{{asset('public/security/user/css/bootstrap.css')}}">
			<link rel="stylesheet" href="{{asset('public/security/user/css/magnific-popup.css')}}">
			<link rel="stylesheet" href="{{asset('public/security/user/css/nice-select.css')}}">
			<link rel="stylesheet" href="{{asset('public/security/user/css/animate.min.css')}}">
			<link rel="stylesheet" href="{{asset('public/security/user/css/owl.carousel.css')}}">
			<link rel="stylesheet" href="{{asset('public/security/user/css/main.css')}}">
			<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
			<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
			<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
		</head>
		@include('loadingDiv')
		<script>
		$(window).on('load', function () {
		   $(".loader").hide();
		});
		</script>

		<header id="header" id="home" >


			<div class="container header-top">
				<div class="row">
					<div class="col-6 top-head-left">
						<ul>
							{{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li> --}}
							{{-- <li>
							<a href="index.html"><img src="{{asset('public/security/user/img/logo.png')}}" height="20px;" alt="" title="" />
						</a>
					</li> --}}
				</ul>
			</div>
			<div class="col-6 top-head-right">
				<ul>
					@php $ph = DB::table('contactInfos')->select('ph')->first();@endphp
					@if($ph)
						<li>PH:<span>{{$ph->ph}}</span> <span class="lnr lnr-phone-handset"></span></li>
					@endif
					{{-- <li><a href="#" class="text_color text_decoration">Register</a></li>
					<li><a href="#" class="text_color text_decoration">Login</a></li> --}}
				</ul>
			</div>
		</div>
	</div>

	<hr>

	<div class="container">
		<div class="row align-items-center justify-content-between d-flex">
			<div id="logo">
				<a href="{{ url('/home') }}"><img src="{{asset('public/security/user/img/logo1.png')}}" height="80px;width:100px;" alt="" title="" /></a>
			</div>
			<nav id="nav-menu-container">
				<ul class="nav-menu">
					{{-- <li class="menu-active"><a href="#">Home</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="{{url('./service')}}">Service</a></li>
					<li><a href="team.html">Team</a></li>
					<li><a href="price.html">Price</a></li>
					<li><a href="blog-home.html">Blog</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li class="menu-has-children"><a href="">Pages</a>
					<ul>
					<li><a href="blog-single.html">blog Single</a></li>
					<li><a href="elements.html">Elements</a></li>
				</ul>
			</li> --}}

			@php $count = 0;@endphp
			@foreach($menus as $menu)
			<li class="menu-has-children"><a href="{{url($menu->route)}}">{{$menu->menuName}}</a>
				@php
				    $queries = DB::table('submenu')->select('*')->where('menuId',$menu->id)->get();
			    @endphp
				@if($queries->count() > 0)
                      <ul>
                        @foreach($queries as $query)
							<li><a href="{{url('./singlePage/'.$query->id)}}">{{$query->subMenuName}}</a></li>
						@endforeach
					 </ul>
			    @endif
			</li>
			@endforeach
			{{--	<li class="navigation"><a href={{".".$menu->route}}>{{$menu->menuName}}</a></li>
			<li class="menu-has-children"><a href="">Pages</a>
				<ul>
					<li><a href="blog-single.html">blog Single</a></li>
					<li><a href="elements.html">Elements</a></li>
				</ul>
			</li>--}}
			{{-- <li class="dropdown">
				<a href="#" class="" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="#">Action</a></li>
					<li><a href="#">Another action</a></li>
					<li><a href="#">Something else here</a></li>
					<li><a href="#">Separated link</a></li>

				</ul>
			</li> --}}
		</ul>
	</nav><!-- #nav-menu-container -->
</div>
</div>
</header><!-- #header -->
</div>
</div>
