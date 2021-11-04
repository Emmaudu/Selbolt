@extends('master')
@section('title')
Profile Page
@endsection
@section('link')
<link rel="stylesheet" href="{{asset('main.css')}}">
@endsection
<!-- Page content -->
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg">
      <h3 class="mb-0" id="text-color">Edit profile </h3>
    </div>
  </div>
    <div class="card">
        @if($message = Session::get('success'))
          <div class ='alert alert-success' style = "margin-bottom:8px">{{$message}}</div>
        @endif
      <div class="card-body">
        <form action="{{route('mentee.update-profile')}}" method="post">
          @csrf
          <h6 class="heading-small mb-4" id="text-color">User information</h6>
            @if ($errors->any())
              <ul style = "margin-bottom:10px">
              @foreach ($errors->all() as $error)
                  <li class ='text-danger' style = "color:red;margin-bottom:8px">{{$error}}</li>
              @endforeach
              </ul>
            @endif
          <div class="pl-lg-4">
          <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label id="text-color" class="form-control-label" for="input-username">First Name</label>
                      <input type="text" required id="input-username" class="form-control" style="border:1px solid black;" name="first_name" placeholder="first name" value="{{$user->first_name}}">
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label id="text-color" class="form-control-label">Last name</label>
                      <input type="text" required class="form-control" style="border:1px solid black;" name="last_name" value="{{$user->last_name}}">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label id="text-color" class="form-control-label" >Email address</label>
                      <input type="email" class="form-control" style="border:1px solid black;" name="email_address" value="{{$user->email}}">
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label id="text-color" class="form-control-label">Phone Number</label>
                      <input type="text" required class="form-control" style="border:1px solid black;" placeholder="e.g graphics, photoshop" name="phone_number" value="{{$user->phone_number}}">
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label id="text-color" class="form-control-label" >Password</label>
                      <input type="password" required class="form-control" style="border:1px solid black;"  name="password">
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label id="text-color" class="form-control-label">Password Confirm</label>
                      <input type="password" required class="form-control" style="border:1px solid black;" name="password_confirmation">
                  </div>
              </div>
          </div>
          <button type="submit" class="btn btn-lg" style="background-color:  	#191970;color: white">Update</button>
        </form>
        
    </div>
</div>
@endsection
@section('scripts')
@endsection