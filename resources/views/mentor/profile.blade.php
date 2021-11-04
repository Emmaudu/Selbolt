@extends('layouts.master')
@section('title')
Profile Page
@endsection

@section('link')
@endsection
<!-- Page content -->
@section('content')
<div class="container mt--6">
  <div class="row">
    <div class="col-xl-10 col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <h3 class="mb-0">Edit profile </h3>
            </div>
          </div>
          </div>
          @if($message = Session::get('success'))
            <div class ='alert alert-success' style = "margin-bottom:8px">{{$message}}</div>
          @endif
        <div class="card-body">
          <form action="{{route('update.mentor.profile')}}" method="post">
            @csrf
            <h6 class="heading-small text-muted mb-4">User information</h6>
            @if($message = Session::get('personal-profile-error'))
              @if ($errors->any())
                <ul style = "margin-bottom:10px">
                @foreach ($errors->all() as $error)
                    <li class ='text-danger' style = "color:red;margin-bottom:8px">{{$error}}</li>
                @endforeach
                </ul>
              @endif
            @endif
            <div class="pl-lg-4">
              <div class="mt-3 mb-3">
                <span>Payment Link: </span><input disabled type="text" value="http://localhost:8001/mentors/{{$user->id}}/service" id="text-to-copy" />
                
                <span id="copied-text" style="display: none;">Copied!</span>
              </div>

              <div class="mt-3 mb-3">
                <span>Profile Url: <input value="http://localhost:8001/overview/{{$user->username}}" disabled/> </span>
              </div>
            
            <div class="row">
                
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">First Name</label>
                        <input type="text" required id="input-username" class="form-control" style="border:1px solid black;" name="first_name" placeholder="first name" value="{{$user->first_name}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label">Last name</label>
                        <input type="text" required class="form-control" style="border:1px solid black;" name="last_name" value="{{$user->last_name}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" >Email address</label>
                        <input type="email" class="form-control" style="border:1px solid black;" name="email_address" value="{{$user->email}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label">Tag</label>
                       
                        <input type="text" required class="form-control" style="border:1px solid black;" placeholder="e.g graphics, photoshop" name="tag" value="{{implode(', ',json_decode($user->tag))}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-control-label" >Bio</label>
                    <textarea class="form-control" style="border:1px solid black;" rows="8"  name="bio" value="">{{$user->bio}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label" >Career Success</label>
                        <textarea class="form-control" style="border:1px solid black;" rows="8" cols="5" style="width:500px !important;height:250px !important;"  name="career_success" value="">{{$user->career_success}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" >Twitter</label>
                        <input type="text" required class="form-control" style="border:1px solid black;" placeholder="twitter handle"  name="social[]" value="{{json_decode($user->social)[0]}}">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label">Linkedin</label>
                        <input type="text" required class="form-control" style="border:1px solid black;" placeholder="linkedin link" name="social[]" value="{{json_decode($user->social)[1]}}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label" >Password</label>
                        <input type="password" required class="form-control" style="border:1px solid black;"  name="password">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-control-label">Password Confirm</label>
                        <input type="password" required class="form-control" style="border:1px solid black;" name="password_confirmation">
                    </div>
                </div>
            </div>
            <button type="submit" style="background-color:  	#191970;color: white" class="btn btn-lg">Update</button>
          </form>
          <form method="post" action="{{route('update.mentor.company-profile')}}">
          @csrf
            @if($errorMessage = Session::get('company-profile-error'))
              @if ($errors->any())
                <ul style = "margin-bottom:10px">
                  @foreach ($errors->all() as $error)
                    <li class ='text-danger' style = "color:red;margin-bottom:8px">{{$error}}</li>
                  @endforeach
                </ul>
              @endif
            @endif
              <hr class="my-4" />
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Company information</h6>
              <div class="pl-lg-4">
              <div class="row">
                  <div class="col-lg-12">
                  <div class="form-group">
                      <label class="form-control-label" for="input-address">Company Name</label>
                      <input id="input-address" class="form-control" style="border:1px solid black;" placeholder="Company Name" name="company_name" value="{{$user->company_name}}" type="text">
                  </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12">
                      <div class="form-group">
                          <label class="form-control-label">Job title</label>
                          <input type="text" required class="form-control" style="border:1px solid black;" placeholder="Job title"  name="job_title" value="{{$user->job_title}}">
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label class="form-control-label">Category</label>
                          <select class="custom-select" name="category">
                          <option selected disabled>Open this select menu</option>
                              @foreach($categories as $category)
                                @if($category->id == $user->category_id)
                                  <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                @else
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <div class="form-group">
                          <label class="form-control-label">Educational Level</label>
                          <select class="form-control" style="border:1px solid black;" name="level">
                              <option selected disabled>Highest Educational Level</option>
                              <option>None/Other</option>
                              <option>Dropout</option>
                              <option>Bachelor</option>
                              <option>Master</option>
                              <option>Phd</option>
                          </select>
                      </div>
                  </div>
              </div>
              <button type="submit" style="background-color:  	#191970;color: white" class="btn btn-lg">Update</button>
          </form>
        </div>
          <!-- services prices -->
          <hr class="my-4" />
          <!-- Address -->
          <h6 class="heading-small text-muted mb-4">Services</h6>
          <div class="pl-lg-4">
          <div class="row">
              <div class="col-lg-6">
                <form method="post" action="{{route('update.mentor.company-service')}}">
                @if($errorMessage = Session::get('mentor-service'))
                    @if ($errors->any())
                      <ul style = "margin-top:10px">
                        @foreach ($errors->all() as $error)
                          <li class ='text-danger' style = "color:red;margin-bottom:8px">{{$error}}</li>
                        @endforeach
                      </ul>
                    @endif
                  @endif
                @csrf
                @foreach($services as $service)
                  @if($service->status == "general")
                  <small class="text-sm">Required</small>
                  <div class="form-group">
                      <label id="text-color" class="form-control-label">{{$service->name}}</label>
                      <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="icon-dual" data-feather="phone"></i>
                              </span>
                          </div>
                          <input required class="form-control" value="{{$service->pivot->price}}" type="text" name="services[]">
                      </div>
                  </div>
                  @else
                  <small class="text-sm">Not required</small>
                  <div class="form-group">
                      <label id="text-color" class="label">{{$service->name}}</label>
                      <div class="input-group input-group-merge">
                          <div class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="icon-dual" data-feather="phone"></i>
                              </span>
                          </div>
                          <input class="form-control" type="text" value="{{$service->pivot->price}}" name="services[]">
                      </div>
                  </div>
                  @endif
                @endforeach
                    <button type="submit" style="background-color:  	#191970;color: white" class="btn btn-lg" >Update</button>
                  </form>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script>
  document.getElementById('copy-text').addEventListener('click', function(e){
    // Click event
    document.getElementById('text-to-copy').select();
    var copied;
  
    try
    {
        // Copy the text
        copied = document.execCommand('copy');
    } 
    catch (ex)
    {
        copied = false;  
    }
    
    if(copied)
    {
      // Display the copied text message
      document.getElementById('copied-text').style.display = 'block';    
    }

});

</script>
@endsection