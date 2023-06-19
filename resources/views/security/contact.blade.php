@include('security.navigationBar');

<body>
	<!-- start banner Area -->
	@if($contactBackGrounds)
	<section class="banner-area relative" id="home" style="background:url('{{asset('public/uploads/images/backgroundImages/')}}/{{$contactBackGrounds->backGroundImagePath}}');">
		<div class="overlay overlay-bg"></div>
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						Contact Us
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
						Contact Us
					</h1>
					<p class="text-white link-nav"><a href="index.html">Home </a>  <span class="lnr lnr-arrow-right"></span>  <a href="contact.html"> Contact Us</a></p>
				</div>
			</div>
		</div>
	</section>
	@endif
	<!-- End banner Area -->

	<section>

	</section>
	<!-- Start contact-page Area -->
	<div class="map-wrap" style="width:100%; height: 445px;" id="map">
		@php
		$address = $contactInfos->address.','.$contactInfos->city.','.$contactInfos->country;
		echo '<iframe frameborder="0" width="100%" height="450"src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
		@endphp
	</div> 

	<section class="contact-page-area section-gap" >

		<div class="container">
			<div class="row">

				@if($contactInfos)
				<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						<div class="contact-details">
							<h5>{{$contactInfos->city}},{{$contactInfos->country}}</h5>
							<p>{{$contactInfos->address}}</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-phone-handset"></span>
						</div>
						<div class="contact-details">
							<h5>{{$contactInfos->ph}}</h5>
							<p>{{$contactInfos->timing}}</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-envelope"></span>
						</div>
						<div class="contact-details">
							<h5>{{$contactInfos->mail}}</h5>
							<p>{{$contactInfos->mailTag}}</p>
						</div>
					</div>
				</div>
				@else
				<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						<div class="contact-details">
							<h5>/h5>
								<p></p>
							</div>
						</div>
						<div class="single-contact-address d-flex flex-row">
							<div class="icon">
								<span class="lnr lnr-phone-handset"></span>
							</div>
							<div class="contact-details">
								<h5></h5>
								<p></p>
							</div>
						</div>
						<div class="single-contact-address d-flex flex-row">
							<div class="icon">
								<span class="lnr lnr-envelope"></span>
							</div>
							<div class="contact-details">
								<h5></h5>
								<p></p>
							</div>
						</div>
						@endif
						<div class="col-lg-8">
							<form class="form-area " id="contactForm"  class="contact-form text-right">
								<div class="row">
									<div class="col-lg-6 form-group">
										<input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

										<input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">

										<input name="subject" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
										<div class="mt-20 alert-msg" style="text-align: left;"></div>
									</div>
									<div class="col-lg-6 form-group">
										<textarea class="common-textarea form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
										<button class="primary-btn mt-20 text-white" style="float: right;">Send Message</button>

									</div>
								</div>
								{{csrf_field()}}
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- End contact-page Area -->

		<script src="{{ asset('public/security/user/js/vendor/jquery-2.2.4.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="{{ asset('public/security/user/js/vendor/bootstrap.min.js')}}"></script>
		{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script> --}}
		<script src="{{ asset('public/security/user/js/easing.min.js')}}"></script>
		<script src="{{ asset('public/security/user/js/hoverIntent.js')}}"></script>
		<script src="{{ asset('public/security/user/js/superfish.min.js')}}"></script>
		<script src="{{ asset('public/security/user/js/jquery.ajaxchimp.min.js')}}"></script>
		<script src="{{ asset('public/security/user/js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{ asset('public/security/user/js/owl.carousel.min.js')}}"></script>
		<script src="{{ asset('public/security/user/js/jquery.sticky.js')}}"></script>
		<script src="{{ asset('public/security/user/js/jquery.nice-select.min.js')}}"></script>
		<script src="{{ asset('public/security/user/js/waypoints.min.js')}}"></script>
		<script src="{{ asset('public/security/user/js/jquery.counterup.min.js')}}"></script>
		<script src="{{ asset('public/security/user/js/parallax.min.js')}}"></script>
		<script src="{{ asset('public/security/user/js/mail-script.js')}}"></script>
		<script src="{{ asset('public/security/user/js/main.js')}}"></script>
	</body>

	<script>
		$( document ).ready(function() {

			$("#contactForm").submit(function(event) {
				alert();
				event.preventDefault();
				var formData = $('form').serialize();

				$.ajax({
					type: 'post',
					url: './userContactFormSendMail',
					data: formData,
					dataType: 'json',
					success: function( _response ){

						toastr.success("success");
						setTimeout(function(){
							location.reload();
						}, 1500);

					},
					error: function( data ){
	        // Handle error
	        //alert(data);
	        console.log(data);


	    }
	});
			});

		});
	</script>

	<!-- start footer Area -->
	@include('security.footerBar');
	<!-- End footer Area -->
