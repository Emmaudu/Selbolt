<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Selbolt | BrowserTasker</title>
  <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">
  <style>
    .checked {  
        color : orange;  
        font-size : 20px;  
    }  
    #text-color{
        color: #191970
      }
    .unchecked {
        font-size : 20px;  
    }
    .profile-dp{
      margin-top: 5%;
      width:100%;
      border-radius:50%;
    }
    .p3 {
        font-family: "Lucida Console", "Courier New", monospace;
      }
    .p2 {
      font-family: Arial, Helvetica, sans-serif;
    }
    #noprofile {
      float: center;margin: auto;margin-top: 20px;line-height: 150px;color: white; width:50%; border-radius: 50%; background: #C124BB; font-size: 25px; text-align: center;
    }
  </style>
</head>

<body class="bg" style="background-color: #f8f8ff;">
  <!-- Navbar -->
  <nav id="navbar-main" style="background-color: #C124BB;position: fixed" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand text-white" href="#">
        <h1 class="text-white">Selbolt</h1>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a class="text-white" href="#">
                <h1 class="text-white">Selbolt</h1>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        @auth()
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{route('mentee.dashboard')}}""" class="nav-link">
              <span class="nav-link-inner--text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">
              <span class="nav-link-inner--text">Register as Mentee</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('register-mentor')}}" class="nav-link">
              <span class="nav-link-inner--text">Register as Mentor</span>
            </a>
          </li>
        </ul>
        @else
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{route('login-mentee')}}" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('register')}}" class="nav-link">
              <span class="nav-link-inner--text">Register as Mentee</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('register-mentor')}}" class="nav-link">
              <span class="nav-link-inner--text">Register as Mentor</span>
            </a>
          </li>
        </ul>
        @endauth
        <hr class="d-lg-none" />
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Like us on Facebook">
              <i class="fab fa-facebook-square"></i>
              <span class="nav-link-inner--text d-lg-none">Facebook</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Instagram">
              <i class="fab fa-instagram"></i>
              <span class="nav-link-inner--text d-lg-none">Instagram</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" data-original-title="Follow us on Twitter">
              <i class="fab fa-twitter-square"></i>
              <span class="nav-link-inner--text d-lg-none">Twitter</span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">
    <div class="container">
      <!-- SEARCH -->
      <form method="get"action="{{route('search.mentor')}}" style="margin-top: 100px;">
        @csrf
        <h2>Search Taskers</h2>
        <div class="row">
            <div class="col">
                <label class="label text-black">Search by name</label>
                <input type="text" class="form-control" placeholder="search by mentors name" name="name">
            </div>

            <div class="col">
                <label class="label text-black">Select Category</label>
                <select class="custom-select" name="category">
                <option selected disabled>Open this select menu</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <label class="label text-black">Search by tag</label>
                <input type="text" class="form-control" placeholder="search by mentors name" name="tag">
            </div>
            <div class="col">
                <label class="label text-black">Search by price</label>
                <input type="number" class="form-control" placeholder="search by price" name="price">
            </div>
        </div>

        <input class="btn text-black mt-3" type="submit" style="background-color: #C124BB;color: white" value="Search" />
      </form>
      <!-- Page content -->
    </div>
  </div>

  <div class="container">
    <!--sign up -->
      <div>
        <a href="{{route('register')}}" type="button" style="margin-top: 10%;" class="btn text-white btn-lg btn-block">Sign up</a>
      </div>
      
      @foreach($mentors as $mentor)
      @php
        $y = 5
      @endphp
      <div class="card mt-3 mb-3">
        <div class="container row">
            <div class="col-md-4">
              @if ($mentor->pic != null)
                <img class="profile-dp" src="{{$mentor->pic}}" alt="Card image cap" />
              @else
                <div id="noprofile">{{substr($mentor->first_name, 0, 1)}}{{substr($mentor->last_name, 0, 1)}}</div>
              @endif
              <div class="mt-3" style="float: center;text-align: center">
              @for ($i = 0; $i < $mentor->custom_reviews; $i++)
                <span style="display: none;">{{$y--}}</span>
                <span class = "fa fa-star checked"></span>
              @endfor
              @for ($i = 0; $i < $y; $i++)
              <span class = "fa fa-star unchecked"></span>
              @endfor
              </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h3 class="card-title p4" id="text-color"><a href="/overview/{{$mentor->username}}" id="text-color" target="_blank"> <b>{{$mentor->fullname()}}
                    <img width="10%" src="https://www.countryflagicons.com/SHINY/64/{{$mentor->country}}.png" />
                </b></a></h3>
                    <h3 class="card-title p2" id="text-color">{{$mentor->job_title}} at <b>{{$mentor->company_name}}</b></h3>
                    <hr>
                    <div class="row">
                        @foreach($mentor->activeServices() as $service)
                        <div class="col-md-12 col-sm-12 col-xs-12">
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
            <div class="col-md-2">
                <div class="card-body">
                    <a href="{{route('service.mentor', ['id' => $mentor->id])}}" style="background-color: #C124BB;color: white" class="btn ">Apply now</a>    
                </div>
            </div>
        </div>
        <div class="container row"> 
          <div class="col-lg-4 col-md-6">
            <div class="card-body">
              <h1 class="p3"><b>${{$mentor->price()}}</b></h1>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="card-body">
              <a href="/overview/{{$mentor->username}}" class="btn btn-block ">View Profile</a>
            </div>
          </div>
          <div class="offset-lg-4"></div>
        </div>
      </div>
      @endforeach
  </div>
  <!-- Footer -->

  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">Selbolt</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link" target="_blank"></a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>