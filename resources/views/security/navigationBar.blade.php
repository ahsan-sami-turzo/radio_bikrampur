<?php

	function buildChartTree($parent, $accounts){
		$html = "";

		if (isset($accounts['parent'][$parent])) {
			$html .= "<ul class='nav-menu'>";


			foreach ($accounts['parent'][$parent] as $ca){

				if (!isset($accounts['parent'][$ca])){

					if($accounts['cid'][$ca]->menuName == 'Schedule') {
						$html .= "<li class='menu-has-children'>"
						. "<a href='".url('/#Schedule')."'>"
						. $accounts['cid'][$ca]->menuName .
						"</a>" .
						"</li>";
					}
					else if($accounts['cid'][$ca]->menuName == 'Programs') {
						$html .= "<li class='menu-has-children'>"
						. "<a href='".url('/#Programs')."'>"
						. $accounts['cid'][$ca]->menuName .
						"</a>" .
						"</li>";
					}
					else if($accounts['cid'][$ca]->menuName == 'Team') {
						$html .= "<li class='menu-has-children'>"
						. "<a href='".url('/#Team')."'>"
						. $accounts['cid'][$ca]->menuName .
						"</a>" .
						"</li>";
					}
					else if($accounts['cid'][$ca]->menuName == 'Videos') {
						$html .= "<li class='menu-has-children'>"
						. "<a href='".url('/#videoGallery')."'>"
						. $accounts['cid'][$ca]->menuName .
						"</a>" .
						"</li>";
					}
					else if($accounts['cid'][$ca]->menuName == 'Gallery') {
						$html .= "<li class='menu-has-children'>"
						. "<a href='".url('/#Media')."'>"
						. $accounts['cid'][$ca]->menuName .
						"</a>" .
						"</li>";
					}
					/*
					else if($accounts['cid'][$ca]->menuName == 'News') {
						$html .= "<li class='menu-has-children'>"
						. "<a href='".url('/#News')."'>"
						. $accounts['cid'][$ca]->menuName .
						"</a>" .
						"</li>";
					}
					*/
					//*
					else if($accounts['cid'][$ca]->menuName == 'Contact Us') {
						$html .= "<li class='menu-has-children'>"
						. "<a href='".url('/#ContactUs')."'>"
						. $accounts['cid'][$ca]->menuName .
						"</a>" .
						"</li>";
					}
					//*/
					else{
						$html .= "<li class='menu-has-children'>"
						. "<a href='".url('/'. $accounts['cid'][$ca]->route)."'>"
						. $accounts['cid'][$ca]->menuName .
						"</a>" .
						"</li>";
					}
				}
				if (isset($accounts['parent'][$ca])){
					$html .= "<li>" .
					"<a href='#'>" .
					$accounts['cid'][$ca]->menuName .
					"</a>";
					$html .= buildChartTree($ca, $accounts);
					$html .= "</li>";
				}
			}

			$html .= "</ul>";
		}
		return $html;
	}

	$charts = DB::table('menu')->select('*')->where('status', 1)->get()->toArray();
	//dd($charts);

	$accounts = ['cid' => [], 'parent' => []];
	foreach ($charts as $chart) {
		$accounts['cid'][$chart->id] = $chart;
		$accounts['parent'][$chart->parentId][] = $chart->id;
	}

	$html = buildChartTree(0, $accounts);


?>


<!DOCTYPE html>
<html lang="zxx" class="no-js">


{{-- <div class="row" style="height: 5em">
<div class="col-md-12"> --}}

	<head>

		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="author" content="codepixer">
		<meta name="description" content="">
		<meta name="keywords" content="">
		<meta charset="UTF-8">

		<link rel="shortcut icon" href="{{url('/public/favicon.ico')}}" type="image/x-icon">
		<title>Radio Bikrampur 99.2 FM</title>

		<link rel="stylesheet" href="{{asset('public/security/user/css/linearicons.css')}}">
		<link rel="stylesheet" href="{{asset('public/security/user/css/bootstrap.css')}}">
		<link rel="stylesheet" href="{{asset('public/security/user/css/magnific-popup.css')}}">
		<link rel="stylesheet" href="{{asset('public/security/user/css/nice-select.css')}}">
		<link rel="stylesheet" href="{{asset('public/security/user/css/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/security/user/css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('public/security/user/css/main.css')}}">

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">				
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

	</head>

	<body style="overflow-x: hidden">

		<div class="row" style="height: 5em">
		<div class="col-md-12" style="padding:0 3em">
		
			@include('loadingDiv')
			<script>
				$(window).on('load', function () {
					$(".loader").hide();
				});
			</script>

			<header id="header" id="home" style="width: 99%; margin: 0 auto">

				<div class="container">
					<div class="row align-items-center justify-content-between d-flex">
						<div id="logo">
							<a href="{{ url('/home') }}">
								<img src="{{asset('public/uploads/images/radioBikrampur/logo.png')}}" style="width: 100px; height: 100px; object-fit: contain;" />
							</a>
						</div>

						<nav id="nav-menu-container">
							{!! $html !!}						
						</nav>
					</div>
				</div>
			
				@include('security.radioPlayer');
			</header>

		</div>
		</div>
