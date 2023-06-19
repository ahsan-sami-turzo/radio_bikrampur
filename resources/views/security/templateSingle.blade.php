@include('security.navigationBar');
<body>
    <!-- start banner Area -->
    @php $query = DB::table('submenu')->select("*")->where('id',$id)->first(); @endphp
    @if($singlePage)
        <section class="banner-area relative" id="home" style="background:url('{{asset('public/uploads/images/backgroundImages')}}/{{$singlePage->backGroundImagePath}}');background-size:cover; ">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            @if($query)
                                {{$query->subMenuName}}
                            @endif
                        </h1>

                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="banner-area relative" id="home">
            <div class="overlay overlay-bg"></div>
            <div class="container">
                <div class="row d-flex align-items-center justify-content-center">
                    <div class="about-content col-lg-12">
                        <h1 class="text-white">
                            @if($query)
                                {{$query->subMenuName}}
                            @endif
                        </h1>

                    </div>
                </div>
            </div>
        </section>
    @endif
    <!-- End banner Area -->

			<!-- Start blog-posts Area -->
			<section class="blog-posts-area section-gap">
				<div class="container" >
					<div class="row">
                        @foreach($posts as $post)
						<div class="col-lg-12 post-list blog-post-list">
							<div class="single-post">

								<a href="#">
									<h1>
										{{$post->title}}
									</h1>
								</a>
                                @if($post->imgPath)
                                <img class="img-fluid" src="{{asset('public/uploads/images/singlePages/')}}/{{$post->imgPath}}" alt="">
                               @endif
								<div class="content-wrap">

									<blockquote class="generic-blockquote">
										{{$post->description}}
									</blockquote>


								</div>

							</div>
						</div>
                       @endforeach
					</div>
				</div>
			</section>
			<!-- End blog-posts Area -->


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
            <script src="{{asset('public/security/user/js/jquery.counterup.min.js"')}}'"></script>
            <script src="{{asset('public/security/user/js/parallax.min.js')}}"></script>
            <script src="{{asset('public/security/user/js/mail-script.js')}}"></script>
            <script src="{{asset('public/security/user/js/main.js')}}"></script>
        </body>
@include('security.footerBar');
