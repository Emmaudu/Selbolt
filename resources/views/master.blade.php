<!doctype html>
<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/css/style.css')}}">
    <script src = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    @yield('link')
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    
    <style>
      .profile1-dp{
        margin-top: 5%;
        width:25%;
        border-radius:50%;
      }
      #profile {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #512DA8;
        font-size: 25px;
        text-align: center;
      }
      #noprofile {
      float: center;margin: auto;margin-top: 20px;line-height: 150px;color: white; width:50%; border-radius: 50%; background: #512DA8; font-size: 25px; text-align: center;
    }

      #text-color{
        color: #191970
      }
      .p3 {
        font-family: "Lucida Console", "Courier New", monospace;
      }

      .p2 {
        font-family: Arial, Helvetica, sans-serif;
      }

    </style>
  </head>
  <body style="background-color: #f8f8ff;">
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active" style="background-color: #C124BB;">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h3><a href="{{route('mentee.dashboard')}}" class="logo" style="color: whitesmoke;text-decoration: none">Mentorship.ng</a></h3>
          <ul class="list-unstyled">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  @if(auth()->user()->pic != null)
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" class="profile1-dp" src="{{auth()->user()->pic}}">
                  </span>
                  @else
                  <span id="profile" style="color: white;"></span>
                  @endif
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold" id="firstName" style="display: none;">{{auth()->user()->first_name}}</span>
                    <span class="mb-0 text-sm  font-weight-bold" id="lastName" style="display: none;">{{auth()->user()->last_name}}</span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right">
                <div>
                  <form action="{{route('pic')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="file" name="file" required>
                    <input class="form-control btn btn-sm" style="background-color: #191970;color: white;" type="submit" value="Submit">
                  </form>
                </div>
                </a>
              </div>
            </li>
          </ul>
	        <ul class="list-unstyled components mb-5">
            <li>
              <a href="{{route('mentee.dashboard')}}">
                
                <span class="fa fa-user mr-3 nav-link-text"></span>Dashboard
              </a>
            </li>
            <li>
              <a href="{{route('mentee.profile')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Profile
              </a>
            </li>
            <li>
              <a href="{{route('mentee.tasks')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Tasks
              </a>
            </li>
            <li>
              <a href="{{route('mentee.mentorship')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Mentorship
              </a>
            </li>
            <li>
              <a href="{{route('mentors')}}">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="fa fa-user mr-3 nav-link-text"></span>Browse Mentors
              </a>
            </li>
            @auth
            <li>
              <a href="{{route('mentee.logout')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Logout
              </a>
            </li>
            @else
            <li>
              <a href="{{route('login.mentor')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Login
              </a>
            </li>
            @endauth
	        </ul>
	      </div>
    	</nav>
        <div id="content" class="p-4 p-md-5 pt-5" style="width: 100%;height: 100%vh;">
            @yield('content')
          </div>
		  </div>
      @yield('scripts')
      <script>
        $(document).ready(function() {
            $('.summernote').summernote({
            tabsize: 2,
            height: 120,
            toolbar: [
              ['font', ['bold', 'underline']],
              ['color', ['color']],
              ['insert', ['link', 'picture']],
            ]
          });
          var storename = $('#firstName').text();
          var first = $('#firstName').text().charAt(0);
          var last = $('#lastName').text().charAt(0);
          var str = first + last; 
          var profile = $('#profile').text(str);
        });
  
      </script>
      
    <script src="{{asset('js/js/popper.js')}}"></script>
    <script src="{{asset('js/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/js/main.js')}}"></script>
 </body>

</html>