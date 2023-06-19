<style type="text/css">
.vl {
	border-left: 6px solid green;
	height: 500px;
}
</style>

<footer class="footer-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-5 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h6>About Us</h6>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
					</p>
					{{-- <p class="footer-text">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <br>Forties Security | Powered <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://www.ambalait.com" target="_blank">Ambala IT</a>
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p> --}}
				</div>
			</div>
			<div class="col-lg-5  col-md-6 col-sm-6">
				<div class="single-footer-widget">

					<div class="" id="mc_embed_signup">
						{{-- <form target="_blank" novalidate="true" action="" method="get" class="form-inline">
							<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
							<button class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
							<div style="position: absolute; left: -5000px;">
								<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
							</div>

							<div class="info"></div>
						</form> --}}
						@php $contact = DB::table('contactInfos')->select('*')->first(); @endphp
						<h6>Address</h6>
						<p>
							{{$contact->address}}
						    </br>
						    {{$contact->city}}, {{$contact->country}}
						    </br>
							PH: {{$contact->ph}}
						</p>

					</div>
				</div>
			</div>
			<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
				<div class="single-footer-widget">
					<h6>Follow Us</h6>
					<p>Let us be social</p>
					<div class="footer-social d-flex align-items-center">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-dribbble"></i></a>
						<a href="#"><i class="fa fa-behance"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>

<div class="row" style="background-color: #090f27 !important;">

	<div class="col-md-12">
		<p style="text-align: center; margin-top: 3px !important; margin-bottom: 2px !important; color:white">©Radio Bikrampur 2020 | All Rights Reserved </p>
		<p style="text-align: center; margin-bottom: 3px !important;color:white"><a href="https://www.ambalait.com/" target="_blank" style="color:#fab700">Powered By <img src="{{asset('public/security/user/img/ambalait.png')}}" alt="" style="height:30px;margin-bottom:0.8%;"></a>

		</p>
	</div>
</div>

</html>
