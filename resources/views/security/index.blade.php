
@include('security.navigationBar');
{{-- @include('security.radioPlayer'); --}}

{{-- {{var_dump($menuHtml)}} --}}

<style type="text/css">
	.text_align {
		text_align: center !important;
	}
</style>


{{-- <body> --}}

	<!-- start carousel -->
	<section class="galery-area section-gap" id="banner">
		<div id="carouselExampleIndicators" class="carousel slide relative" data-ride="carousel">

			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>

			<div class="carousel-inner" style="width: 95%; margin: 0 auto">
				@php $count = 0; @endphp
				@foreach($sliders as $slider)
					@if($count == 0)
						@php $count++; @endphp
						<div class="carousel-item active">
							<img class="d-block w-100" style="object-fit: cover" src="{{asset('public/uploads/images/sliders/')}}/{{$slider->imgPath}}" alt="First slide" />
							<div class="carousel-caption d-none d-md-block" style="margin-bottom:10%;">
								<h1 style="color:#458a00;">{{$data->title}}</h1>
								<h3 style="color:#e20917;">{{$data->paragraph}}</h3>	
							</div>
						</div>
					@else
						<div class="carousel-item">
							<img class="d-block w-100" style="object-fit: cover" src="{{asset('public/uploads/images/sliders/')}}/{{$slider->imgPath}}" alt="Third slide" />
							<div class="carousel-caption d-none d-md-block" style="margin-bottom:10%;">	
								<h1 style="color:#458a00;">{{$data->title}}</h1>
								<h3 style="color:#e20917;">{{$data->paragraph}}</h3>
							</div>
						</div>
					@endif
				@endforeach
			</div>

			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>

		</div>
	</section>
	<!-- End carousel -->

	

	<section class="galery-area section-gap" id="whoweare">
		@include('security.whoweare', ['whoweare' => $whoweare]);
	</section>


	<section class="galery-area section-gap" id="Programs">
		@include('security.programs', ['currentPrograms' => $currentPrograms, 'upcomingPrograms' => $upcomingPrograms]);
	</section>


	<section class="galery-area section-gap" id="Schedule">
		@include('security.programSchedule', ['programSchedules' => $programSchedules]);
	</section>


	<section class="galery-area section-gap" id="Team">
		@include('security.team', ['team' => $team]);
	</section>

	<section class="galery-area section-gap" id="Media">
		@include('security.gallery', ['galleryName' => $galleryName, 'galleries' => $galleries]);
	</section>


	<section class="galery-area section-gap" id="videoGallery">
		@include('security.videoGallery', ['videoUrls' => $videoUrls]);
	</section>

	<section class="galery-area section-gap" id="News">
		@include('security.news', ['news' => $news]);
	</section>

	<section class="galery-area section-gap" id="ContactUs">
		@include('security.contactUs', ['contactInfos' => $contactInfos]);
	</section>

	<!-- Start fact Area -->
	@if($factsArea)
		<section class="facts-area section-gap" id="facts-area" style="background-color:#b6dad3">
			<div class="container">
				<div class="row">
					<div class="col single-fact">
						<h1 class="counter">{{$factsArea->firstColContent}}</h1>
						<p>{{$factsArea->firstColName}}</p>
					</div>
					<div class="col single-fact">
						<h1 class="counter">{{$factsArea->secondColContent}}</h1>
						<p>{{$factsArea->secondColName}}</p>
					</div>
					<div class="col single-fact">
						<h1 class="counter">{{$factsArea->thirdColContent}}</h1>
						<p>{{$factsArea->thirdColName}}</p>
					</div>
					<div class="col single-fact">
						<h1 class="counter">{{$factsArea->fourthColContent}}</h1>
						<p>{{$factsArea->fourthColName}}</p>
					</div>
				</div>
			</div>
		</section>
	@endif
	<!-- end fact Area -->

<style>
	#testimonialCarousel	h2 {
		color: #333;
		text-align: center;
		text-transform: uppercase;
		font-family: "Roboto", sans-serif;
		font-weight: bold;
		position: relative;
		margin: 30px 0 60px;
	}
	#testimonialCarousel h2::after {
		content: "";
		width: 100px;
		position: absolute;
		margin: 0 auto;
		height: 3px;
		background: #8fbc54;
		left: 0;
		right: 0;
		bottom: -10px;
	}
	#testimonialCarousel	.col-center {
		margin: 0 auto;
		float: none !important;
	}
	#testimonialCarousel	.carousel {
		margin: 50px auto;
		padding: 0 70px;
	}
	#testimonialCarousel.carousel .item {
		color: #999;
		font-size: 14px;
		text-align: center;
		overflow: hidden;
		min-height: 290px;
	}
	#testimonialCarousel.carousel .item .img-box {
		width: 135px;
		height: 135px;
		margin: 0 auto;
		padding: 5px;
		border: 1px solid #ddd;
		border-radius: 50%;
	}
	.carousel .img-box img {
		width: 100%;
		height: 100%;
		display: block;
		border-radius: 50%;
	}
	#testimonialCarousel.carousel .testimonial {
		padding: 30px 0 10px;
	}
	#testimonialCarousel.carousel .overview {
		font-style: italic;
	}
	#testimonialCarousel.carousel .overview b {
		text-transform: uppercase;
		color: #7AA641;
	}
	#testimonialCarousel.carousel .carousel-control {
		width: 40px;
		height: 40px;
		margin-top: -20px;
		top: 50%;
		background: none;
	}
	#testimonialCarousel .carousel-control i {
		font-size: 68px;
		line-height: 42px;
		position: absolute;
		display: inline-block;
		color: rgba(0, 0, 0, 0.8);
		text-shadow: 0 3px 3px #e6e6e6, 0 0 0 #000;
	}
	#testimonialCarousel-indicators {
		bottom: -40px;
	}
	#testimonialCarousel-indicators li, #testimonialCarousel-indicators li.active {
		width: 10px;
		height: 10px;
		margin: 1px 3px;
		border-radius: 50%;
	}
	#testimonialCarousel-indicatorsli {
		background: #999;
		border-color: transparent;
		box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
	}
	#testimonialCarousel-indicators li.active {
		background: #555;
		box-shadow: inset 0 2px 1px rgba(0,0,0,0.2);
	}
</style>

<script src="{{asset('public/security/user/js/vendor/jquery-2.2.4.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('public/security/user/js/vendor/bootstrap.min.js')}}"></script>
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> --}}
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8AfASq_mnfHz8EbX6SedyfoiKc5yMOp8"></script> --}}
<script src="{{asset('public/security/user/js/easing.min.js')}}"></script>
<script src="{{asset('public/security/user/js/hoverIntent.js')}}"></script>
<script src="{{asset('public/security/user/js/superfish.min.js')}}"></script>
<script src="{{asset('public/security/user/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('public/security/user/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/security/user/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/security/user/js/jquery.sticky.js')}}"></script>
<script src="{{asset('public/security/user/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('public/security/user/js/waypoints.min.js')}}"></script>
<script src="{{asset('public/security/user/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('public/security/user/js/parallax.min.js')}}"></script>
<script src="{{asset('public/security/user/js/mail-script.js')}}"></script>
<script src="{{asset('public/security/user/js/main.js')}}"></script>

<script>
	$( document ).ready(function() {
		$('.carousel').carousel({
			interval: 2000
		});
	});
</script>



</body>
<!-- start footer Area -->
@include('security.footerBar');
<!-- End footer Area -->
