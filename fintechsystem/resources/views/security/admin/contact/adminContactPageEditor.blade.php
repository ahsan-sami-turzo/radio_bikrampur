@extends("layouts.admin")
@section('main-page')
  <div class="subHeader">
    <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">EDIT  CONTACT</h1>
  </div>
  <div class="panel panel-info ">
      <div class="panel-body">
          <h4>Background Image</h4>
          <form  enctype="multipart/form-data" name="backGroundForm" id="backGroundForm" style="width:20%;background:white;margin-top:2%;">
            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <div class="form-group" style="padding-left:5px;" >
               <label>Select image to upload:<label>
            </div>

            <div class="form-group" style="padding-left:5px;">
              <input type="file"   name="image_file" required id="fileToUpload">
            </div>


            <div class="form-group" style="padding:5px;">
              <button type="submit" class="btn btn-default">Upload</button>
            </div>
         </form>

         <div class="row" style="">
           @if($contactBackGrounds)
               @foreach($contactBackGrounds as $contactBackGround)
               <div class="col-sm-4 col-md-2" style="padding-top:10px;background:#3a768685;">
                 <div class="thumbnail">
                   <img src="{{asset('public/uploads/images/backgroundImages/')}}/{{$contactBackGround->backGroundImagePath}}" alt="5Terre" >
                   <div class="caption">
                     <h3></h3>
                     <p><a href="#" class="btn btn-danger" role="button"  onclick="delFunction({{$contactBackGround->id}});">Delete</a>
                     </div>
                   </div>
                 </div>
                 @endforeach
             @endif

           </div>

     </div>
  </div>

  @if($contactInfos)
  <div class="panel panel-info " style="background-color:white;">
    <div class="panel-body">
      <form class="form-horizontal" id="contactInfosId" name="contactInfos" style="padding-left:20px;">
        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Name Of The Country</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="countryName" id="countryId" value="{{$contactInfos->country}}">
          </div>
        </div>
        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Name Of The City</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="cityName" id="cityId" value="{{$contactInfos->city}}">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Your Address</h4>
          <div class="col-md-6">
            <textarea rows="5" class="form-control" name="addressName" id="addressId" >{{$contactInfos->address}}</textarea>
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Phone No</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="phoneNo" id="phoneNoId" value="{{$contactInfos->ph}}">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Office Hour</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="officeHour" id="officeHourId" value="{{$contactInfos->timing}}">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Email</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="emailName" id="emailId" value="{{$contactInfos->mail}}">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Email Tagline</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="tagline" id="taglineId" value="{{$contactInfos->mailTag}}">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-default">SAVE</button>
          </div>
        </div>
      </form>

    </div>
  </div>
  @else
  <div class="panel panel-info " style="background-color:white;">
    <div class="panel-body">
      <form class="form-horizontal" id="contactInfosId" name="contactInfos" style="padding-left:20px;">
        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Name Of The Country</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="countryName" id="countryId" value="">
          </div>
        </div>
        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Name Of The City</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="cityName" id="cityId" value="">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Your Address</h4>
          <div class="col-md-6">
            <textarea rows="5" class="form-control" name="addressName" id="addressId" value=""></textarea>
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Phone No</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="phoneNo" id="phoneNoId" value="">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Office Hour</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="officeHour" id="officeHourId" value="">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Email</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="emailName" id="emailId" value="">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">Email Tagline</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="tagline" id="taglineId" value="">
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-default">SAVE</button>
          </div>
        </div>
      </form>

    </div>
  </div>
  @endif








  {{-- Delete Modal --}}
  <div id="deleteModal" class="modal fade" style="margin-top:3%">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Delete!</h4>
        </div>
        <div class="modal-body">
          <h2>Are You Confirm to Delete This BackGround Image?</h2>

          <div class="modal-footer">
            <form id ="deleteForm">
              <input type="hidden" name="deleteBackGround" id="deleteBackGroundId">
              <button id="DMconfirmButton"  class="btn btn-danger" type="submit" > <span>Confirm</span></button>
              <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal" type="button"> Close</button>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
  {{-- End Delete Modal --}}




