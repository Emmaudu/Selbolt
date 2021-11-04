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
        height:70%;
      }

      #profilementor {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #512DA8;
        font-size: 25px;
        text-align: center;
      }

      .profile-dp{
      margin-top: 5%;
      width:100%;
      border-radius:50%;
      height:70%;
      border-style: solid;
      border-width: thin;
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

      .p4{
        font-family: "Bookman", "URW Bookman L", "serif";
      }

      .p5{
        font-family: "Didot", "serif";
      }

      .p2 {
        font-family: Arial, Helvetica, sans-serif;
      }

    </style>
  </head>
  <body style="background-color: #f8f8ff;">
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
				<div class="p-4">
		  		<h3><a href="{{route('mentor.dashboard')}}" class="logo" style="color: whitesmoke;text-decoration: none">Mentorship.ng</a></h3>
          <ul class="list-unstyled">
            <li class="nav-item dropdown">
              
                  <span id="profilementor" style="color: white;"></span>
                  
                  <div class="media-body  ml-2  d-none d-lg-block">
                    </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right">
                <div>
                  <form action="{{route('mentor-pic')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input class="form-control" type="file" name="profilepic" required>
                    <input class="form-control btn btn-sm" style="background-color: #191970;color: white;" type="submit" value="Submit">
                  </form>
                </div>
                </a>
              </div>
            </li>
          </ul>
          <ul class="list-unstyled components mb-5">
            <li>
              <a href="{{route('admin.dashboard')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Dashboard
              </a>
            </li>
            <li>
              <a href="{{route('admin.mentors')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Mentors
              </a>
            </li>
            <li>
              <a href="{{route('admin.users')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Mentee
              </a>
            </li>
            <li>
              <a href="{{route('admin.deactivated.mentors')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Deactivated Mentors
              </a>
            </li>
            <li>
              <a href="{{route('admin.deactivated.users')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Deactivated Mentees
              </a>
            </li>
            <li>
              <a href="{{route('admin.mentors-reg')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>New List
              </a>
            </li>
            <li>
              <a href="#">
                <span class="fa fa-user mr-3 nav-link-text"></span>Chat
              </a>
            </li>
            @auth
            <li>
              <a href="{{route('logout-admin')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Logout
              </a>
            </li>
            @else
            <li>
              <a href="{{route('login-admin')}}">
                <span class="fa fa-user mr-3 nav-link-text"></span>Login
              </a>
            </li>
            @endauth
	        </ul>
    	</nav>

        <div id="content" class="p-4 p-md-5 pt-5" style="width: 100%;height: 100vh;">
            @yield('content')
		    </div>
      @yield('scripts')
      <script>
        $(document).ready(function() {
          $('#summernote').summernote({
              tabsize: 2,
              height: 120,
              toolbar: [
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                ['insert', ['link']],
              ]
            });
          
          function summer(id) {
            $('#'+id).summernote({
              tabsize: 2,
              height: 120,
              toolbar: [
                ['font', ['bold', 'underline']],
                ['color', ['color']],
                ['insert', ['link']],
                ['view', ['fullscreen']]
              ]
            });

            $('#question'+id).summernote({
              tabsize: 2,
              height: 120,
              toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
              ]
            });

          }

          $('.nav-tabs a').click(function(){
            $(this).tab('show');
        });

          var storename = $('#firstName').text();
          var first = $('#firstName').text().charAt(0);
          var last = $('#lastName').text().charAt(0);
          var str = first + last; 
          var profile = $('#profilementor').text(str);
            
        });
      </script>
      
    <script src="{{asset('js/js/popper.js')}}"></script>
    <script src="{{asset('js/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/js/main.js')}}"></script>
 </body>
</html>