<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title')</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="{{asset('css/styles12.css')}}" rel="stylesheet" />
        <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Mentorship</div>
                <div class="list-group list-group-flush">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="btn btn-default btn-block" href="{{route('mentor.dashboard')}}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text"><i class="	glyphicon glyphicon-th"></i>Dashboard</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-default btn-block" href="{{route('mentor.profile-page')}}">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text"><i class="glyphicon glyphicon-user"></i>Profile</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-default btn-block" href="{{route('mentor.mentees')}}">
                            <i class="ni ni-circle-08 text-pink"></i>
                            <span class="nav-link-text"><i class="glyphicon glyphicon-user"></i>Mentees</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-default btn-block" href="{{route('mentor.questions')}}">
                            <i class="ni ni-circle-08 text-pink"></i>
                            <span class="nav-link-text"><i class="glyphicon glyphicon-user"></i>Questions</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-default btn-block" href="#">
                            <i class="ni ni-circle-08 text-pink"></i>
                            <span class="nav-link-text"><i class="glyphicon glyphicon-user"></i>Chat</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-default btn-block" href="{{route('mentor.payment-mode')}}">
                            <i class="ni ni-circle-08 text-pink"></i>
                            <span class="nav-link-text"><i class="glyphicon glyphicon-user"></i>Payment Mode</span>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="btn btn-default btn-block" href="#">
                            <i class="ni ni-circle-08 text-pink"></i>
                            <span class="nav-link-text"><i class="glyphicon glyphicon-user"></i>Transaction</span>
                          </a>
                        </li>
                        @auth
                        <li class="nav-item">
                          <a class="btn btn-default btn-block" href="{{route('mentor.logout')}}">
                            <i class="ni ni-key-25 text-info"></i>
                            <span class="nav-link-text"><i class="glyphicon glyphicon-user"></i>Logout</span>
                          </a>
                        </li>
                        @else
                        <li class="nav-item">
                          <a class="btn btn-default btn-block" href="{{route('login.mentor')}}">
                            <i class="ni ni-key-25 text-info"></i>

                            <span class="nav-link-text"><i class="glyphicon glyphicon-user"></i>Login</span>
                          </a>
                        </li>
                        @endauth
                      </ul>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                                <li class="nav-item dropdown">
                                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <div class="media align-items-center">
                                      <span class="">
                                        <img alt="Image placeholder" class="profile-dp" src="">
                                      </span>
                                      <div class="media-body  ml-2  d-none d-lg-block">
                                        <span class="mb-0 text-sm font-weight-bold">{{auth()->user()->fullname()}}</span>
                                      </div>
                                    </div>
                                  </a>
                                  <div class="dropdown-menu  dropdown-menu-right ">
                                    <div class="dropdown-header noti-title">
                                      <h6 class="text-overflow m-0">Welcome!</h6>
                                    </div>
                                    <a href="#!" class="dropdown-item">
                                      <i class="ni ni-single-02"></i>
                                      <span>My profile</span>
                                    </a>
                                    <a href="#!" class="dropdown-item">
                                      <i class="ni ni-settings-gear-65"></i>
                                      <span>Settings</span>
                                    </a>
                                    <a href="#!" class="dropdown-item">
                                      <i class="ni ni-calendar-grid-58"></i>
                                      <span>Activity</span>
                                    </a>
                                    <a href="#!" class="dropdown-item">
                                      <i class="ni ni-support-16"></i>
                                      <span>Support</span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a href="#!" class="dropdown-item">
                                      <i class="ni ni-user-run"></i>
                                      <span>Logout</span>
                                    </a>
                                  </div>
                                </li>
                              </ul>
                        </div>
                    </div>
                </nav>
                @yield('content')
              @yield('scripts')
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="{{asset('js/scripts12.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
        <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script> 
    </body>
</html>
