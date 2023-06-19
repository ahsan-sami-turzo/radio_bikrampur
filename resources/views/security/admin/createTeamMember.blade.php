@extends("layouts.admin")
@section('main-page')

<div class="subHeader">
  <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">EDIT  TEAM</h1>
</div>


<div class="panel panel-info ">
  <div class="panel-body">
  
    <div class="row" style="">
     @if(sizeof($team) > 0)
        @foreach($team as $member)
            <div class="col-sm-4 col-md-2" style="padding-top:10px;background:#3a768685;">
                <div class="thumbnail">
                    <img src="{{asset('public/uploads/images/team/')}}/{{$member->imgPath}}" alt="{{ $member->name }}" />
                    <div class="caption">
                        <h3>{{ ucfirst($member->name) }}</h3>
                        <h4>{{ $member->designation }}</h4>
                        <hr>
                        <a href="{{ url('/admin/deleteRJ', ['id' => $member ->id]) }}">
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </a>
                        <a href="#" onClick="editMember({{ $member->id }})">
                            <button class="btn btn-sm btn-default">Edit</button>
                        </a>
                    </div>
                </div>
            </div>
            
        @endforeach
     @endif

   </div>

 </div>
</div>





<div class="panel panel-info sectionsPost">
<div class="panel-body">

<h4>Add Team Member</h4>

<form id="firstSectionContents" enctype="multipart/form-data" name="formfirst"  style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveRJ') }}">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="designation" id="designation">

    <div class="row">
    <div class="form-group" >
        <div class="col-md-6">
            <label>Name</label>
            <input type="text" class="form-control" id="firstSectionTitleContent" name="Name" required />
        </div>
    </div>
    </div>


    <div class="row">
    <div class="form-group" >
        <div class="col-md-6">
            <label>Designation</label>
            <select class="form-control" id="selectDesignation" required>
                <option value=""> -- Select -- </option>                        
                <option value="RJ">RJ</option> 
                <option value="Outdoor Broadcaster">Outdoor Broadcaster</option> 
                <option value="News Reporter">News Reporter</option> 
                <option value="Sales & Marketing">Sales & Marketing</option> 
            </select>
        </div>
    </div>
    </div>



    <div class="row">
    <div class="form-group" >
        <div class="col-md-6">
            <label>Facebook</label>
            <input type="text" class="form-control" name="Facebook" />
        </div>
    </div>
    </div>

    <div class="row">
    <div class="form-group" >
        <div class="col-md-6">
            <label>Instagram</label>
            <input type="text" class="form-control" name="Instagram" />
        </div>
    </div>
    </div>

    <div class="row">
    <div class="form-group" >
        <div class="col-md-6">
            <label>Twitter</label>
            <input type="text" class="form-control" name="Twitter" />
        </div>
    </div>
    </div>

    <div class="row">
    <div class="form-group" >
        <div class="col-md-6">
            <label>Others</label>
            <input type="text" class="form-control" name="Others" />
        </div>
    </div>
    </div>

    <div class="row">
    <div class="form-group"  >
        <div class="col-md-3">
            <label>Photo</label>
            <input type="file" id="img" name="firstSectionImage"  required>
        </div>
    </div>
    </div>

    <div class="row" style="padding-bottom:1%;">
    <div class="form-group" >
        <div class="col-md-3">
            <button type="submit" class="btn btn-sm btn-default">Save</button>
        </div>
    </div>
    </div>
</form>

</div>
</div>




{{-- Edit Modal --}}
<div id="editMemberModal" class="modal fade" style="margin-top:3%">
<div class="modal-dialog modal-lg">
<div class="modal-content">

    <div class="modal-header">
        <h4 class="modal-title" style="padding:10px">Edit Member</h4>
    </div>

    <div class="panel panel-default">    
    <div class="panel-body">
        <form id="firstSectionContents" enctype="multipart/form-data" name="formfirst"  style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveRJ') }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <input type="hidden" id="rjId" name="id">
            <input type="hidden" name="designation" id="modaldesignation">

            <div class="row">
            <div class="form-group" >
                <div class="col-md-6">
                    <label>Name</label>
                    <input type="text" class="form-control" id="editMemberName" name="Name" required />
                </div>
            </div>
            </div>

            <div class="row">
            <div class="form-group" >
                <div class="col-md-6">
                    <label>Designation</label>
                    <select class="form-control" id="modaleditDesignation" required>
                        <option value=""> -- Select -- </option>                        
                        <option value="RJ">RJ</option> 
                        <option value="Outdoor Broadcaster">Outdoor Broadcaster</option> 
                        <option value="News Reporter">News Reporter</option> 
                        <option value="Sales & Marketing">Sales & Marketing</option> 
                    </select>
                </div>
            </div>
            </div>

            <div class="row">
            <div class="form-group" >
                <div class="col-md-6">
                    <label>Facebook</label>
                    <input type="text" class="form-control" id="editMemberFacebook" name="Facebook" />
                </div>
            </div>
            </div>

            <div class="row">
            <div class="form-group" >
                <div class="col-md-6">
                    <label>Instagram</label>
                    <input type="text" class="form-control" id="editMemberInstagram" name="Instagram" />
                </div>
            </div>
            </div>

            <div class="row">
            <div class="form-group" >
                <div class="col-md-6">
                    <label>Twitter</label>
                    <input type="text" class="form-control" id="editMemberTwitter" name="Twitter" />
                </div>
            </div>
            </div>

            <div class="row">
            <div class="form-group" >
                <div class="col-md-6">
                    <label>Others</label>
                    <input type="text" class="form-control" id="editMemberOthers" name="Others" />
                </div>
            </div>
            </div>

            <div class="row">
            <div class="form-group"  >
                <div class="col-md-3">
                    <label>Photo</label>
                    <input type="file" id="img" name="firstSectionImage">
                </div>
            </div>
            </div>

            <div class="row" style="padding-bottom:1%;">
            <div class="form-group" >
                <div class="col-md-3">
                    <button type="submit" class="btn btn-sm btn-default">Save</button>
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



<style>
    .panel-info{
        margin-top: 5em;
        background-color:#e6c4c430;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }
    .sectionsPost{
        margin-top: 2%;
        background-color:#38a56830;
        box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
    }

    img {
        width: 150px !important;
        height: 150px !important;
        object-fit: cover;
    }
</style>


<script>

    function editMember(id){        
        $("#editMemberModal").modal('show');
        var token = "{{csrf_token()}}";
        $.ajax({
            type: 'post',
            url: './editRJDetails',
            data: {id : id, _token :token},
            dataType: 'json',
            success: function(data){
                $("#rjId").val(data.id);
                $("#modaleditDesignation").val(data.designation);
                $("#editMemberName").val(data.name);
                $("#editMemberFacebook").val(data.facebook);
                $("#editMemberTwitter").val(data.twitter);
                $("#editMemberInstagram").val(data.instagram);
                $("#editMemberOthers").val(data.others);
            },
            error: function( data ){
                alert(data);
            }
        });
    }

    $(document).on('change','#selectDesignation',function(event){         
        event.preventDefault();
        var designation = $(this).val();  
        $('#designation').val(designation);
        console.log($('#designation').val());
    });

    $(document).on('change','#modaleditDesignation',function(event){         
        event.preventDefault();
        var modaldesignation = $(this).val();  
        $('#modaldesignation').val(modaldesignation);
    });

</script>

@endsection
