<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Selbolt</title>
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
        color: #C124BB
      }
    .unchecked {
        font-size : 20px;  
    }
    .profile-dp{
      margin-top: 5%;
      width:100%;
      border-radius:50%;
      height:70%;
      border-style: solid;
      border-width: thin;
    }
    .p3 {
        font-family: "Lucida Console", "Courier New", monospace;
      }
    .p2 {
      font-family: Arial, Helvetica, sans-serif;
    }
    #noprofile {
      float: center;margin: auto;margin-top: 20px;line-height: 150px;color: white; width:50%; border-radius: 50%; background: #512DA8; font-size: 25px; text-align: center;
    }
  </style>
</head>

<body class="bg" style="background-color: #f8f8ff;">
  <!-- Navbar -->
  <nav id="navbar-main" style="background-color: #C124BB;position: fixed" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        Selbolt
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="#">
                Selbolt
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
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="/taskers" class="nav-link">
              <span class="nav-link-inner--text">BrowserTasker</span>
            </a>
          </li>
        </ul>
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
  r -->
  <div class="container ">
    <h2 class="mt-5 pt-5">Please answer the following questions</h2>
    <form action="/overview/pay/approve" method="POST" class="mb-5">
    @csrf
      @if(!$questions->isEmpty())
        @foreach ($questions as $question)
        <div class="form-group">
            <label id="text-color" class="form-control-label">{!! $question->content !!}</label>
            <div class="input-group input-group-merge">
                <textarea required class="form-control" name="answers[{{$question->id}}][]"></textarea>
            </div>
        </div>
        @endforeach
      @else
      <div class="form-group">
            <label id="text-color" class="form-control-label">Introduce yourself and briefly explain what you expect from this tasker ?</label>
            <div class="input-group input-group-merge">
              <input type="hidden" value="Introduce yourself and briefly explain what you expect from this tasker ?" name="question" />
                <textarea required class="form-control" name="answer"></textarea>
            </div>
        </div>
      @endif
        <input type="submit" class="btn btn-success btn-block" value="Apply Now">
    </form>
    
  </div>
 <!-- <footer class="mt-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; 2020 <a href="#" class="font-weight-bold ml-1" target="_blank">Mentorship.ng</a>
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
  </footer> -->
  <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>
