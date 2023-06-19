@extends('layouts.admin')
@section('main-page')

    <table class="table table-bordered">
        <thead class="thead-dark" style="background:#0b0c1569;color:white;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Menu Name</th>
                <th scope="col">Route</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $count = 0; @endphp
            @foreach($menus as $menu)
                <tr>
                    <th scope="row">{{++$count}}</th>
                    <td>{{$menu->menuName}}</td>
                    <td>{{$menu->route}}</td>
                    <td>
                        @if(Auth::user()->email == "info@ambalait.com")
                            <a href="javascript:;" class="edit-modal" editId="{{$menu->id}}" name="{{$menu->menuName}}" route ="{{$menu->route}}">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="javascript:;" class="delete-modal" deleteId="{{$menu->id}}" >
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    @if(auth::user()->email == "info@ambalait.com")
        <div class="panel panel-default">
            <div class="panel-heading">Add Menu</div>
            <div class="panel-body">
                <form method="POST"  class="form-horizontal" id="addMenu">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Add Menu</label>
                        <div class="col-md-3">
                            <input class="form-control input-sm" id='menuNameId' name="menuName"></input>
                        </div>
                        <input type="submit" class="btn btn-info" ></input>
                    </div>
                </form>
            </div>
        </div>
    @endif


    {{-- Edit Modal --}}
    <div id="editModal" class="modal fade" style="margin-top:3%">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Edit Menu</h4>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Menu</div>
                    <div class="panel-body">
                        <form method="POST"  class="form-horizontal" id="editMenu">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Menu Name</label>
                                <div class="col-md-3">
                                    <input class="form-control input-sm" id='menuNameIdEdit' name="menuName"></input>
                                    <input class="hidden" id='menuIdEdit' name="menuIdNameEdit" ></input>
                                </div>
                                <input type="submit" class="btn btn-info" ></input>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Delete Modal --}}


    {{-- Delete Modal --}}
    <div id="deleteModal" class="modal fade" style="margin-top:3%">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Delete!</h4>
                </div>
                <div class="modal-body">
                    <h2>Are You Confirm to Delete This Menu?</h2>

                    <div class="modal-footer">
                        <form id ="deleteForm">
                            <button id="DMconfirmButton"  class="btn btn-danger" type="submit" > <span>Confirm</span></button>
                            <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal" type="button"> Close</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- End Delete Modal --}}

    <script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.delete-modal', function() {
            $("#deleteModal").modal('show');

        });

        $(document).on('click', '.edit-modal', function() {
            $("#editModal").modal('show');
            var menuName = $(this).attr("name");
            $("#menuNameIdEdit").val(menuName);
            $("#menuIdEdit").val($(this).attr("editid"));

        });

        /*Submit the form*/
        $("#addMenu").submit(function(event) {

            event.preventDefault();
            $.ajax({
                type: 'post',
                url: './addMenu',
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




        /*Submit the form*/
        $("#editMenu").submit(function(event) {

            event.preventDefault();

            $.ajax({
                type: 'post',
                url: './editMenu',
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
    </script>

@endsection
