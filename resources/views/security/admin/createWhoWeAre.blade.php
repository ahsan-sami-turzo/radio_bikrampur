@extends("layouts.admin")
@section('main-page')
    
<div class="subHeader">
    <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">Who We Are</h1>
</div>

@if($whoweare)
<div class="panel panel-info sectionsPost">
    <div class="panel-body">

        <div class="card">
            <div class="card-header">
                <strong>About Us</strong>
                <i class="fa fa-pencil-square-o" title="Edit" onClick="editaboutus({{ $whoweare->id }})"></i>
            </div>
            <div class="card-body" style="padding-top: .3em;">
                <p class="card-text text-justify" id="whoweareaboutus">{{ $whoweare->aboutus }}</p>
            </div>
        </div>

        <hr>

        <div class="card">
            <div class="card-header">
                <strong>History/Uniqueness</strong>
                <i class="fa fa-pencil-square-o" title="Edit" onClick="editaboutus({{ $whoweare->id }})"></i>
            </div>
            <div class="card-body" style="padding-top: .3em;">
                <p class="card-text text-justify" id="whowearehistory">{{ $whoweare->history }}</p>
            </div>
        </div>

        <hr>

        <div class="card">
            <div class="card-header">
                <strong>Coverage</strong>
                 <i class="fa fa-pencil-square-o" title="Edit" onClick="editaboutus({{ $whoweare->id }})"></i>
            </div>
            <div class="card-body" style="padding-top: .3em;">
                <p class="card-text text-justify" id="whowearecoverage">{{ $whoweare->coverage }}</p>
            </div>
        </div>  

        <hr>

        <button class="btn btn-sm btn-default" onClick="editaboutus({{ $whoweare->id }})">Edit</button>
        <a href="{{ url('/admin/deleteWhoWeAre', ['id' => $whoweare->id]) }}">
            <button class="btn btn-sm btn-danger">Delete</button>
        </a>
        
    </div>
</div>
@endif

<div class="panel panel-info sectionsPost">
    <div class="panel-body">

        <h4>Who We Are</h4>

        <form id="firstSectionContents"  style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveWhoWeAre') }}">

            <input type="hidden" name="_token" value="{{csrf_token()}}">


            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>About Us</label>
                        <textarea type="text" class="form-control" name="aboutus" rows="5" required></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>History</label>
                        <textarea type="text" class="form-control" name="history" rows="5" required></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Coverage</label>
                        <textarea type="text" class="form-control" name="coverage" rows="5" required></textarea>
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





{{-- Edit Modal --}}
<div id="editWhoWeAreModal" class="modal fade" style="margin-top:3%">
<div class="modal-dialog modal-lg">
<div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title" style="padding:10px">Edit Who We Are</h4>
    </div>

    <div class="panel panel-default">    
    <div class="panel-body">
        
        <form id="firstSectionContents"  style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveWhoWeAre') }}">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <input type="hidden" name="id" id="editid" value="{{csrf_token()}}">

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-12">
                        <label>About Us</label>
                        <textarea type="text" class="form-control" name="aboutus" id="editaboutus" rows="8" required></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-12">
                        <label>History</label>
                        <textarea type="text" class="form-control" name="history" id="edithistory" rows="8" required></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-12">
                        <label>Coverage</label>
                        <textarea type="text" class="form-control" name="coverage" id="ceditoverage" rows="8" required></textarea>
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

</div>
</div>
</div>
{{-- End edit Modal --}}





<script>

    function editaboutus(id){
        var aboutus = $("#whoweareaboutus").text();
        var history = $("#whowearehistory").text();
        var coverage = $("#whowearecoverage").text();
        $("#editWhoWeAreModal").modal('show');
        $("#editid").val(id);
        $("#editaboutus").val(aboutus);
        $("#edithistory").val(history);
        $("#ceditoverage").val(coverage);
    }

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
