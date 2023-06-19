@extends('layouts.admin')
@section('main-page')

    <table class="table table-bordered">
        <thead class="thead-dark" style="background:#0b0c1569;color:white;">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Sub-Menu Name</th>
                <th scope="col">Menu Name</th>
                <th scope="col">Route</th>
                <th colspan="2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $count = 0; @endphp
            @foreach($subMenus as $subMenu)
                <tr>
                    <th scope="row">{{++$count}}</th>
                    <td>{{$subMenu->subMenuName}}</td>
                    <td>{{$subMenu->menuName}}</td>
                    <td>{{"singlePage/".$subMenu->id}}</td>
                    <td>
                        {{-- @if($subMenu->menuName != "home") --}}
                            <a href="javascript:;" class="edit-modal" editId="{{$subMenu->id}}" name="{{$subMenu->subMenuName}}" route ="{{$subMenu->route}}">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="javascript:;" class="delete-modal" deleteId="{{$subMenu->id}}" >
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        {{-- @endif --}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

        <div class="panel panel-default">
            <div class="panel-heading">Add Sub Menu</div>
            <div class="panel-body">
                <form method="POST"  class="form-horizontal" id="addSubMenu">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Add Sub Menu</label>
                        <div class="col-md-3">
                            <input class="form-control input-sm" id='subMenuNameId' name="subMenuName"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Select Menu</label>
                        <div class="col-md-3">
                            <select class="col-md-3 form-control" name="menuId">
                                <option value="">Select Menu</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->menuName}}</option>
                            @endforeach
                           </select>
                        </div>
                        <input type="submit" class="btn btn-info" ></input>
                    </div>




                </form>
            </div>
        </div>


    {{-- Edit Modal --}}
    <div id="editModal" class="modal fade" style="margin-top:3%">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" style="clear:both;background-color:black;color:white; padding:10px">Edit Menu</h4>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Sub-Menu</div>
                    <div class="panel-body">
                        <form method="POST"  class="form-horizontal" id="editMenu">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Sub-Menu Name</label>
                                <div class="col-md-3">
                                    <input class="form-control input-sm" id='subMenuNameIdEdit' name="subMenuNameEdit"></input>
                                    <input class="hidden" id='subMenuIdEdit' name="subMenuIdNameEdit" ></input>
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
                            <input type ="hidden" id="deleteSubmenu" name="deleteSubMenu">
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
            $("#deleteSubmenu").val($(this).attr("deleteId"));
        });

        $(document).on('click', '.edit-modal', function() {
            $("#editModal").modal('show');
            var subMenuName = $(this).attr("name");
            $("#subMenuNameIdEdit").val(subMenuName);
            $("#subMenuIdEdit").val($(this).attr("editid"));

        });

        /*Submit the form*/
        $("#addSubMenu").submit(function(event) {

            event.preventDefault();

            $.ajax({
                type: 'post',
                url: './addSubMenu',
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
                url: './editSubMenu',
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


        /*delete  form*/
        $("#deleteForm").submit(function(event) {

            event.preventDefault();

            $.ajax({
                type: 'post',
                url: './deleteSubMenu',
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
