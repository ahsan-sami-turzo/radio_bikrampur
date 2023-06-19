@if($programSchedules)

<div class="col-md-9 col-sm-12 container" style="padding: 0 3em">

<div class="row d-flex justify-content-center">
    <div class="menu-content pb-20 col-lg-8">
        <div class="title text-center">
            <h1 class="mb-10">Broadcast Schedule</h1>
        </div>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Sunday</th>
            <th scope="col">Monday</th>
            <th scope="col">Tuesday</th>
            <th scope="col">Wednesday</th>
            <th scope="col">Thursday</th>
            <th scope="col">Friday</th>
            <th scope="col">Saturday</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $programSchedules as $schedule)     
                <tr>
                <th scope="row">{{ $schedule->programTime }}</th>       
                    @foreach ($schedule->programWeekday as $weekday)            
                        <td> @if(strlen($weekday) > 1) {{ $schedule->programName }} @endif </td>
                    @endforeach

                </tr>
            @endforeach
                
        </tbody>
    </table>
</div>

</div>

@endif