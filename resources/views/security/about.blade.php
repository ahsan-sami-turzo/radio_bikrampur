
@include('security.navigationBar');

<body>
	<!-- start banner Area -->
	@if($aboutBackGrounds)
	<section class="banner-area relative" id="home" style="background:url('{{asset('public/uploads/images/backgroundImages')}}/{{$aboutBackGrounds->image}}');background-size:cover; ">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						About Us
					</h1>

				</div>
			</div>
		</div>
	</section>
	@else
	<section class="banner-area relative" id="home" style="">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						About Us
					</h1>
					<p class="text-white link-nav"></p>
				</div>
			</div>
		</div>
	</section>
	@endif
	<!-- End banner Area -->

	<!-- Start about-top Area -->
	<section class="about-top-area section-gap">
		<div class="container">
			<div class="row align-items-center">
				@php $count=1; @endphp

				@foreach($sectionOneContents as $sectionOneContent)
				@if( $count%2 == 1)
				<div class="col-lg-6 about-top-left" style="padding-top:1%;">
					<h1>
						{{$sectionOneContent->title}}
					</h1>
					<p>
						{{$sectionOneContent->description}}
					</p>
				</div>
				<div class="col-lg-6 about-top-right"  style="padding-top:1%;">
					<img class="img-fluid" src="{{asset('public/uploads/images/about/')}}/{{$sectionOneContent->imgPath}}" alt="" >
				</div>
				@else
				<div class="col-lg-6 about-top-left"  style="padding-top:1%;">
					<img class="img-fluid" src="{{asset('public/uploads/images/about/')}}/{{$sectionOneContent->imgPath}}" alt="">
				</div>
				<div class="col-lg-6 about-top-right"  style="padding-top:1%;">

					<h1>
						{{$sectionOneContent->title}}
					</h1>
					<p>
						{{$sectionOneContent->description}}
					</p>
				</div>
				@endif
				@php $count++;@endphp
				@endforeach

			</div>
		</div>
	</section>
	<!-- End about-top Area -->


	<!-- Start service Area -->
	<section class="service-area section-gap" id="service">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">{{$servicesSectionTwoName->title}}</h1>
						<p>{{$servicesSectionTwoName->description}}</p>
					</div>
				</div>
			</div>
			<div class="row">
				@if($sectionTwoContents)
				@php  $count =0;@endphp
				@foreach($sectionTwoContents as $sectionTwoContent)
				@if($count == 3)
				@php break;@endphp
				@else
				@php $count++;@endphp
				<div class="col-lg-4">
					<div class="single-service">
						<div class="thumb">
							<img class="img-fluid" src="{{asset('public/uploads/images/services/')}}/{{$sectionTwoContent->imgPath}}" alt="" style="height:200px;">
						</div>
						<div class="detail">
							<a href="#"><h4>{{$sectionTwoContent->title}}</h4></a>
							<p>
								{{$sectionTwoContent->description}}
							</p>
						</div>
					</div>
				</div>
				@endif
				@endforeach
				@endif
			</div>

		</div>
		<div class="col-md-12" style="text-align:center;padding-top:1%;">
			<a href="{{url('/services')}}" class="primary-btn text-uppercase btn_proparty">More</a>
		</div>
	</section>
	<!-- End service Area -->

	<!-- Start fact Area -->
{{-- 	<section class="facts-area section-gap" id="facts-area">
		<div class="container">
			<div class="row">
				<div class="col single-fact">
					<h1 class="counter">2536</h1>
					<p>Projects Completed</p>
				</div>
				<div class="col single-fact">
					<h1 class="counter">6784</h1>
					<p>Really Happy Clients</p>
				</div>
				<div class="col single-fact">
					<h1 class="counter">1059</h1>
					<p>Total Tasks Completed</p>
				</div>
				<div class="col single-fact">
					<h1 class="counter">2239</h1>
					<p>Cups of Coffee Taken</p>
				</div>
				<div class="col single-fact">
					<h1 class="counter">435</h1>
					<p>In House Professionals</p>
				</div>
			</div>
		</div>
	</section> --}}
	<!-- end fact Area -->

	<!-- Start team Area -->
	<!-- <section class="team-area section-gap" id="team">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Experienced Mentor Team</h1>
						<p>Who are in extremely love with eco friendly system.</p>
					</div>
				</div>
			</div>
			<div class="row justify-content-center d-flex align-items-center">
				<div class="col-md-3 single-team">
					<div class="thumb">
						<img class="img-fluid" src="{{asset('public/security/user/img/pages/t1.jpg')}}" alt="">
						<div class="align-items-center justify-content-center d-flex">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
					<div class="meta-text mt-30 text-center">
						<h4>Ethel Davis</h4>
						<p>Managing Director (Sales)</p>
					</div>
				</div>
				<div class="col-md-3 single-team">
					<div class="thumb">
						<img class="img-fluid" src="{{asset('public/security/user/img/pages/t2.jpg')}}" alt="">
						<div class="align-items-center justify-content-center d-flex">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
					<div class="meta-text mt-30 text-center">
						<h4>Rodney Cooper</h4>
						<p>Creative Art Director (Project)</p>
					</div>
				</div>
				<div class="col-md-3 single-team">
					<div class="thumb">
						<img class="img-fluid" src="{{asset('public/security/user/img/pages/t3.jpg')}}" alt="">
						<div class="align-items-center justify-content-center d-flex">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
					<div class="meta-text mt-30 text-center">
						<h4>Dora Walker</h4>
						<p>Senior Core Developer</p>
					</div>
				</div>
				<div class="col-md-3 single-team">
					<div class="thumb">
						<img class="img-fluid" src="{{asset('public/security/user/img/pages/t4.jpg')}}" alt="">
						<div class="align-items-center justify-content-center d-flex">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
					<div class="meta-text mt-30 text-center">
						<h4>Lena Keller</h4>
						<p>Creative Content Developer</p>
					</div>
				</div>
			</div>
		</div>
	</section> -->
	<!-- End team Area -->

	<!-- Start galery Area -->
	<section class="galery-area section-gap" id="gallery">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-70 col-lg-8">
					@if($galleryName)
					<div class="title text-center">
						<h1 class="mb-10">{{$galleryName->title}}</h1>
						<p>{{$galleryName->description}}</p>
					</div>
					@endif
				</div>
			</div>
			<div class="row">
				@if($galleries)
				@foreach($galleries as $gallery)
				<div class="col-lg-4 col-md-4">
					<a href="{{asset('public/uploads/images/photoGallery/')}}/{{$gallery->imgPath}}" class="single-gallery">
						<img class="img-fluid" src="{{asset('public/uploads/images/photoGallery/')}}/{{$gallery->imgPath}}" alt="" style="height:200px;">
					</a>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</section>
	<!-- End galery Area -->
	<script src="{{asset('public/security/user/js/vendor/jquery-2.2.4.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="{{asset('public/security/user/js/vendor/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
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
</body>

<!-- start footer Area -->
@include('security.footerBar');
<!-- End footer Area -->
