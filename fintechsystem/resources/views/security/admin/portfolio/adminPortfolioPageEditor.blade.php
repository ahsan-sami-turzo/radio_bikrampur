@extends("layouts.admin")
@section('main-page')
  <div class="subHeader">
    <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">EDIT  Portfolio</h1>
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
              <input type="file"   name="image_file" id="fileToUpload">
            </div>


            <div class="form-group" style="padding:5px;">
              <button type="submit" class="btn btn-default">Upload</button>
            </div>
         </form>

          <div class="row" style="">
             @if($portfolioBackGrounds)
               @foreach($portfolioBackGrounds as $portfolioBackGround)
                <div class="col-sm-4 col-md-2" style="padding-top:10px;background:#3a768685;">
                    <div class="thumbnail">
                          <img src="{{asset('public/uploads/images/backgroundImages/')}}/{{$portfolioBackGround->backGroundImagePath}}" alt="5Terre" >
                        <div class="caption">
                          <h3></h3>
                          <p><a href="#" class="btn btn-danger" role="button"  onclick="delFunction({{$portfolioBackGround->id}});">Delete</a>
                       </div>
                  </div>
                </div>
                @endforeach
            @endif

         </div>

     </div>
  </div>
@if($sections)
  <div class="panel panel-info " style="background-color:white;">
    <div class="panel-body">
      <form class="form-horizontal" id="sectionEntryId" name="sectionEntry" style="padding-left:20px;">
        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">First Section Title</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="firstSection" required id="firstSectionId" value="{{$sections->title}}">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">First Section Tagline</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="firstSectionTag" required id="firstSectionTagId" value="{{$sections->description}}">
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
      <form class="form-horizontal" id="sectionEntryId" name="sectionEntry" style="padding-left:20px;">
        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">First Section Title</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="firstSection" required id="firstSectionId" value="">
          </div>
        </div>

        <div class="form-group" style="padding-right:2%;">
            <h4 style="color:#ff6c5f;padding-left:1%;">First Section Tagline</h4>
          <div class="col-md-6">
            <input type="text" class="form-control" name="firstSectionTag" required id="firstSectionTagId" value="">
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





  <div class="panel panel-info sectionsPost">
      <div class="panel-body">
          <h4>Add Testimonials</h4>
          <form id="firstSectionContents"  style="background:white;margin-top:2%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">

             <div class="row">
                <div class="form-group" >
                  <div class="col-md-6">
                    <label> Client's Name</label>
                    <input type="text" class="form-control" name="firstSectionTitleContent" required>
                  </div>
                </div>
            </div>

            <div class="row">
               <div class="form-group" >
                 <div class="col-md-6">
                   <label>Comment Quote</label>
                   <textarea class="form-control" rows="10" name="firstSectionDescriptionContent" required></textarea>
                 </div>
               </div>
           </div>

           <div class="row">
             <div class="form-group"  >
               <div class="col-md-3">
                 <label>Select image to upload:<label><br>
                <input type="file" name="firstSectionImage"  required id="firstSectionImageId">
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

         <div class="row">
          @if($firstSectionContents)
          @foreach($firstSectionContents as $firstSectionContent)
           <div class="col-sm-6 col-md-2">
             <div class="thumbnail">
                 <img src="{{asset('public/uploads/images/portfolio/')}}/{{$firstSectionContent->imgPath}}" alt="5Terre" >
               <div class="caption">
                 <h3>{{$firstSectionContent->title}} </h3>
                 <p>{{$firstSectionContent->description}}</p>
                 <p><a href="#" class="btn btn-primary" role="button"  onclick="editFunctionSectionOne({{$firstSectionContent->id}});">Edit</a>
                 <a href="#" class="btn btn-danger" role="button"  onclick="delFunctionSectionOne({{$firstSectionContent->id}});">Delete</a></p>
               </div>
             </div>
           </div>
          @endforeach
          @endif
         </div>

     </div>
  </div>



  {{-- Edit Modal --}}
  <div id="editModalSectionOne" class="modal fade" style="margin-top:3%">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Edit Section One Contents</h4>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">Edit Contents</div>
                  <div class="panel-body">
                    <form id="editSectionOneContents"  style="background:white;margin-top:2%;">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="hiddenSectionOneContentEdit"  id="hiddenSectionOneContentIdEdit">

                       <div class="row">
                          <div class="form-group" >
                            <div class="col-md-6">
                              <label> Title</label>
                              <input type="text" class="form-control" name="editSectionOneContentTitle" required id="editSectionOneContentTitleId">
                            </div>
                          </div>
                      </div>

                      <div class="row">
                         <div class="form-group" >
                           <div class="col-md-6">
                             <label> Content</label>
                             <textarea class="form-control" rows="10" name="editSectionOneContentDescription" required id="editSectionOneContentDescriptionId"></textarea>
                           </div>
                         </div>
                     </div>

                     <div class="row">
                       <div class="form-group"  >
                         <div class="col-md-3">
                           <label>Select image to upload:<label><br>
                          <input type="file" name="editSectionOneContentImage"  id="editSectionOneContentImageId">
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





  {{-- Delete Modal Section One --}}
  <div id="deleteModalSectionOne" class="modal fade" style="margin-top:3%">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Delete!</h4>
        </div>
        <div class="modal-body">
          <h2>Are You Confirm to Delete This Post?</h2>
          <div class="modal-footer">
            <form id ="deleteForm">
              <input type="hidden" name="deleteContentSectionOne" id="deleteContentSectionOneId">
              <button id="DMconfirmButton"  class="btn btn-danger" type="submit" > <span>Confirm</span></button>
              <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal" type="button"> Close</button>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
  {{-- End Delete Modal Section one --}}

<script>
$( document ).ready(function() {
  $("#backGroundForm").submit(function(event) {
    event.preventDefault();
    var form     = document.forms.namedItem("backGroundForm");
    var formData = new FormData(form);
    $.ajax({
      type: 'post',
      url: './addBackGroundPortfolio',
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

  /*Submit the sectionsName*/
  $("#sectionEntryId").submit(function(event) {
    event.preventDefault();
    var data  = $('form').serialize();
    $.ajax({
      type: 'post',
      url: './addSectionTitleAndContentPortfolio',
      data:data,
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
  /*End Submit the form*/


  $("#firstSectionContents").submit(function(event) {
    event.preventDefault();
    var form     = document.forms.namedItem("firstSectionContents");
    var formData = new FormData(form);

    $.ajax({
      type: 'post',
      url: './firstSectionContentsOfPortfolio',
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
  $("#editSectionOneContents").submit(function(event) {
    event.preventDefault();
    var form     = document.forms.namedItem("editSectionOneContents");
    var formData = new FormData(form);
    $.ajax({
      type: 'post',
      url: './editFirstSectionContentsOfPortfolio',
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
      url: './deleteBackgroundImagePortfolio',
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
      url: './portfolioDeletePostSectionOne',
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
    url: './portfolioSectionOneContentsEditView',
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
