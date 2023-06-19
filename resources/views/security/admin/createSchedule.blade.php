@extends("layouts.admin")
@section('main-page')
    
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">  
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<div class="subHeader">
<h1 style="color:#3c7376;font-family: 'Monoton', cursive;">PROGRAM SCHEDULE</h1>
</div>


<div class="panel panel-info sectionsPost">
<div class="panel-body">
    <h4>Current Schedule</h4>

    <div style="background:white;margin-top:2%;">
        <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th class="text-center" scope="col"></th>
                <th class="text-center" scope="col">Time</th>
                <th class="text-center" scope="col">Sunday</th>
                <th class="text-center" scope="col">Monday</th>
                <th class="text-center" scope="col">Tuesday</th>
                <th class="text-center" scope="col">Wednesday</th>
                <th class="text-center" scope="col">Thursday</th>
                <th class="text-center" scope="col">Friday</th>
                <th class="text-center" scope="col">Saturday</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programSchedules as $schedule)     
                <tr>
                    <td class="text-center"> <a href="{{ url('/admin/deleteSchedule', ['id' => $schedule->id]) }}"> <i class="fa fa-ban text-danger"></i> </a> </td>
                    <td class="text-center">{{ $schedule->programTime }}</td>       
                    @foreach ($schedule->programWeekday as $weekday)            
                        <td class="text-left"> @if(strlen($weekday) > 1) {{ $schedule->programName }} @endif </td>
                    @endforeach
                </tr>
            @endforeach                
        </tbody>
        </table>
    </div>
</div>
</div>



<div class="panel panel-info sectionsPost">
    <div class="panel-body">
        <h4>Add Program</h4>
        <form id="firstSectionContents"  style="background:white;margin-top:2%;" method="POST" action="{{ url('admin/saveSchedule') }}">

            <input type="hidden" name="_token" value="{{csrf_token()}}">

            <input type="hidden" name="programDays" id="programDays">
            <input type="hidden" name="programname" id="programname">

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                        <label>Program Name</label>
                        {{-- <input type="text" class="form-control" name="programname" placeholder="Good Monring, Bangladesh" required> --}}
                        <select class="form-control" id="selectProgram" required>
                            <option value=""> -- Programs -- </option>                        
                            @foreach ($programs as $program)
                                <option value="{{ $program->program_name }}">{{ $program->program_name }} </option> 
                            @endforeach                        
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                    <label>Broadcast Time</label>
                        <input type="text" class="form-control timepicker" name="time"/>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group" >
                    <div class="col-md-6">
                    <label>Weekdays</label>
                        <div style="display: inline-flex; padding: 1em;">
                            <div class="form-check form-check-inline" style="padding-left: 1em;">
                                <input class="form-check-input" type="checkbox" id="btnSunday" value="'Sunday'">
                                <label class="form-check-label" for="btnSunday">Sunday</label>
                            </div>
                            <div class="form-check form-check-inline" style="padding-left: 1em;">
                                <input class="form-check-input" type="checkbox" id="btnMonday" value="'Monday'">
                                <label class="form-check-label" for="btnMonday">Monday</label>
                            </div>
                            <div class="form-check form-check-inline" style="padding-left: 1em;">
                                <input class="form-check-input" type="checkbox" id="btnTuesday" value="'Tuesday'">
                                <label class="form-check-label" for="btnTuesday">Tuesday</label>
                            </div>
                            <div class="form-check form-check-inline" style="padding-left: 1em;">
                                <input class="form-check-input" type="checkbox" id="btnWednesday" value="'Wednesday'">
                                <label class="form-check-label" for="btnWednesday">Wednesday</label>
                            </div>
                            <div class="form-check form-check-inline" style="padding-left: 1em;">
                                <input class="form-check-input" type="checkbox" id="btnThursday" value="'Thursday'">
                                <label class="form-check-label" for="btnThursday">Thursday</label>
                            </div>
                            <div class="form-check form-check-inline" style="padding-left: 1em;">
                                <input class="form-check-input" type="checkbox" id="btnFriday" value="'Friday'">
                                <label class="form-check-label" for="btnFriday">Friday</label>
                            </div>
                            <div class="form-check form-check-inline" style="padding-left: 1em;">
                                <input class="form-check-input" type="checkbox" id="btnSaturday" value="'Saturday'">
                                <label class="form-check-label" for="btnSaturday">Saturday</label>
                            </div>
                        </div>
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
    $( document ).ready(function() {
        var weekdays = [" ", " ", " ", " ", " ", " ", " "];

        $('.timepicker').timepicker({
            timeFormat: 'hh:mm p',
            interval: 30,
            minTime: '1',
            maxTime: '11:00pm',
            defaultTime: '6',
            startTime: '6:00am',
            dynamic: true,
            dropdown: true,
            scrollbar: true
        });

        $('#btnSunday').click(function() { weekdays[0] = (this.checked) ? 'Sunday' : " "; $("#programDays").val(weekdays); });
        $('#btnMonday').click(function() { weekdays[1] = (this.checked) ? 'Monday' : " "; $("#programDays").val(weekdays); });
        $('#btnTuesday').click(function() { weekdays[2] = (this.checked) ? 'Tuesday' : " "; $("#programDays").val(weekdays); });
        $('#btnWednesday').click(function() { weekdays[3] = (this.checked) ? 'Wednesday' : " "; $("#programDays").val(weekdays); });
        $('#btnThursday').click(function() { weekdays[4] = (this.checked) ? 'Thursday' : " "; $("#programDays").val(weekdays); });
        $('#btnFriday').click(function() { weekdays[5] = (this.checked) ? 'Friday' : " "; $("#programDays").val(weekdays); });
        $('#btnSaturday').click(function() { weekdays[6] = (this.checked) ? 'Saturday' : " "; $("#programDays").val(weekdays); });

    });

    $(document).on('change','#selectProgram',function(event){         
        event.preventDefault();
        var programname = $(this).val();  
        $('#programname').val(programname);
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
