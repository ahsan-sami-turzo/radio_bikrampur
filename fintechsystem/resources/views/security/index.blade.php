
@include('security.navigationBar');

<style type="text/css">
.text_align {
	text_align: center !important;
}
</style>


<body>
	<!-- start banner Area -->

	<div id="carouselExampleIndicators" class="carousel slide relative" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			@php $count =0; @endphp
			@foreach( $sliders as $slider)
				@if($count == 0)
					@php $count++;@endphp
					<div class="carousel-item active">
						<img class="d-block w-100" src="{{asset('public/uploads/images/sliders/')}}/{{$slider->imgPath}}" alt="First slide" >
						<div class="carousel-caption d-none d-md-block" style="margin-bottom:10%;">
							
						
							<h1 style="color:#458a00;font-family:Courier New;">{{$data->title}}</h1>
							<h3 style="color:#e20917;font-family:Courier New;">{{$data->paragraph}}</h3>
						    </br></br></br>
						  <a href="#service"> <img  src="{{asset('public/security/user/img/arrow.png')}}" alt="First slide"  style="width:5%;"></a>
					   </div>
				   </div>
			   @else
					<div class="carousel-item">
						<img class="d-block w-100" src="{{asset('public/uploads/images/sliders/')}}/{{$slider->imgPath}}" alt="Third slide">
						<div class="carousel-caption d-none d-md-block" style="margin-bottom:10%;">	
						   @if($slider->sliderName!="ambalaItDefault")								     
							<h1 style="color:#458a00;">{{$data->title}}</h1>
							<h3 style="color:#e20917;">{{$data->paragraph}}</h3>
						   </br></br></br>
						   <a href="#service"><img  src="{{asset('public/security/user/img/arrow.png')}}" alt="First slide" style="width:5%;margin-right:5%;" ></a>
					       @endif
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


<!-- End banner Area -->

<!-- Start service Area -->
<section class="service-area section-gap" id="service">
	<div class="container">
		@if($sections)
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">{{$sections->title}}</h1>
					<p>{{$sections->description}}</p>
				</div>
			</div>
		</div>
		@endif
		<div class="row">
			@if($servicesContents)
			@php $count =0; @endphp
			@foreach($servicesContents as $servicesContent)
			@if($count>2)
			    @break;
			@else
			<div class="col-lg-4">
				<div class="single-service">
					<div class="thumb">
						<img class="img-fluid" src="{{asset('public/uploads/images/services')}}/{{$servicesContent->imgPath}}" alt="" style="height:200px;">
					</div>
					<div class="detail">
						<a href="#"><h4>{{$servicesContent->title}}</h4></a>
						<p>
						{{$servicesContent->description}}
						</p>
					</div>
				</div>
			</div>
			@endif
			@php $count++; @endphp
			@endforeach
			@endif
		</div>
		<div class="row" style="padding-top:1%;">
			<div class="col-md-5"></div>
			<div class="col-md-2" style="text-align:center;">
				<a href="{{url('/services')}}" class="primary-btn text-uppercase btn_proparty">More</a>
			</div>
			<div class="col-md-5"></div>

	</div>
</section>
<!-- End service Area -->


<!-- Start feature Area -->
<section class="feature-area section-gap" id="feature">
	<div class="container">
		@php
		   $featureName = DB::table('catagory')->select('*')->where('menuId',2)->where('sectionId',2)->first();
		@endphp
		@if($featureName)
		<div class="row d-flex justify-content-center">
			<div class="col-md-8 pb-40 header-text">
				<h1>{{$featureName->title}}</h1>
				<p>
					{{$featureName->description}}
				</p>
			</div>
		</div>
		@endif
		<div class="row">
       @if($featuresContents)
			   @foreach($featuresContents as $featuresContent)
					<div class="col-lg-4 col-md-6">
						<div class="single-feature">
							<h4><span class="lnr lnr-user"></span>{{$featuresContent->title}}</h4>
							<p>
								{{$featuresContent->description}}
							</p>
						</div>
					</div>
					@endforeach
			 @endif
		</div>
	</div>
</section>
<!-- End feature Area -->

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
			<!-- <div class="col-lg-7 col-md-6">
				<a href="{{url('security/user/img/g1.jpg')}}" class="single-gallery">
					<img class="img-fluid" src="{{asset('public/security/user/img/g1.jpg')}}" alt="">
				</a>
			</div> -->
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

