@extends('auth.authlayout')
@section('title')
Selbolt | User | Register
@endsection
@section("custom_css")

<link href="{{asset('backend/assets/build/css/intlTelInput.css')}}" rel="stylesheet" type="text/css" />

@stop

@section('content')
<nav id="navbar-main" style="background-color: #C124BB;" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand text-white" href="#">
        Selbolt
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">
              <span class="nav-link-inner--text text-white">Register as Mentee</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('register-mentor')}}" class="nav-link">
              <span class="nav-link-inner--text text-white">Register as Mentor</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
</nav>
<div class="container-fluid">
    <div class="row ">
        <div class="col-lg-6 bg-white">
            <div class=" m-h-100">
                <div class="account-pages pt-5">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 p-5">
                                        <div class="mx-auto mb-5">
                                            <a href="{{ url('/') }}">
                                                <img src="{{ ('/frontend/assets/images/fulllogo.png') }}" alt=""
                                                    height="auto" /> </a>
                                        </div>

                                            @if(Session::has('message'))
                                            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('message') }}</p>
                                            @endif

                                            @if ($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif


                                        <form action="{{route('register')}}" class="authentication-form" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">First Name</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Name" type="text" name="first_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Last Name</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="user"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Last name" type="text" name="last_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Email Address</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Email" type="email" name="email">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Phone Number</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="phone"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Phone Number" type="text" name="phone_number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="Password" type="password" name="password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label id="text-color" class="form-control-label">Confirm Password</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                      <span class="input-group-text">
                                                          <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input required class="form-control" placeholder="confirm password" type="password" name="password_confirmation">
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-block" style="background-color: #C124BB;" type="submit"> Sign up
                                                </button>
                                            </div>
                                        </form>
                                        <div class="py-3 text-center"><span
                                                class="font-size-16 font-weight-bold">Or</span></div>
                                        <div class="row">
                                            <div class="col-6">
                                                <a href="{{route('register-mentor')}}" class="btn btn-white"><small>Signup as a mentor</small></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Login <a href="{{route('login-mentee')}}"
                                        class="text-primary font-weight-bold ml-1">here</a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                    <!-- end row -->
                    <!-- end container -->
                </div>
                <!-- end page -->


            </div>
        </div>
        <div class="col-lg-6 d-none d-md-block bg-cover"
            style="background-image: url(/backend/assets/images/login.svg);">

        </div>
    </div>
</div>

@endsection


@section("javascript")
<script src="{{asset('backend/assets/build/js/intlTelInput.js')}}"></script>
<script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
        // any initialisation options go here
    });
</script>


@stop
