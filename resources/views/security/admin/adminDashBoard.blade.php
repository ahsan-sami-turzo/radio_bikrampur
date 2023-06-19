@extends('layouts.admin')
@section('main-page')

{{-- @if(count($menus) > 0)
<div class="col_3">
    @foreach($menus as $menus)

    <div class="col-md-3 widget widget1" onclick="window.location.href = './adminHomePageEditor';">
        <div class="r3_counter_box" style="cursor: pointer;">
            <i class="pull-left fa fa-dollar icon-rounded"></i>
            <div class="stats" >
                <h5><strong>{{$menus->menuName}}</strong></h5>
                <span>Page Editor</span>
            </div>

        </div>
    </div>
    @endforeach

</div>
@endif --}}




<div class="col_3">
    <div class="col-md-3 widget widget1" onclick="window.location.href = './adminHomePageEditor';">
        <div class="r3_counter_box" style="cursor: pointer;">
            <i class="pull-left fa fa-dollar icon-rounded"></i>
            <div class="stats" >
                <h5><strong>Home</strong></h5>
                <span>Page Editor</span>
            </div>

        </div>
    </div>

    {{-- <div class="col-md-3 widget widget1" onclick="window.location.href = './adminServicePageEditor';">
        <div class="r3_counter_box" style="cursor: pointer;">
            <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
            <div class="stats">
                <h5><strong>Services</strong></h5>
                <span>Page Editor</span>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-md-3 widget" onclick="window.location.href='./adminPortfolioPageEditor';" >
        <div class="r3_counter_box" style="cursor: pointer;">
            <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
            <div class="stats">
                <h5><strong>Media</strong></h5>
                <span>Page Editor</span>
            </div>
        </div>
    </div>
    <div class="col-md-3 widget widget1" onclick="window.location.href='./adminAboutPageEditor';" >
        <div class="r3_counter_box" style="cursor: pointer;">
            <i class="pull-left fa fa-laptop user1 icon-rounded"></i>
            <div class="stats">
                <h5><strong>About US</strong></h5>
                <span>Page Editor</span>
            </div>
        </div>
    </div> --}}

    <div class="col-md-3 widget widget1" onclick="window.location.href='./adminContactPageEditor';">
        <div class="r3_counter_box" style="cursor: pointer;">
            <i class="pull-left fa fa-money user2 icon-rounded"></i>
            <div class="stats">
                <h5><strong>Contact</strong></h5>
                <span>Page Editor</span>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-3 widget widget1" onclick="window.location.href = './adminMediaPageEditor';">
        <div class="r3_counter_box" style="cursor: pointer;">
            <i class="pull-left fa fa-dollar icon-rounded"></i>
            <div class="stats" >
                <h5><strong>Media</strong></h5>
                <span>Page Editor</span>
            </div>

        </div>
    </div> --}}

    {{-- <br> --}}

    @foreach($menus as $menu)

    @if ($menu->menuName == 'home' or $menu->menuName == 'Service' or $menu->menuName == 'Contact Us')
    
    @elseif($menu->menuName == 'Who We Are')
        <div class="col-md-3 widget widget1" onclick="window.location.href = './admin/createWhoWeAre';">
            <div class="r3_counter_box" style="cursor: pointer;">
                <i class="pull-left  {{$menu->iconName}} icon-rounded"></i>
                <div class="stats" >
                    <h5><strong>{{$menu->menuName}}</strong></h5>
                    <span>Who We Are Editor</span>
                </div>
            </div>
        </div>
    @elseif($menu->menuName == 'Programs')
        <div class="col-md-3 widget widget1" onclick="window.location.href = './admin/createProgram';">
            <div class="r3_counter_box" style="cursor: pointer;">
                <i class="pull-left  {{$menu->iconName}} icon-rounded"></i>
                <div class="stats" >
                    <h5><strong>{{$menu->menuName}}</strong></h5>
                    <span>Program Editor</span>
                </div>
            </div>
        </div>
    @elseif($menu->menuName == 'Schedule')
        <div class="col-md-3 widget widget1" onclick="window.location.href = './admin/createSchedule';">
            <div class="r3_counter_box" style="cursor: pointer;">
                <i class="pull-left  {{$menu->iconName}} icon-rounded"></i>
                <div class="stats" >
                    <h5><strong>{{$menu->menuName}}</strong></h5>
                    <span>Schedule Editor</span>
                </div>
            </div>
        </div>
    @elseif($menu->menuName == 'Team')
        <div class="col-md-3 widget widget1" onclick="window.location.href = './admin/createRJ';">
            <div class="r3_counter_box" style="cursor: pointer;">
                <i class="pull-left  {{$menu->iconName}} icon-rounded"></i>
                <div class="stats" >
                    <h5><strong>{{$menu->menuName}}</strong></h5>
                    <span>Team Editor</span>
                </div>
            </div>
        </div>
    @elseif($menu->menuName == 'Videos')
        <div class="col-md-3 widget widget1" onclick="window.location.href = './admin/createVideo';">
            <div class="r3_counter_box" style="cursor: pointer;">
                <i class="pull-left  {{$menu->iconName}} icon-rounded"></i>
                <div class="stats" >
                    <h5><strong>{{$menu->menuName}}</strong></h5>
                    <span>Playlist Editor</span>
                </div>
            </div>
        </div>
    @else
        <div class="col-md-3 widget widget1" onclick="window.location.href = './adminCommonPageEditor/{{$menu->id}}';">
            <div class="r3_counter_box" style="cursor: pointer;">
                <i class="pull-left  {{$menu->iconName}} icon-rounded"></i>
                <div class="stats" >
                    <h5><strong>{{$menu->menuName}}</strong></h5>
                    <span>Page Editor</span>
                </div>
            </div>
        </div>
    @endif

    

    @endforeach



    <div class="clearfix"> </div>
</div>
@endsection
