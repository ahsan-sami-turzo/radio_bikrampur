@extends("layouts.admin")
@section('main-page')
    
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">  
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<div class="subHeader">
<h1 style="color:#3c7376;font-family: 'Monoton', cursive;">PROGRAMS</h1>
</div>

@if(sizeof($programs) > 0)
<div class="panel panel-info sectionsPost">
<div class="panel-body">
    <h4>Programs</h4>

    <div style="background:white;margin-top:2%;">
        <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" scope="col"></th>
                <th class="text-center" scope="col">Program</th>
                <th class="text-center" scope="col">Type</th>
                <th class="text-center" scope="col">Host</th>                
            </tr>
        </thead>
        <tbody>
            @foreach ($programs as $program)     
                <tr>
                    <td class="text-center"> <a href="{{ url('/admin/deleteProgram', ['id' => $program->id]) }}"> <i class="fa fa-ban text-danger"></i> </a> </td>
                    <td class="text-center">{{ $program->program_name }}</td>       
                    <td class="text-center">{{ $program->program_type }}</td>       
                    <td class="text-center">{{ $program->program_host }}</td>      
                </tr>
            @endforeach                
        </tbody>
        </table>
    </div>
</div>
</div>
@endif


<div class="panel panel-info sectionsPost">
    <div class="panel-body">

        <h4>Add Program</h4>

        <form id="firstSectionContents"  style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveProgram') }}">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <input type="hidden" name="program_type" id="program_type">
            <input type="hidden" name="program_host" id="program_host">

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Program Name</label>
                        <input type="text" class="form-control" name="program_name" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Program Host</label>
                        <select class="form-control" id="selectHost" required>
                            <option value=""> -- Program Host -- </option>                        
                            @foreach ($team as $member)
                                <option value="{{ $member->name }}">{{ $member->name }} </option> 
                            @endforeach                        
                        </select>
                    </div>
                </div>
            </div>

            
            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Program Type</label>                        
                        <select class="form-control" id="selectType" required>
                            <option value=""> -- Program Type -- </option>                        
                            <option value="Current"> Current </option>                        
                            <option value="Upcoming"> Upcoming </option>                        
                        </select>
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
    $(document).on('change','#selectType',function(event){         
        event.preventDefault();
        var program_type = $(this).val();  
        $('#program_type').val(program_type);
    });

    $(document).on('change','#selectHost',function(event){         
        event.preventDefault();
        var program_host = $(this).val();  
        $('#program_host').val(program_host);
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