<script>
$( document ).ready(function() {
  $("#backGroundForm").submit(function(event) {
    event.preventDefault();
    var form     = document.forms.namedItem("backGroundForm");
    var formData = new FormData(form);
    $.ajax({
      type: 'post',
      url: './addBackGroundContact',
      data: formData,
      enctype: 'multipart/form-data',
      contentType: false,
      cache: false,
      processData:false,
      dataType: 'json',
      success: function( _response ){
        toastr.success("success");
        setTimeout(function(){
          location.reload();
        }, 1500);

      },
      error: function( data ){
        // Handle error
        //alert(data);
        console.log(data);


      }
    });
  });



  $("#firstSectionContents").submit(function(event) {
    event.preventDefault();
    var form     = document.forms.namedItem("firstSectionContents");
    var formData = new FormData(form);

    $.ajax({
      type: 'post',
      url: './firstSectionContentsOfAbout',
      data: formData,
      enctype: 'multipart/form-data',
      contentType: false,
      cache: false,
      processData:false,
      dataType: 'json',
      success: function( _response ){
        toastr.success("success");
        setTimeout(function(){
          location.reload();
        }, 1500);

      },
      error: function( data ){
        // Handle error
        //alert(data);
        console.log(data);


      }
    });
  });





  $("#contactInfosId").submit(function(event) {
    event.preventDefault();
    var formData = $('form').serialize();

    $.ajax({
      type: 'post',
      url: './addContactInfos',
      data: formData,
      dataType: 'json',
      success: function( _response ){
        toastr.success("success");
        setTimeout(function(){
          location.reload();
        }, 1500);

      },
      error: function( data ){
        // Handle error
        //alert(data);
        console.log(data);


      }
    });
  });

  /*Edit Section Contents*/
  $("#editSectionOneContents").submit(function(event) {
    event.preventDefault();
    var form     = document.forms.namedItem("editSectionOneContents");
    var formData = new FormData(form);
    $.ajax({
      type: 'post',
      url: './editFirstSectionContentsOfAbout',
      data: formData,
      enctype: 'multipart/form-data',
      contentType: false,
      cache: false,
      processData:false,
      dataType: 'json',
      success: function( _response ){
        toastr.success("success");
        setTimeout(function(){
          location.reload();
        }, 1500);

      },
      error: function( data ){
        // Handle error
        //alert(data);
        console.log(data);


      }
    });
  });

/*Edit Section Contents*/




  /*Submit delete*/
  $("#deleteModal").submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: 'post',
      url: './deleteBackgroundImageAbout',
      data: $('form').serialize(),
      dataType: 'json',
      success: function( _response ){
        toastr.success("success");
        setTimeout(function(){
          location.reload();
        }, 1500);
      },
      error: function( data ){
        // Handle error
        //alert(data);
        console.log(data);

      }
    });
  });
  /*End Submit delete*/




  /*Submit delete Section One*/
  $("#deleteModalSectionOne").submit(function(event) {
    event.preventDefault();
    $.ajax({
      type: 'post',
      url: './aboutDeletePostSectionOne',
      data: $('form').serialize(),
      dataType: 'json',
      success: function( _response ){
        toastr.success("success");
        setTimeout(function(){
          location.reload();
        }, 1500);
      },
      error: function( data ){
        // Handle error
        //alert(data);
        console.log(data);

      }
    });
  });
  /*End Submit delete Section ONe*/






});
function delFunction(attri){
  $("#deleteModal").modal('show');
  $("#deleteBackGroundId").val(attri);
}

function editFunctionSectionOne(attri){
  $("#editModalSectionOne").modal('show');
  $("#hiddenSectionOneContentIdEdit").val(attri);
  var token = "{{csrf_token()}}";
  $.ajax({
    type: 'post',
    url: './aboutSectionOneContentsEditView',
    data: {attri : attri, _token :token},
    dataType: 'json',
    success: function(data){
     $("#editSectionOneContentTitleId").val(data[0].title);
     $("#editSectionOneContentDescriptionId").val(data[0].description);
    },
    error: function( data ){
      // Handle error
      //alert(data);
    }
  });
}

function delFunctionSectionOne(attri){
  $("#deleteModalSectionOne").modal('show');
  $("#deleteContentSectionOneId").val(attri);
}

function delFunctionSectionTwo(attri){
  $("#deleteModalSectionTwo").modal('show');
  $("#deleteContentSectionTwoId").val(attri);
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
