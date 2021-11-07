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
  <h1 class="mt-5" id="text-color">{{$mentor->fullname()}} Page</h1>
  <div class="card mt-3 mb-3">
        <div class="container row">
            <div class="col-md-4">
              @if ($mentor->pic != null)
                <img class="profile-dp" src="{{$mentor->pic}}" alt="Card image cap" />
              @else
                <div id="noprofile">{{substr($mentor->first_name, 0, 1)}}{{substr($mentor->last_name, 0, 1)}}</div>
              @endif
                <div class="mt-3" style="float: center;text-align: center">    
                    <span class = "fa fa-star checked"></span>  
                    <span class = "fa fa-star checked"></span>  
                    <span class = "fa fa-star checked"></span>  
                    <span class = "fa fa-star checked"></span>  
                    <!-- To display unchecked star rating icons -->  
                    <span class = "fa fa-star unchecked"></span>
                </div>  
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h3 class="card-title p4" id="text-color"><a href="/overview/{{$mentor->username}}" id="text-color" target="_blank"> <b>{{$mentor->fullname()}}
                    <img width="10%" src="https://www.countryflags.io/{{$mentor->country}}/shiny/64.png">
                </b></a></h3>
                    <h3 class="card-title p2" id="text-color">{{$mentor->job_title}} at <b>{{$mentor->company_name}}</b></h3>
                    <hr>
                    <div class="row">
                        @foreach($mentor->activeServices() as $service)
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <button class="btn mt-3" style="pointer-events: none;background-color: #191970;color: white" type="button" disabled>{{$service->name}}</button>
                        </div>
                        @endforeach
                    </div>
                    <div>
                        <h5 style="text-align: justify;text-justify: inter-word;">
                            {{Str::words($mentor->bio, 50, '...')}}
                        </h5>
                    </div>
                </div>
            </div>
        </div> 
        <div class="container row"> 
          <div class="col-lg-4 col-md-6">
            <div class="card-body">
              <h1 class="p3"><b>#{{$mentor->price()}}</b></h1>
            </div>
          </div>
          <div class="offset-lg-4"></div>
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
                    <span class="h2 font-weight-bold mb-0">{{$mentor->transactions->sum('amount')}}</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                    
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> </span>
                    <span class="text-nowrap"><a type="button" class="btn btn-default" data-toggle="modal" data-target=".bd-example-modal-lg">view transactions</a></span>
                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-title">
                                    <h1 class="text-center">Previous Transactions</h1>
                                </div>
                            <div class="container">
                            @foreach($mentor->transactions as $transaction)
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <span class="p2" id="text-color">{{$transaction->mentorUser->users->fullname()}}</span>
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
                    <h5 class="card-title text-uppercase text-muted mb-0" style="color: #191970"><b>Total Mentees</b></h5>
                    <span class="h2 font-weight-bold mb-0">{{$mentor->mentees->count()}}</span>
                </div>
                <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                    </div>
                </div>
                </div>
                <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{$mentor->mentees->count()}}</span>
                <span class="text-nowrap"><a type="button" class="btn btn-default" data-toggle="modal" data-target=".mentee-example-modal-lg">view mentees</a></span>
                    <div class="modal fade mentee-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-title">
                                    <h1 class="text-center">Mentees</h1>
                                </div>
                            <div class="container">
                            @foreach($mentor->mentees as $mentee)
                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <span class="p2" id="text-color">{{$mentee->fullname()}}</span>
                                        </div>
                                        <div class="col-3">
                                            <span class="float-right" style="color: blue;"><a href="/admin/user/details/{{$mentee->id}}">view mentee</a></span>
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