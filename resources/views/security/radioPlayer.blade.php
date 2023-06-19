<style>

.container-audio {
    width: 95%;
    height: auto;
    padding: 1em;
    border-radius: 5px;
    background-color: #eee;
    color: #444;
    margin: 0 auto;
    overflow: hidden;
}
audio {
  width:100%;
  height: 0;
}


@media (max-width: 760px) {
    .player-buttons{	
		position: absolute;
		width: 6em;		
		/* top: 50%;
    	transform: translateY(-50%); */
		top: 1em;
		left: 0; 
		right: 0;
		margin: auto;
	}
	.container-audio {
		background-color: transparent;
	}
	#volumeSlider{
		display: none !important;
	}
}

@media (min-width: 760px) {
    .player-buttons{	
		width: 20em;
		margin: 0 auto;	
		/* padding-top: 1.5em; */
	}
}

.slider {
  -webkit-appearance: none;
  width: 100%;
  height: 25px;
  margin-top: 0.5em;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
}

.slider:hover {
  opacity: 1;
}

.slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}

.slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #4CAF50;
  cursor: pointer;
}
</style>

{{-- <div class="row align-items-center justify-content-between d-flex" >
	<div class="liveaudio" style="padding:2em; width:100%">
		<audio controls autoplay>
		<source src="http://192.168.1.155:8000/radiobikrampur" type="audio/ogg">
		<source src="http://192.168.1.155:8000/radiobikrampur" type="audio/mpeg">
			Your browser does not support the audio element.
		</audio>
	</div>
</div> --}}


<div class="container-audio">
	<audio id="audioplayer">
		<source src="http://192.168.1.155:8000/radiobikrampur" type="audio/ogg">
		<source src="http://192.168.1.155:8000/radiobikrampur" type="audio/mpeg">
		Your browser dose not Support the audio Tag
	</audio>
	<div class="player-buttons">
		<button class="btn btn-outline-success" id="playBtn"><i class="fa fa-play"></i></button>
		<button class="btn btn-outline-success" id="pauseBtn"><i class="fa fa-stop"></i></button>
		<button class="btn" id="volumeSlider">
			<input type="range" min="0" max="1" value=".8" step=".1" class="slider" id="myRange">
		</button>
	</div>	
</div>


<script>
	$(document).ready(function() { 
		var sound = document.getElementById("audioplayer");
		sound.volume = .8;
	});

	document.getElementById('playBtn').onclick = function(){
		document.getElementById("playBtn").classList.remove('btn-outline-success');
		document.getElementById("playBtn").classList.add('btn-success');

		document.getElementById("pauseBtn").classList.remove('btn-success');
		document.getElementById("pauseBtn").classList.add('btn-outline-success');

		document.getElementById("audioplayer").play();
	}

	document.getElementById('pauseBtn').onclick = function(){
		document.getElementById("pauseBtn").classList.remove('btn-outline-success');
		document.getElementById("pauseBtn").classList.add('btn-success');

		document.getElementById("playBtn").classList.remove('btn-success');
		document.getElementById("playBtn").classList.add('btn-outline-success');

		document.getElementById("audioplayer").pause();
	}

	var rng = document.getElementById("myRange");

	read("mousedown");
	read("mousemove");
	read("keydown"); 

	function read(evtType) {
		rng.addEventListener(evtType, function() {
			window.requestAnimationFrame(function () {
				var sound = document.getElementById("audioplayer");
				sound.volume = rng.value;
			});
		});
	}

</script>


