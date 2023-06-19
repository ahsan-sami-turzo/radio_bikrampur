@extends('layouts.admin')
@section('main-page')
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
        <div class="col-md-3 widget widget1" onclick="window.location.href = './adminServicePageEditor';">
            <div class="r3_counter_box" style="cursor: pointer;">
                <i class="pull-left fa fa-pie-chart dollar1 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>Services</strong></h5>
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
        </div>
        <div class="col-md-3 widget" onclick="window.location.href='./adminPortfolioPageEditor';" >
            <div class="r3_counter_box" style="cursor: pointer;">
                <i class="pull-left fa fa-users dollar2 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>Portfolio</strong></h5>
                    <span>Page Editor</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 widget widget1" onclick="window.location.href='./adminContactPageEditor';">
            <div class="r3_counter_box" style="cursor: pointer;">
                <i class="pull-left fa fa-money user2 icon-rounded"></i>
                <div class="stats">
                    <h5><strong>Contact</strong></h5>
                    <span>Page Editor</span>
                </div>
            </div>
        </div>


        <div class="clearfix"> </div>
    </div>
@endsection
