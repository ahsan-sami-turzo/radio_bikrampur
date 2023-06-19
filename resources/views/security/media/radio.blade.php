@include('security.navigationBar');

<style media="screen">

  .card {
    -webkit-border-radius: 10px;
    border-radius: 10px; }

  .card .view {
    -webkit-border-top-left-radius: 10px;
    border-top-left-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    border-top-right-radius: 10px; }

  .card h5 a {
    color: #0d47a1;
  }
  .card h5 a:hover {
    color: #072f6b;
  }

  #pButton {
    float: left; }

  #timeline {
    width: 90%;
    height: 2px;
    margin-top: 20px;
    margin-left: 10px;
    float: left;
    -webkit-border-radius: 15px;
    border-radius: 15px;
    background: rgba(0, 0, 0, 0.3); }

  #pButton {
    margin-top: 12px;
    cursor: pointer; }

  #playhead {
    width: 8px;
    height: 8px;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    margin-top: -3px;
    background: black;
    cursor: pointer; }

</style>

<body>

	<div class="container">

		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Radio Bikrampur</h1>
				</div>
			</div>
		</div>


    <div class="row d-flex justify-content-center">
			<div class="pb-70 col-lg-8 col-md-6">

        <!-- Card -->
        <div class="card">

          <!-- Card image -->
          <div class="view" style="padding:4em">
            <img class="card-img-top" src="{{ asset('public/uploads/images/radioBikrampur/rb4.jpg') }}" alt="Radio Bikrampur">
          </div>

          <!-- Card content -->
          <div class="card-body text-center">

            <h5 class="h5 font-weight-bold">{{ $youTubeLive->channel_title }}</h5>
            <p class="mb-0"> {{ $youTubeLive->live_video_title }} </p>


            <div class="liveaudio" style="padding:2em">
              <audio controls style="width:100%">
                <source src="http://192.168.1.155:8000/radiobikrampur" type="audio/ogg">
                <source src="http://192.168.1.155:8000/radiobikrampur" type="audio/mpeg">
                  Your browser does not support the audio element.
              </audio>
            </div>
            
            
            {{-- <div class="livevideo">
              <video controls>
                <source src="https://usb.bozztv.com/ssh101/radiobikrampur/index.m3u8" type="video/ogg">
                <source src="https://usb.bozztv.com/ssh101/radiobikrampur/index.m3u8" type="video/mpeg">
                  Your browser does not support the audio element.
              </video>
            </div> --}}

            <div style="padding:2em">
              <iframe 
                src='https://www.ssh101.com/securelive/index.php?id=radiobikrampur2' 
                frameborder=0 
                scrolling=no 
                align=middle 
                width=640 
                height=360 
                webkitallowfullscreen 
                mozallowfullscreen 
                allowfullscreen
              ></iframe>
            </div>
              
            {{-- <div id="audioLive"></div>   --}}


            {{-- <div style="padding: 2em">
              <iframe
                src="https://player.twitch.tv/?channel=radiobikrampur&parent=120.50.0.141"
                frameborder=0 
                scrolling=no 
                align=middle 
                width=640 
                height=360 
                webkitallowfullscreen 
                mozallowfullscreen 
                allowfullscreen
                ></iframe>
            </div> --}}

            <div id="player">
                @if($youTubeLive->isLive)
                    <?php  echo $youTubeLive->embed_code; ?>
                @else
                    <h3>Not live now. Please check back later.</h3>
                @endif
            </div>
            

          </div>

        </div>
        <!-- Card -->

			</div>
		</div>

	</div>


<script>
  document.getElementById('audioLive').innerHTML = ('<div style="width:5em; margin: 0 auto; padding: 2em 0"><iframe src="//myradiostream.com/embed/free.php?s=bikrampur&btnstyle=circle&id=572148&n=47&p=10338" name="8gnaww6p2w9P" frameborder="0" scrolling="no" style="width:320px;height:50px;border:0;margin:0;overflow:hidden;border-radius:2px;"></iframe></div>');
</script>
    

</body>

@include('security.footerBar');
