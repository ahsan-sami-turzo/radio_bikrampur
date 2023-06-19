@extends('layouts.admin')
@section('main-page')

<table class="table table-bordered">
    <thead class="thead-dark" style="background:#0b0c1569;color:white;">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Menu Name</th>
            {{-- <th scope="col">Description</th> --}}
            <th scope="col">Parent</th>
            <th scope="col">Total Section</th>
            <th scope="col">Route</th>
            <th scope="col">Status</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @php $count = 0;
        $parent = array();
        @endphp
        {{-- @php  $parent = array(); @endphp --}}
        @foreach($menus as $menu)

        {{-- @if($menu->parentId == NULL)
        @php
        $parent[$menu->id] = $menu->menuName;
        // print_r($parent[$menu->id]);
        @endphp
        @endif --}}

        <tr>
            <th scope="row">{{++$count}}</th>

            <td>{{$menu->menuName}}</td>
            {{-- <td>{{$menu->Description}}</td> --}}

            {{--   @if ($menu->parentId != NULL)


            $id = $menu->parentId;
            <td>{{$parent[$menu->parentId]}}</td>

            @else
            <td>No Parent</td>

            @endif --}}


            <td id="{{$menu->parentId}}">{{$menu->Parent}}</td>
            <td>{{$menu->numberOfSection}}</td>
            <td>{{$menu->route}}</td>
            
            @if($menu->status)
            <td>Active</td>
            @else
            <td>Inactive</td>
            @endif

            

            <td>
                @if(Auth::user()->email == "info@ambalait.com")
                <a href="javascript:;" class="edit-modal" parentId = "{{$menu->parentId}}" editId="{{$menu->id}}" name="{{$menu->menuName}}" route ="{{$menu->route}}">
                    <span class="glyphicon glyphicon-edit"></span>
                </a>
                <a href="javascript:;" id="del" class="delete-modal" parentIdDel = "{{$menu->parentId}}" deleteId="{{$menu->id}}" >
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
           {{--  {{ csrf_field() }} --}}
           <meta name="csrf-token" content="{{ csrf_token() }}" />
           <div class="form-group text-center">
            <label class="col-sm-3 control-label">Menu Name </label>
            <div class="col-md-4">
                <input class="form-control input-sm" id='menuName' name="menuName"></input><br/>
            </div>
        </div>
        <div class="form-group text-center">
            <label class="col-sm-3 control-label">Parent </label>
            <div class="col-md-4">

                <select id="selectMenu" class="form-control">
                    <option value="0">Select Option</option>



                    @foreach($dropDown as $menu => $data)
                    <option value="{{$menu}}">{{$data}}</option>

                    @endforeach



                    @foreach($menus as $menu)
                    @php
                    $users = DB::select('select * from menu where id = ?', [3]);

                    // dd($users);
                    var_dump($users)

                    // function checkParentIds($id, $data = array()) {
                         // $parent = mysql_query("SELECT parentId, menuName FROM menu WHERE id = '$id'");
                         // $parent_query = mysql_fetch_assoc($parent);

                        // $parent = DB::table('menu')
                        // ->where('parentId', $id)
                        // ->select('*')
                        // ->get();


                        //var_dump($users);

                        // dd($users);

                        // var_dump($parent);
                        // dd($parent);
                        // print_r($parent);

                    // $parent_result = "";

                 //        if ($users->parentId > 0) {
                 //            $data[] = $users->menuName;
                 //            checkParentIds($users->parentId, $data);
                 //        } else {
                 //         $parent_result = (empty($data)) ? 1 : implode("','", $data);
                 //     }
                 //     return $parent_result;
                 // }
                    @endphp
                    {{-- <option value="{{$menu->id}}">{{checkParentIds($menu->id)}}</option> --}}
                    @endforeach

                    {{-- <option value="volvo">Volvo</option>
                    <option value="saab">Saab</option>
                    <option value="mercedes">Mercedes</option>
                    <option value="audi">Audi</option> --}}
                </select>

            </div>
        </div>
        <div class="form-group text-center">
            <label class="col-sm-3 control-label">Number Of Sections</label>
            <div class="col-md-4">
                <input class="form-control input-sm" id='numOfSection' name="numOfSection"></input><br/>
            </div>
        </div>
        <div class="form-group text-center">
            <label class="col-sm-3 control-label">Route</label>
            <div class="col-md-4">
                <input class="form-control input-sm" id='route' name="route"></input><br/>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Status</label>
            <div class="col-md-4">
                <select id="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

            </div>
            
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Icon Name</label>
            <div class="col-md-4">
                <input class="form-control input-sm" id='icon' name="icon"></input><br/>
            </div>
            
        </div>
    </div>


    <div class="form-group text-center">

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
                {{-- <div class="panel-heading">Edit Menu</div> --}}
                <div class="panel-body">
                    <form method="POST"  class="form-horizontal" id="editMenu">
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <h1 hidden id = 'editidva'></h1>
                        <h1 hidden id = 'parentIdEdit'></h1>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Menu Name</label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" id='editMenuName' name="menuName"></input>
                                
                            </div>

                            
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Parent</label>
                            <div class="col-md-3">

                                <select id="editParent" class="form-control">
                                    <option value="0">Select From List</option>

                                    @foreach($menus as $menu)
                                    <option value="{{$menu->id}}">{{$menu->menuName}}</option>
                                    @endforeach

                                </select>

                            </div>

                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Total Section</label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" id='editSection' name="menuName"></input>

                            </div>



                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Route</label>
                            <div class="col-md-3">
                                <input class="form-control input-sm" id='editRoute' name="menuName"></input>

                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Status</label>
                            <div class="col-md-3">
                                <select class="form-control" id="editStatus">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>

                                </select>

                            </div>

                        </div>

                        <input type="submit" class="btn btn-info" id="editmenu" ></input>
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
                        <button id="DMconfirmButton"   class="btn btn-danger" type="submit" > <span>Confirm</span></button>
                        <button  class="btn btn-warning glyphicon glyphicon-remove" data-dismiss="modal" type="button"> Close</button>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>
{{-- End Delete Modal --}}

