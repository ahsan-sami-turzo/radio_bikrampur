<div class="col-md-12 container" style="padding: 0 3em">
	
	<div class="map-wrap" style="width:100%; height: 500px;" id="map">
		@php
			$address = $contactInfos->address.','.$contactInfos->city.','.$contactInfos->country;
			echo '<iframe frameborder="0" width="100%" height="450"src="https://maps.google.com/maps?f=q&source=s_q&hl=en&geocode=&q=' . str_replace(",", "", str_replace(" ", "+", $address)) . '&z=14&output=embed"></iframe>';
			// echo '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.274515863248!2d90.36185911536296!3d23.77323699381967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0a51900b621%3A0x947cfa666b9ded24!2sAmbala%20Foundation!5e0!3m2!1sen!2sbd!4v1592908039321!5m2!1sen!2sbd" frameborder="0" style="border:0; width: 100%; height: 100%" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>'
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


<script>
	$( document ).ready(function() {
		$("#contactForm").submit(function(event) {
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
					console.log(data);
				}
			});
		});
	});
</script>

	