<!-- Start blog Area -->
<!-- <section class="blog-area section-gap" id="blog">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Latest From Our Blog</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore  et dolore magna aliqua.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-md-6 single-blog">
				<div class="thumb">
					<img class="img-fluid" src="{{asset('public/security/user/img/b1.jpg')}}" alt="">
				</div>
				<p class="date">10 Jan 2018</p>
				<a href="#"><h4>Addiction When Gambling
					Becomes A Problem</h4></a>
					<p>
						inappropriate behavior ipsum dolor sit amet, consectetur.
					</p>
					<div class="meta-bottom d-flex justify-content-between">
						<p><span class="lnr lnr-heart"></span> 15 Likes</p>
						<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 single-blog">
					<div class="thumb">
						<img class="img-fluid" src="{{asset('public/security/user/img/b2.jpg')}}" alt="">
					</div>
					<p class="date">10 Jan 2018</p>
					<a href="#"><h4>Addiction When Gambling
						Becomes A Problem</h4></a>
						<p>
							inappropriate behavior ipsum dolor sit amet, consectetur.
						</p>
						<div class="meta-bottom d-flex justify-content-between">
							<p><span class="lnr lnr-heart"></span> 15 Likes</p>
							<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 single-blog">
						<div class="thumb">
							<img class="img-fluid" src="{{asset('public/security/user/img/b3.jpg')}}" alt="">
						</div>
						<p class="date">10 Jan 2018</p>
						<a href="#"><h4>Addiction When Gambling
							Becomes A Problem</h4></a>
							<p>
								inappropriate behavior ipsum dolor sit amet, consectetur.
							</p>
							<div class="meta-bottom d-flex justify-content-between">
								<p><span class="lnr lnr-heart"></span> 15 Likes</p>
								<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 single-blog">
							<div class="thumb">
								<img class="img-fluid" src="{{asset('public/security/user/img/b4.jpg')}}" alt="">
							</div>
							<p class="date">10 Jan 2018</p>
							<a href="#"><h4>Addiction When Gambling
								Becomes A Problem</h4></a>
								<p>
									inappropriate behavior ipsum dolor sit amet, consectetur.
								</p>
								<div class="meta-bottom d-flex justify-content-between">
									<p><span class="lnr lnr-heart"></span> 15 Likes</p>
									<p><span class="lnr lnr-bubble"></span> 02 Comments</p>
								</div>
							</div>
						</div>
					</div>
				</section> -->
				<!-- End blog Area -->

				<section>
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-center m-auto">
								<div class ="text-center">
									<h2>Testimonials</h2>
								</div>
								<div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
									<!-- Carousel indicators -->
									<!-- <ol class="carousel-indicators" id ="testimonialCarousel-indicators">
										<li data-target="#testimonialCarousel" data-slide-to="0" class="active"></li>
										<li data-target="#testimonialCarousel" data-slide-to="1"></li>
										<li data-target="#testimonialCarousel" data-slide-to="2"></li>
									</ol> -->
									@php $size=sizeof($portfolios); @endphp
									<ol class="carousel-indicators" id ="testimonialCarousel-indicators">
										@for($x=0;$x<$size;$x++)
											@if($x==0)
											  <li data-target="#testimonialCarousel" data-slide-to="{{$x}}" class="active"></li>
											@else
										  	<li data-target="#testimonialCarousel" data-slide-to="{{$x}}"></li>
											@endif

										@endfor
									</ol>
									<!-- Wrapper for carousel items -->
									<div class="carousel-inner" id ="testimonialCarousel-inner">
										@php $count=0; @endphp
										@foreach($portfolios as $portfolio)
										@if($count== 0)
										<div class="item carousel-item active">
											<div class="img-box"><img src="{{asset('public/uploads/images/portfolio')}}/{{$portfolio->imgPath}}" alt=""></div>
											<p class="testimonial">{{$portfolio->description}}</p>
											<p class="overview"><b>{{$portfolio->title}}</b></p>
										</div>
										@else
										<div class="item carousel-item">
											<div class="img-box"><img src="{{asset('public/uploads/images/portfolio')}}/{{$portfolio->imgPath}}" alt=""></div>
											<p class="testimonial">{{$portfolio->description}}</p>
											<p class="overview"><b>{{$portfolio->title}}</b></p>
										</div>
										@endif
                    @php $count++;@endphp
										@endforeach
									</div>
									<!-- Carousel controls -->
									<a class="carousel-control left carousel-control-prev" href="#testimonialCarousel" data-slide="prev">
										<i class="fa fa-angle-left"></i>
									</a>
									<a class="carousel-control right carousel-control-next" href="#testimonialCarousel" data-slide="next">
										<i class="fa fa-angle-right"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</section>


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
				<script>
				$( document ).ready(function() {

					$('.carousel').carousel({
						interval: 2000
					});
				});
				</script>
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
