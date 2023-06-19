@include('security.navigationBar');
<body>
	<!-- start banner Area -->
	@if($servicesBackGrounds)
		<section class="banner-area relative" style="background:url('{{asset('public/uploads/images/backgroundImages/')}}/{{$servicesBackGrounds->backGroundImagePath}}');background-size:cover;">

			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">

					<div class="about-content col-lg-12">
						<h1 class="text-white">
							Services
						</h1>

					</div>
				</div>
			</div>

		</section>
	@else
		<section class="banner-area relative" >
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">

					<div class="about-content col-lg-12">
						<h1 class="text-white">
							Services
						</h1>
						<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="service.html"> Services</a></p>
					</div>
				</div>
			</div>

		</section>
	@endif
	<!-- End banner Area -->


	<!-- Start service Area -->
	<section class="service-area service-page-service section-gap" id="service">
		<div class="container">
			<div class="row d-flex justify-content-center">

				<div class="menu-content pb-80 col-lg-6">
					<div class="title text-center">
						@if($servicesSectionONeName)
							<h1 class="mb-10">{{$servicesSectionONeName->title}}</h1>
							<p class="text_color">{{$servicesSectionONeName->description}}</p>
						@endif
					</div>
				</div>
			</div>
			<div class="row">
				@if($sectionOneContents)
					@foreach($sectionOneContents as $sectionOneContent)
						<div class="col-lg-4">
							<div class="single-service">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('public/uploads/images/services')}}/{{$sectionOneContent->imgPath}}" alt="" style="height:200px;">
								</div>
								<div class="detail">
									<a href="#"><h4>{{$sectionOneContent->title}}</h4></a>
									<p>
										{{$sectionOneContent->description}}
									</p>
								</div>
							</div>
						</div>
					@endforeach
				@endif
			</div>

		</div>
	</section>
	<!-- End service Area -->

	<!-- Start feature Area -->
	<section class="feature-area section-gap" id="feature">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-md-8 pb-40 header-text">
					@if($servicesSectionTwoName)
						<h1>{{$servicesSectionTwoName->title}}</h1>
						<p class="text_color">
							{{$servicesSectionTwoName->description}}
						</p>
					@endif
				</div>
			</div>
			<div class="row">
				@if($sectionTwoContents)
					@foreach($sectionTwoContents as $sectionTwoContent)
						<div class="col-lg-4 col-md-6">
							<div class="single-feature">
								<h4><span class="lnr lnr-user"></span>{{$sectionTwoContent->title}}</h4>
								<p class="text_color_black">
									{{$sectionTwoContent->description}}
								</p>
							</div>
						</div>
					@endforeach
				@endif
			</div>
		</div>
	</section>
	<!-- End feature Area -->

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="{{asset('public/security/user/js/easing.min.js')}}"></script>
	<script src="{{asset('public/security/user/js/hoverIntent.js')}}"></script>
	<script src="{{asset('public/security/user/js/superfish.min.js')}}"></script>
	<script src="{{asset('public/security/user/js/jquery.ajaxchimp.min.js')}}"></script>
	<script src="{{asset('public/security/user/js/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('public/security/user/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('public/security/user/js/jquery.sticky.js')}}"></script>
	<script src="{{asset('public/security/user/js/jquery.nice-select.min.js')}}"></script>
	{{-- <script src="{{asset('public/security/user/js/waypoints.min.js')}}"></script> --}}
	<script src="{{asset('public/security/user/js/jquery.counterup.min.js')}}"></script>
	<script src="{{asset('public/security/user/js/parallax.min.js')}}"></script>
	<script src="{{asset('public/security/user/js/mail-script.js')}}"></script>
	<script src="{{asset('public/security/user/js/main.js')}}"></script>
	<script src="{{asset('public/security/user/js/vendor/bootstrap.min.js')}}"></script>
</body>


<!-- start footer Area -->
@include('security.footerBar');
<!-- End footer Area -->
