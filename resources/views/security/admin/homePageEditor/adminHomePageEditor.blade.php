@extends("layouts.admin")
@section('main-page')
<div class="subHeader">
  <h1 style="color:#3c7376;font-family: 'Monoton', cursive;">EDIT  HOMEPAGE</h1>
</div>
<div class="panel panel-info ">
  <div class="panel-body">
    <form  enctype="multipart/form-data" name="sliderForm" id="sliderForm" style="width:20%;background:#f5edcf;margin-top:2%;">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="form-group" style="padding-left:5px;" >
        <label>Select image to upload:<label>
        </div>
        <div class="form-group" style="padding-left:5px;">
          <input type="file"   name="image_file" required id="fileToUpload"  accept="image/jpg, image/jpeg">
        </div>
        <div class="form-group" >
          <label style="padding-left:5px;">Slide Name:<label>
            <input type="text" class="form-control" name="slideName" style="margin-left:4px;" >
          </div>
          <div class="form-group" style="padding:5px;">
            <button type="submit" class="btn btn-default">Upload</button>
          </div>
        </form>

        <div class="row" style="">
          @foreach($sliders as $slider)
          <div class="col-sm-4 col-md-2" style="padding-top:10px;background:#6fa1ff69;">
            <div class="thumbnail">
              <img src="{{asset('public/uploads/images/sliders/')}}/{{$slider->imgPath}}" alt="5Terre" >
              <div class="caption">
                <h3>{{$slider->sliderName}}</h3>

                <p><a href="#" class="btn btn-primary" role="button"  onclick="delFunction({{$slider->id}});">Delete</a>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>

      @if($data)
      <div class="panel panel-info " style="background-color:white;">
        <div class="panel-body">
          <form class="form-horizontal" id="homeForm" style="padding-left:20px;">
            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Edit Slider Heading Text</h4>
              <textarea rows="10" cols="100" name ="title" data-provide="markdown">{{$data->title}}</textarea>
            </div>

            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Edit Slider Text</h4>
              <textarea rows="10" cols="100" name ="paragraph" data-provide="markdown">{{$data->paragraph}}</textarea>
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
          <form class="form-horizontal" id="homeForm" style="padding-left:20px;">
            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Edit Slider Heading Text</h4>
              <textarea rows="10" cols="100" name ="title" data-provide="markdown"></textarea>
            </div>

            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Edit Slider Text</h4>
              <textarea rows="10" cols="100" name ="paragraph" data-provide="markdown"></textarea>
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
              <h2>Are You Confirm to Delete This Slide?</h2>

              <div class="modal-footer">
                <form id ="deleteForm">
                  <input type="hidden" name="deleteSlide" id="deleteSlideId">
                  <button id="DMconfirmButton"  class="btn btn-danger" type="submit" > <span>Confirm</span></button>
                  <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal" type="button"> Close</button>
                </form>

              </div>

            </div>
          </div>
        </div>
      </div>
      {{-- End Delete Modal --}}



      <section>
        @if($galleryName)
        <div class="panel panel-info " style="background-color:white;">
          <div class="panel-body">
            <form class="form-horizontal" id="galleryEntryId" name="galleryEntryName" style="padding-left:20px;">
              <div class="form-group" style="padding-right:2%;">
                <h4 style="color:#ff6c5f;padding-left:1%;">Galley Title</h4>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="galleryName" required id="galleryId"  value="{{$galleryName->title}} ">
                </div>
              </div>

              <div class="form-group" style="padding-right:2%;">
                <h4 style="color:#ff6c5f;padding-left:1%;">Gallery Tagline</h4>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="galleyTagName" required id="galleryTagId" value="{{$galleryName->description}} ">
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
            <form class="form-horizontal" id="galleryEntryId" name="galleryEntryName" style="padding-left:20px;">
              <div class="form-group" style="padding-right:2%;">
                <h4 style="color:#ff6c5f;padding-left:1%;">Gallery Title</h4>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="galleryName" id="galleryId" value="" >
                </div>
              </div>

              <div class="form-group" style="padding-right:2%;">
                <h4 style="color:#ff6c5f;padding-left:1%;">Gallery Tagline</h4>
                <div class="col-md-6">
                  <input type="text" class="form-control" name="galleyTagName" id="galleryTagId" value="" >
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
      </section>



      <section>
        <div class="panel panel-info sectionsPost">
          <div class="panel-body">
            <h4>photo Gallery</h4>
            <form id="photoGallery"  style="background:white;margin-top:2%;">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="row">
               <div class="form-group"  >
                 <div class="col-md-3">
                   <label>Select image to upload:<label><br>
                    <input type="file" name="galleryImage" id="galleryImageId" required accept="image/jpg, image/jpeg">
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

            {{-- Printing PhotoGallery --}}

            <div class="row">
              @if($photoGalleries)
              @foreach($photoGalleries as $photoGallery)
              <div class="col-sm-6 col-md-2">
               <div class="thumbnail">
                 <img src="{{asset('public/uploads/images/photoGallery/')}}/{{$photoGallery->imgPath}}" alt="5Terre" >
                 <div class="caption">
                   <h3> </h3>
                   <p></p>
                   <a href="#" class="btn btn-danger" role="button"  onclick="delFunctionPhotoGallery({{$photoGallery->id}});">Delete</a></p>
                 </div>
               </div>
             </div>
             @endforeach
             @endif

           </div>

         </div>
       </div>
     </section>

     <section>
      @if($factsArea)
      <div class="panel panel-info " style="background-color:white;">
        <div class="panel-body">
          <h3>Facts-Area</h3>
          <form class="form-horizontal" id="factsAreaForm" style="padding-left:20px;">
            {{csrf_field()}}
            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">First Column Name</h4>
              <input type="text" class="form-control" name="firstColName" required id="firstColId" value="{{$factsArea->firstColName}}" >
            </div>

            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">First Column Content</h4>
              <input type="text" class="form-control" name="firstColContentName" required id="firstColContentId" value="{{$factsArea->firstColContent}}" >
            </div>
            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Second Column Name</h4>
              <input type="text" class="form-control" name="secondColName" required id="secondColId" value="{{$factsArea->secondColName}}" >
            </div>
            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Second Column Content</h4>
              <input type="text" class="form-control" name="secondColContentName" required id="secondColContentId" value="{{$factsArea->secondColContent}}" >
            </div>
            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Third Column Name</h4>
              <input type="text" class="form-control" name="thirdColName" required id="thirdColId" value="{{$factsArea->thirdColName}}" >
            </div>
            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Third Column Content</h4>
              <input type="text" class="form-control" name="thirdColContentName" required id="thirdColContentId" value="{{$factsArea->thirdColContent}}" >
            </div>
            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Fourth Column Name</h4>
              <input type="text" class="form-control" name="fourthColName" required id="fourthColId" value="{{$factsArea->fourthColName}}" >
            </div>
            <div class="form-group" style="padding-top:2%;">
              <h4 style="color:#ff6c5f;">Fourth Column Content</h4>
              <input type="text" class="form-control" name="fourthColContentName" required id="fourthColContentId" value="{{$factsArea->fourthColContent}}" >
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
         <h3>Facts-Area</h3>
         <form class="form-horizontal" id="factsAreaForm" style="padding-left:20px;">
           <div class="form-group" style="padding-top:2%;">
             <h4 style="color:#ff6c5f;">First Column Name</h4>
             <input type="text" class="form-control" name="firstColName" required id="firstColId" value="" >
           </div>

           <div class="form-group" style="padding-top:2%;">
             <h4 style="color:#ff6c5f;">First Column Content</h4>
             <input type="text" class="form-control" name="firstColContentName" required id="firstColContentId" value="" >
           </div>
           <div class="form-group" style="padding-top:2%;">
             <h4 style="color:#ff6c5f;">Second Column Name</h4>
             <input type="text" class="form-control" name="secondColName" required id="secondColId" value="" >
           </div>
           <div class="form-group" style="padding-top:2%;">
             <h4 style="color:#ff6c5f;">Second Column Content</h4>
             <input type="text" class="form-control" name="secondColContentName" required id="secondColContentId" value="" >
           </div>
           <div class="form-group" style="padding-top:2%;">
             <h4 style="color:#ff6c5f;">Third Column Name</h4>
             <input type="text" class="form-control" name="thirdColName" required id="thirdColId" value="" >

           </div>
           <div class="form-group" style="padding-top:2%;">
             <h4 style="color:#ff6c5f;">Third Column Content</h4>
             <input type="text" class="form-control" name="thirdColContentName" required id="thirdColContentId" value="" >

           </div>
           <div class="form-group" style="padding-top:2%;">
             <h4 style="color:#ff6c5f;">Fourth Column Name</h4>
             <input type="text" class="form-control" name="fourthColName" required id="fourthColId" value="" >
           </div>
           <div class="form-group" style="padding-top:2%;">
             <h4 style="color:#ff6c5f;">Fourth Column Content</h4>
             <input type="text" class="form-control" name="fourthColContentName" required id="fourthColContentId" value="" >
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
   </section>



   {{-- Delete Modal Section One --}}
   <div id="deleteModalPhotoGallery" class="modal fade" style="margin-top:3%">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Delete!</h4>
        </div>
        <div class="modal-body">
          <h2>Are You Confirm to Delete This Post?</h2>
          <div class="modal-footer">
            <form id ="deleteForm">
              <input type="hidden" name="deleteContentPhotoGallery" id="deleteContentPhotoGalleryId">
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


      $("#sliderForm").submit(function(event) {
        event.preventDefault();
        var form     = document.forms.namedItem("sliderForm");
        var formData = new FormData(form);

        // debugger;

        $.ajax({
          type: 'post',
          url: './addSliders',
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

      /*Submit the form*/
      $("#homeForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
          type: 'post',
          url: './addHomeContents',
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
      /*End Submit the form*/

      /*Submit delete*/
      $("#deleteModal").submit(function(event) {
        event.preventDefault();
        $.ajax({
          type: 'post',
          url: './deleteSlider',
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


      $("#photoGallery").submit(function(event) {
        event.preventDefault();
        var form     = document.forms.namedItem("photoGallery");
        var formData = new FormData(form);



        //console.log(formData);

        $.ajax({
          type: 'post',
          url: './photoGalleryOfHomepage',
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




      /*Submit delete Section One*/
      $("#deleteModalPhotoGallery").submit(function(event) {
        event.preventDefault();
        $.ajax({
          type: 'post',
          url: './homepagePhotoGalleryDelete',
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




      /*Submit the sectionsName*/
      $("#galleryEntryId").submit(function(event) {
        event.preventDefault();
        var data  = $('form').serialize();
        $.ajax({
          type: 'post',
          url: './addGalleryNameAndTagLineHome',
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


      /*Submit the form*/
      $("#factsAreaForm").submit(function(event) {
        event.preventDefault();
        $.ajax({
          type: 'post',
          url: './addHomeContentsFactsArea',
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
      /*End Submit the form*/

    });


function delFunctionPhotoGallery(attri){
  $("#deleteModalPhotoGallery").modal('show');
  $("#deleteContentPhotoGalleryId").val(attri);
}
function delFunction(attri){
  $("#deleteModal").modal('show');
  $("#deleteSlideId").val(attri);
}
</script>

<style>
  .panel-info{
    margin-top:2%;
    background-color:#e6c4c430;
    box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
  }
</style>

@endsection
