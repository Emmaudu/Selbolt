@extends('admin.layouts.master')
@section('title')
Tasks
@endsection
@section('link')
<link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">

@endsection
<!-- Page content -->
@section('content')
<div class="container mt--6">
  <h1 class="mt-5" id="text-color">{{$mentee->fullname()}} Page</h1>
        <div class="row">
        <div class="col-lg mt-2">
            <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
                <div class="row">
                <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0" style="color: #191970"><b>Total transaction</b></h5>
                    <span class="h2 font-weight-bold mb-0">{{$mentee->transactions->sum('amount')}}</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> </span>
                <span class="text-nowrap"><a type="button" class="btn btn-default" data-toggle="modal" data-target=".bd-example-modal-lg">view transaction logs</a></span>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-title">
                                    <h1 class="text-center">Previous Transactions</h1>
                                </div>
                            <div class="container">
                            @foreach($mentee->transactions as $transaction)
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <span class="p2" id="text-color">{{$transaction->mentorUser->mentors->fullname()}}</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="p2">{{$transaction->amount}}</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="float-right" style="color: blue;">{{$transaction->status}}</span>
                                        </div>
                                    </div>
                            @endforeach

                            </div>
                            </div>
                        </div>
                    </div>
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
                    <h5 class="card-title text-uppercase text-muted mb-0" style="color: #191970"><b>Total Mentors</b></h5>
                    <span class="h2 font-weight-bold mb-0">{{$mentee->mentors->count()}}</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{$mentee->mentors->count()}}</span>
                <span class="text-nowrap">view mentors</span>
                <span class="text-nowrap"><a type="button" class="btn btn-default" data-toggle="modal" data-target=".mentee-example-modal-lg">view mentors</a></span>
                    <div class="modal fade mentee-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-title">
                                    <h1 class="text-center">Mentors</h1>
                                </div>
                            <div class="container">
                            @foreach($mentee->mentors as $mentor)
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <span class="p2" id="text-color">{{$mentor->fullname()}}</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="float-right" style="color: blue;"><a href="/admin/mentors/details/{{$mentor->id}}">view mentor</a></span>
                                        </div>
                                    </div>
                            @endforeach

                            </div>
                            </div>
                        </div>
                    </div>
                </p>
            </div>
            </div>
        </div>  
    </div>
      </div>
@endsection
@section('scripts')
@endsection