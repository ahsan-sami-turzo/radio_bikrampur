<div class="col-md-12 container" style="padding: 0 3em">

    <div class="row d-flex justify-content-center">
        <div class="menu-content pb-20 col-lg-8">,
            <div class="title text-center">
                <h1 class="mb-10">Gallery</h1>
            </div>
        </div>
    </div>

    {{-- <div class="row">    
        @if($galleries)
            @foreach($galleries as $gallery)
            <div class="col-lg-4 col-md-4">
                <a href="{{asset('public/uploads/images/photoGallery/')}}/{{$gallery->imgPath}}" class="single-gallery">
                    <img class="img-fluid" src="{{asset('public/uploads/images/photoGallery/')}}/{{$gallery->imgPath}}" alt="" style="height:200px;">
                </a>
            </div>
            @endforeach
        @endif
    </div> --}}


    <div class="row d-flex justify-content-center">
        @if($galleryName)
            @foreach ($galleryName as $gallery)
                <div class="col-lg-4 col-md-4">
                    {{-- <a href="{{asset('public/uploads/images/about/'.$gallery->imgPath)}}" class="single-gallery">
                        <img class="img-fluid" src="{{asset('public/uploads/images/about/'.$gallery->imgPath)}}" alt="" style="height:200px;">
                    </a> --}}
                    <div onClick="openPhotoModal({{ $gallery->id }})">
                        <img class="img-fluid" src="{{asset('public/uploads/images/about/'.$gallery->imgPath)}}" alt="" style="object-fit: cover;" >
                    </div>
                    <p class="max-lines">
                        {{$gallery->description}}
                    </p>
                </div>
            @endforeach
        @endif
    </div>

    
</div>



{{-- Edit Modal --}}
<div id="galleryModal" class="modal fade" style="margin-top:3%">
<div class="modal-dialog modal-lg">
<div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title" style="padding:10px" id="galleryModalTitle"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <div class="panel panel-default">    
    <div class="panel-body">
        <img class="img-fluid" id="galleryModalImg" style="padding:2em; width: 100%; height: 350px; object-fit: cover;" >
        <p id="galleryModalDesc" class="text-justify" style="padding:2em"></p>
    </div>
    </div>

</div>
</div>
</div>
{{-- End Modal --}}



<style>

    .max-lines {
        display: block;/* or inline-block */
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 3.6em;
        line-height: 1.8em;
    }

</style>



<script>

    function openPhotoModal(id){
        $("#galleryModal").modal('show');
        var token = "{{csrf_token()}}";
        $.ajax({
            type: 'post',
            url: './getPhotoInfo',
            data: {id : id, _token :token},
            dataType: 'json',
            success: function(data){
                $("#galleryModalTitle").text(data.title);               
                $("#galleryModalDesc").text(data.description);     
                var src = "public/uploads/images/about/".concat(data.imgPath);
                $("#galleryModalImg").attr('src', src);
            }
        });
    }

</script>