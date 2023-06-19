@if(sizeof($currentPrograms) > 0 )
<div class="col-md-12 container" style="padding: 0 3em">

<div class="row d-flex justify-content-center">
    <div class="menu-content pb-20 col-lg-8">
        <div class="title text-center">
            <h1 class="mb-20">Current Programs</h1>
        </div>
    </div>
</div>

<div class="card-deck" style="justify-content: center;">
    @foreach ($currentPrograms as $program)      
        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
            <div class="card-header">Host: <strong>{{ $program->program_host }}</strong> </div>
            <div class="card-body">
                <h5 class="card-title text-white">{{ $program->program_name }}</h5>
            </div>
        </div>  
    @endforeach
</div> 

</div>
@endif

@if(sizeof($upcomingPrograms) > 0)

<div class="container pb-50"></div>

<div class="col-md-12 container" style="padding: 0 3em">

<div class="row d-flex justify-content-center">
    <div class="menu-content pb-10 col-lg-8">
        <div class="title text-center">
            <h1 class="mb-20">Upcoming Programs</h1>
        </div>
    </div>
</div>

<div class="card-deck" style="justify-content: center;">
    @foreach ($upcomingPrograms as $program)      
        <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
            <div class="card-header">Host: <strong>{{ $program->program_host }}</strong> </div>
            <div class="card-body">
                <h5 class="card-title text-white">{{ $program->program_name }}</h5>
            </div>
        </div>  
    @endforeach
</div> 

</div>
@endif