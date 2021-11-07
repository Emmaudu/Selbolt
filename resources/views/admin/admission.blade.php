@extends('admin.layouts.master')
@section('title')
Dashboard
@endsection
<!-- Page content -->
@section('content')
<div class="container">
    
        <h2 class="p2" id="text-color">MENTOR REGISTRATION DETAILS</h2>
        <hr>
            <div class="row">
                    <div class="col-md-4 mb-3">
                            <span id="text-color">FULL NAME</span>
                            <span name="full_name" class="p3" style="display: block;" placeholder="FULL NAME OF CHILD">{{$mentor->fullname()}}</span>
                    </div>
                    <div class="col-md-4 mb-3">
                            <span id="text-color">JOB TITLE</span>
                            <span type="date" class="p3" style="display: block;" id="validationDefault02" name="dob" placeholder="dd-mm-yy">{{$mentor->job_title}}</span>
                    </div>
                    <div class="col-md-4 mb-3">
                            <span id="text-color">COMPANY NAME</span>
                            <div class="span-group">
                                    <span name="sex" class="p3" style="display: block;" placeholder="SEX">{{$mentor->company_name}}</span>
                            </div>
                    </div>
            </div>
            <div class="row">
                    <div class="col-md-4 mb-3">
                            <span id="text-color">COUNTRY</span>
                            <span name="address" class="p3" style="display: block;" placeholder="STREET ADDRESS">{{$mentor->country}}</span>
                    </div>
                    <div class="col-md-4 mb-3">
                            <span id="text-color">MOBILE</span>
                            <span type="text" class="p3" style="display: block;" id="validationDefault02" name="city" placeholder="CITY">{{$mentor->mobile}}</span>
                    </div>
                    <div class="col-md-4 mb-3">
                            <span id="text-color">EMAIL</span>
                            <span type="email" class="p3" style="display: block;" id="validationDefault04" name="email" placeholder="EMAIL ADDRESS">{{$mentor->email}}</span>
                    </div>
            </div>
            
            <div><h2 id="text-color">QUESTIONS</h2></div>
            
            <div class="row">
                    <div class="col-md-12 mb-3">
                            <span id="text-color">WHY A MENTOR ?</span>
                            <div class="p3" style="display: block;">{{$mentor->why_a_mentor}}</div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-12 mb-3">
                        <span id="text-color">SUCCESS</span>
                        <div class="span-group">
                                <div name="occupation" class="p3" style="display: block;" >{{$mentor->career_success}}</div>
                        </div>
                </div>
            </div>
    </div>
    <a class="btn btn-success btn-lg" href="/admin/approve/taskers/{{$mentor->id}}">Accept</a><a class="btn btn-danger btn-lg float-right" href="/admin/reject/taskers/{{$mentor->id}}">Reject</a>
</div>
@endsection
@section('scripts')
@endsection