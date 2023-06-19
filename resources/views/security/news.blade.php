@if($news)
<div class="col-md-12 container" style="padding: 0 3em">

    <div class="row d-flex justify-content-center">
        <div class="menu-content pb-20 col-lg-8">,
            <div class="title text-center">
                <h1 class="mb-10">News</h1>
            </div>
        </div>
    </div>


    <div class="row d-flex justify-content-center">
            @foreach ($news as $item)
                <div class="col-lg-4 col-md-4" onClick="openNewsModal({{ $item->id }})" style="cursor: pointer;">                    
                    <small style="padding-left:5px;">{{ date('d-M-y', strtotime($item->createdAt)) }}</small>
                    <h4 style="padding:0 5px 5px; height: 7vh; text-align: justify">{{$item->title}}</h4>
                    <div style="padding:5px">
                        <img class="img-fluid" src="{{asset('public/uploads/images/about/'.$item->imgPath)}}" alt="" style="width: 100%; height: 200px; object-fit: cover;" >
                    </div>

                    <p style="padding:5px" class="news-lines text-justify" class="newsdesc">
                        {{$item->description}}
                    </p>
                </div>
            @endforeach
    </div>

    
</div>
@endif



{{-- Edit Modal --}}
<div id="newsModal" class="modal fade" style="margin-top:3%">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" style="padding:10px" id="newsModalTitle"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="panel panel-default">    
            <div class="panel-body">
                <img class="img-fluid" id="newsModalImg" style="padding:2em; width: 100%; height: 300px; object-fit: contain;" >
                <p id="newsModalDesc" class="text-justify" style="padding:2em; font-size: larger"></p>
            </div>
            </div>

        </div>
    </div>
</div>
{{-- End Modal --}}



<style>

    .news-lines {
        display: block;/* or inline-block */
        text-overflow: ellipsis;
        word-wrap: break-word;
        overflow: hidden;
        max-height: 20em;
        line-height: 1.5em;
    }

</style>



<script>

    $( document ).ready(function() {
		var text = $('.newsdesc').text();
        if (text.length > 510) {
            text = text.substr(0,510) + '... (click to view details)';
        }
        $('.newsdesc').text(text); 
	});

    function openNewsModal(id){
        $("#newsModal").modal('show');
        var token = "{{csrf_token()}}";
        $.ajax({
            type: 'post',
            url: './getNewsDetails',
            data: {id : id, _token :token},
            dataType: 'json',
            success: function(data){
                $("#newsModalTitle").text(data.title);               
                $("#newsModalDesc").text(data.description);     
                var src = "public/uploads/images/about/".concat(data.imgPath);
                $("#newsModalImg").attr('src', src);
            }
        });
    }

</script>