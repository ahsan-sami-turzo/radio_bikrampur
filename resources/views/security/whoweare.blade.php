@if($whoweare)
<div class="col-md-12 container" style="padding: 0 3em">

    <div class="row d-flex justify-content-center">
        <div class="menu-content pb-20 col-lg-8">
            <div class="title text-center">
                <h1 class="mb-20">Who We Are</h1>
            </div>
        </div>
    </div>

    <div class="card">
    <div class="card-header">
        <h5 class="card-title">About Us</h5>
    </div>
    <div class="card-body">
        <p class="card-text text-justify" style="font-size: larger; font-weight: 400">{{ $whoweare['aboutus'] }}</p>
    </div>
    </div>

    <hr>

    <div class="card">
    <div class="card-header">
        <h5 class="card-title">History/Uniqueness</h5>
    </div>
    <div class="card-body">
        <p class="card-text text-justify" style="font-size: larger; font-weight: 400">{{ $whoweare['history'] }}</p>
    </div>
    </div>

    <hr>

    <div class="card">
    <div class="card-header">
        <h5 class="card-title">Coverage</h5>
    </div>
    <div class="card-body">
        <p class="card-text text-justify" style="font-size: larger; font-weight: 400">{{ $whoweare['coverage'] }}</p>
    </div>
    </div>

</div>
@endif