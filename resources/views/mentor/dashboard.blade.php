@extends('layouts.master')
@section('title')
Dashboard
@endsection
<!-- Page content -->
@section('content')
  <div class="container">
  <div style="color: #191970"><b>Welcome, {{auth()->user()->fullname()}}<b></div>
    <div class="row">
        <div class="col-lg">
           <!-- <div id="chartContainer" style="height: 250px;width: 100%"></div> -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg mt-2">
            <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0" style="color: #191970"><b>Total transaction</b></h5>
                    <span class="h2 font-weight-bold mb-0">{{$previousTransactions->sum('amount')}}</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{$previousTransactions->count()}}</span>
                <span class="text-nowrap">transactions</span>
                </p>
            </div>
            </div>
        </div>  
        <div class="col-lg mt-2">
            <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0" style="color: #191970"><b>Total <br>Mentees</b></h5>
                    <span class="h2 font-weight-bold mb-0">{{auth()->user()->mentees()->count()}}</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{auth()->user()->mentees()->count()}}</span>
                <span class="text-nowrap">users</span>
                </p>
            </div>
            </div>
        </div>  
    </div>

    <div class="mt-3 p3"><b>
        <h3 class="p2" style="color: #191970">Pending Transactions</h3></b>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
    @foreach($pendingTransactions as $pendingTransaction)
        <div class="col-lg">
            <div class="card mt-3">
                @if($pendingTransaction->mentorUser->users->pic == null)
                <img style="margin: auto;margin-top: 1%" class="profile1-dp card-img-top"  src="{{asset('user.jpeg')}}" alt="Card image cap">
                @else
                <img style="margin: auto;margin-top: 1%" class="profile1-dp card-img-top"  src="{{$pendingTransaction->mentorUser->users->pic}}" alt="Card image cap">
                @endif

                
                <div class="card-body" >
                    <h6 class="card-title p2 text-center" id="text-color"><b>Mentee: {{$pendingTransaction->mentorUser->users->fullname()}}</b></h6>
                    <h6 class="card-title p2 text-center" id="text-color"><b>Amount: {{$pendingTransaction->amount}}</b></h6>
                    <h6 class="card-title p2 text-center" id="text-color"><b>Status: {{$pendingTransaction->status}}</b></h6>
                    <p class="card-text"></p>
                </div>
            </div>
        </div>
        <div class="offset-lg-0 offset-md-1 offset-sm-3"></div>
    @endforeach
  </div>
  
</div>
@php
$dataPoints1 = array(
	array("label"=> "2010", "y"=> 36.12),
	array("label"=> "2011", "y"=> 34.87),
	array("label"=> "2012", "y"=> 40.30),
	array("label"=> "2013", "y"=> 35.30),
	array("label"=> "2014", "y"=> 39.50),
);
$dataPoints2 = array(
	array("label"=> "2010", "y"=> 64.61),
	array("label"=> "2011", "y"=> 70.55),
	array("label"=> "2012", "y"=> 72.50),
	array("label"=> "2013", "y"=> 81.30),
	array("label"=> "2014", "y"=> 63.60),
);
@endphp
@endsection
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Transactions"
	},
	axisY:{
		includeZero: true
	},
	legend:{
		cursor: "pointer",
		verticalAlign: "center",
		horizontalAlign: "right",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Real Trees",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
	},{
		type: "column",
		name: "Artificial Trees",
		indexLabel: "{y}",
		yValueFormatString: "$#0.##",
		showInLegend: true,
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
function toggleDataSeries(e){
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else{
		e.dataSeries.visible = true;
	}
	chart.render();
}
 
}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@section('scripts')
@endsection