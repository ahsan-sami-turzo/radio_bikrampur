@if($videoUrls)

<div class="col-md-12 container" style="padding: 0 3em">

    <div class="row d-flex justify-content-center">
        <div class="menu-content pb-20 col-lg-8">
            <div class="title text-center">
                <h1 class="mb-10">Video Gallery</h1>
                <p>Previous videos</p>
            </div>
        </div>
    </div>

    <div class="row">  
        {{-- <div class="col-lg-12 col-md-12">
            <iframe width="95.5%" height="480" src="https://www.youtube.com/embed/?listType=playlist&list={{ $playlist->id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div> --}}

        {{-- <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/?listType=playlist&list={{ $playlist->id }}"></iframe>
        </div> --}}
    </div>


    {{-- // automatically fetched from channel  --}}

    <div class="row d-flex justify-content-center">  
        @foreach ($videoList as $video)
            <?php  $url = $video->id->videoId; ?>
            <div class="col-lg-4 col-md-4 col-sm-12" style="padding-top: 3em">
                {{-- <iframe src="https://www.youtube.com/embed/{{ $url }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $url }}"></iframe>
                </div>
            </div>            
        @endforeach        
    </div>
    
    {{-- saved youtube links in database  --}}

    <div class="row d-flex justify-content-center">  
        @foreach ($videoUrls as $video)
            <?php  $url = explode("=", $video->url); ?>
            <div class="col-lg-4 col-md-4 col-sm-12" style="padding-top: 3em">
                {{-- <iframe src="https://www.youtube.com/embed/{{ $url[1] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $url[1] }}"></iframe>
                </div>
            </div>            
        @endforeach        
    </div>

</div>


@endif