<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(event) {



     $('.edit-modal').click(function(event) {
        var id = $(this).attr('editid');
        var parentId = $(this).attr('parentId');
        //alert(parentId);
        $('#parentIdEdit').html(parentId);
        $('#editidva').html(id);


        var id = $('#editidva').text();
        //console.log('id '+id);
    });

     $(document).on('click', '.delete-modal', function() {
        $("#deleteModal").modal('show');
        var id = $(this).attr('deleteId');
            //alert(id);

            var parentIdDel = $(this).attr('parentIdDel');
            //console.log(parentIdDel);
            
            id = parseInt(id);

            $('#DMconfirmButton').click(function(event) {

               // console.log('ok');

               $.ajax({
                type: 'post',
                url: './deleteMenu',
                data: {
                   "_token": CSRF_TOKEN,
                   "id" : id,
                   "parentIdDel": parentIdDel
               },

               dataType: 'json',
               success: function( _response ){
                toastr.success("success");
                console.log("success");
                setTimeout(function(){
                    location.reload();
                }, 1500);
            },
                // success: function(data) {
                //     console.log(data);
                // },

                error: function( data ){
                    // Handle error
                    //alert(data);
                    console.log(data);

                }


            });            
           });
            //alert(id);

            // $.ajax({
            //     type: 'post',
            //     url: './deleteMenu',
            //     data: {
            //      "_token": CSRF_TOKEN,
            //      "id" : id
            //  },

            //  dataType: 'json',
            //  success: function( _response ){
            //     toastr.success("success");
            //         // console.log(data);
            //         setTimeout(function(){
            //             location.reload();
            //         }, 1500);
            //     },
            //     // success: function(data) {
            //     //     console.log(data);
            //     // },

            //     error: function( data ){
            //         // Handle error
            //         //alert(data);
            //         console.log(data);

            //     }


            // });            

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

            // $.ajaxSetup({
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     }
            // });

            var id = $('#selectMenu').val();
            var menuName = $('#menuName').val();
            var numberOfSection = $('#numOfSection').val();
            var route = $('#route').val();
            var status = $('#status').val();
            var icon = $('#icon').val();

            


            //console.log(id + menuName + numberOfSection + route + status);


            $.ajax({
                type: 'post',
                url: './addMenu',
                //data: $('form').serialize(),
                // data: { 

                //     menuName : 'menuName',
                //     parentId : 'parentId',
                //     numSectionId : 'numSectionId'

                // },
                data: {
                    "_token": CSRF_TOKEN,
                    "id" : id,
                    "menuName" : menuName,
                    "numberOfSection" : numberOfSection,
                    "route" : route,
                    "status":status,
                    "icon" : icon

                },
                dataType: 'json',
                success: function( _response ){
                    toastr.success("success");
                    // console.log(data);
                    setTimeout(function(){
                        location.reload();
                    }, 1500);
                },
                // success: function(data) {
                //     console.log(data);
                // },

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

        var id = $('#editidva').text();
        var preParentId = $('#parentIdEdit').text();
        id = parseInt(id);
        var name = $('#editMenuName').val();
        var parent = $('#editParent').val();
        var numSection = $('#editSection').val();
        numOfSection = parseInt(numOfSection);
        var routeVal = $('#editRoute').val();
        var editStatus = $('#editStatus').val();

        console.log('id ' + id);
        console.log('name ' + name);
        console.log('parent ' + parent);
        console.log('numSection ' + numSection);
        console.log('routeVal ' + routeVal);
        console.log('status ' + editStatus);


        $.ajax({
            type: 'post',
            url: './editMenu',
            //data: $('form').serialize(),

            data: {
                "_token": CSRF_TOKEN,
                "id" : id,
                "menuName" : name,
                'parent' : parent,
                "numSection" : numSection,
                "route" : routeVal,
                "status":editStatus,
                "preParentId" : preParentId

            },

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
