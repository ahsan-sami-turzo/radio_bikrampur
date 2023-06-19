@extends("layouts.admin")
@section('main-page')
    
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">  
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<div class="subHeader">
<h1 style="color:#3c7376;font-family: 'Monoton', cursive;">Uploaded Videos</h1>
</div>


<div class="panel panel-info sectionsPost">
<div class="panel-body">
    <h4>Videos</h4>

    <div style="background:white;margin-top:2%;">
        <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" scope="col"></th>
                <th class="text-center" scope="col">Title</th>
                <th class="text-center" scope="col">Url</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($videos as $video)     
                <tr>
                    <td class="text-center"> <a href="{{ url('/admin/deleteVideo', ['id' => $video->id]) }}"> <i class="fa fa-ban text-danger"></i> </a> </td>
                    <td class="text-left">{{ $video->title }}</td>       
                    <td class="text-left">{{ $video->url }}</td>                      
                </tr>
            @endforeach                
        </tbody>
        </table>
    </div>
</div>
</div>



<div class="panel panel-info sectionsPost">
    <div class="panel-body">
        <h4>Add Video</h4>
        <form id="firstSectionContents"  style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveVideo') }}">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Video title</label>
                        <input type="text" class="form-control" name="title" placeholder="Radio Bikrampur 99.2 FM's 7th anniversary" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Video URL</label>
                        <input type="text" class="form-control" name="url" placeholder="https://www.youtube.com/watch?v=x6iTHs6dFns" required>
                    </div>
                </div>
            </div>

           
        
            <div class="row" style="padding-bottom:1%;">
                <div class="form-group" >
                <div class="col-md-3">
                    <button type="submit" class="btn btn-default">SAVE</button>
                </div>
                </div>
            </div>
        </form>


    </div>
</div>






<script>
$( document ).ready(function() {
    
});
</script>

<style>
.panel-info{
  margin-top:2%;
  background-color:#e6c4c430;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
.sectionsPost{
  margin-top:2%;
  background-color:#38a56830;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

</style>

@endsection
