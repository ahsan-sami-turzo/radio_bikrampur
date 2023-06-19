@extends('layouts.admin')
@section('main-page')
    <div class="panel panel-info " style="background-color:white;">
        <div class="panel-body">
            <form class="form-horizontal" id="userNameId" name="userName" style="padding-left:20px;">
                <div class="form-group" style="padding-right:2%;">
                    <h4 style="color:#ff6c5f;padding-left:1%;">Change User Name</h4>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="UserName" required id="UserNameId" value="{{Auth::user()->name}}" >
                    </div>
                    {{csrf_field()}}
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-default">SAVE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>




    <div class="panel panel-info " style="background-color:white;">
        <div class="panel-body">
            <form class="form-horizontal" id="passwordEntryId" name="passwordEntry" style="padding-left:20px;">

                <div class="form-group" style="padding-right:2%;">
                    <h4 style="color:#ff6c5f;padding-left:1%;">Current Password</h4>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="currentPassword" required id="currentPasswordId" >
                    </div>
                </div>

                <div class="form-group" style="padding-right:2%;">
                    <h4 style="color:#ff6c5f;padding-left:1%;">Reset Password</h4>
                    <div class="col-md-6">
                        <input type="password" class="form-control" name="resetPassword" required id="resetPasswordId">
                    </div>
                </div>
                {{csrf_field()}}

                <div class="form-group">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-default">SAVE</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script>
    $( document ).ready(function() {
        /*Submit the sectionsName*/
        $("#userNameId").submit(function(event) {

            event.preventDefault();
            var data  = $('form').serialize();
            $.ajax({
                type: 'post',
                url: './adminSettingsUserNameChange',
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


                }
            });
        });
        /*End Submit the form*/


        /*Submit the sectionsName*/
        $("#passwordEntryId").submit(function(event) {

            event.preventDefault();
            var data  = $('form').serialize();
            $.ajax({
                type: 'post',
                url: './adminSettingsUserPasswordChange',
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
                    toastr.error("Your Current Password Is Not Correct");
                }
            });
        });
        /*End Submit the form*/
    });



</script>

@endsection
