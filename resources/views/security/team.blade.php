<style>
    .card-image {
        width: 200px;  
        height: 200px; 
        object-fit: cover;
    }
</style>

@if($team)

<div class="col-md-12 container" style="padding: 0 3em">

    <div class="row d-flex justify-content-center">
        <div class="menu-content pb-20 col-lg-8">
            <div class="title text-center">
                <h1 class="mb-10">Team</h1>
            </div>
        </div>
    </div>
    
    <div class="row" style="justify-content: center;">  
        @foreach($team as $member)

            <div class="card" style="width: 16rem; margin: 1em">
                <img style="height: 200px; object-fit: cover;" class="card-img-top" src="{{asset('public/uploads/images/team/')}}/{{$member->imgPath}}" alt="{{ $member->name }}">
                <div class="card-body">
                    <h4 class="card-title text-center"> {{ ucfirst($member->name) }}</h4>
                    <h5 class="text-center" style="font-weight: 300"> {{ ucfirst($member->designation) }}</h5>
                    <hr>
                    <p class="card-text text-center">
                        @if($member->facebook)  <a href="{{ $member->facebook }}"  target="_blank"> <i style="padding-left: .3em" class="fa fa-2x fa-facebook-square" aria-hidden="true"></i> </a> @endif
                        @if($member->twitter)   <a href="{{ $member->twitter }}"   target="_blank"> <i style="padding-left: .3em" class="fa fa-2x fa-twitter" aria-hidden="true"></i> </a> @endif
                        @if($member->instagram) <a href="{{ $member->instagram }}" target="_blank"> <i style="padding-left: .3em" class="fa fa-2x fa-instagram" aria-hidden="true"></i> </a> @endif
                        @if($member->others)    <a href="{{ $member->others }}" target="_blank">    <i style="padding-left: .3em" class="fa fa-2x fa-globe" aria-hidden="true"></i> </a> @endif
                    </p>
                </div>
            </div>

        @endforeach        
    </div>

</div>


@endif


