<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Mentorship.ng | Services</title>
  <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <link rel="stylesheet" href="{{asset('assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/css/argon.css?v=1.2.0')}}" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
  
  <style>
    .checked {  
        color : orange;  
        font-size : 20px;  
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
    .footer {
      position: fixed;
      left: 0;
      bottom: 0;
      width: 100%;
      color: white;
      text-align: center;
    }
  </style>
</head>

<body class="bg-default">
  <!-- Navbar -->
  <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="dashboard.html">
        Mentorships.ng
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="dashboard.html">
                Mentorships.ng
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
            <a href="dashboard.html" class="nav-link">
              <span class="nav-link-inner--text">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="login.html" class="nav-link">
              <span class="nav-link-inner--text">Login</span>
            </a>
          </li>
          <li class="nav-item">
            <a href="register.html" class="nav-link">
              <span class="nav-link-inner--text">Register</span>
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
  <div class="main-content">
  <span class="secret" style="display: none">{{env('FLW_PUBLIC_KEY')}}</span>
  <div class="row" style="margin-top: 10%;">
    <div class="col-md-3">
      <div class="card">
        <img class="card-img-top" src="{{asset('ronaldo.jpg')}}" alt="Card image">
        <div class="card-body">
        <h4 class="mentor_id" style="display: none">{{$mentors->id}}</h4>
        <h4 class="user_id" style="display: none">{{auth()->user()->id}}</h4>
          <h4 class="card-title">{{$mentors->fullname()}}</h4>
          <p class="card-text">{{$mentors->bio}}</p>
          <a href="#" class="btn btn-primary">See Profile</a>
        </div>
      </div>
    </div>
        <div class="offset-md-2 col-md-6">
              @foreach($mentors->activeServices() as $service)
                <div class="list-group">
                    <div class="list-group mt-2">
                      
                      <a href="#" class="list-group-item list-group-item-action">
                      <input checked type="checkbox" disabled>{{$service->name}}
                      <span style="float: right">{{$service->pivot->price}}</span>
                      </a>
                    </div>
                </div>
                @endforeach
                @foreach($mentors->extraServices() as $service)
                <div class="list-group">
                    <div class="list-group mt-2">
                      
                      <a href="#" class="list-group-item list-group-item-action">
                      <input type="checkbox" onclick="sum('{{$service->id}}')">{{$service->name}}
                      <span style="float: right" id="{{$service->id}}">{{$service->pivot->price}}</span>
                      </a>
                    </div>
                </div>
                @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <span class="subaccountId" style="display: none;">{{$mentors->subaccount_id}}</span>
  <span class="name" style="display: none;">{{auth()->user()->fullname()}}</span>
  <span class="email" style="display: none;">{{auth()->user()->email}}</span>
  <span class="mobile" style="display: none;">{{auth()->user()->mobile}}</span>
  <div class="footer panel panel-default" style="color: black">
    <div style="float: right">
        <label class="total">{{$mentors->price()}}</label>
        <input id="total" value="" style="display: none;" />
        <button type="button" onClick="makePayment()">Pay Now </button>
    </div>
  </div>
  <script>
    function sum(id) {
      $('#'+id).text();
      console.log($('#'+id).text());
      $value = parseInt($('.total').text()) + parseInt($('#'+id).text());
      $('.total').text($value);
      $('#total').text($value);
    }

    function makePayment() {
        FlutterwaveCheckout({
          public_key: $('.secret').text(),
          tx_ref: "hooli-tx-new-test",
          amount: $('.total').text(),
          currency: "NGN",
          payment_options: "card",
          customer: {
            email: $('.email').text(),
            phonenumber: $('.mobile').text(),
            name: $('.name').text(),
          },
          subaccounts: [
            {
            id: $('.subaccountId').text(),
            transaction_charge_type: "flat_subaccount",
            transaction_charge: (0.8 * $('.total').text())
            },
          ],
          callback: function (data) {
            console.log(data);
            axios.post('http://localhost:8001/api/save-payment/details', {
              payment_ref:data.flw_ref,
              amount:data.amount,
              id:$('.mentor_id').text(),
              auth_user:$('.user_id').text(),
            }).then(function(response){
              window.location.href = '/login';
            })
          },
          customizations: {
            title: "MentorShip.ng",
            description: "Payment for mentor",
            logo: "https://assets.piedpiper.com/logo.png",
          },
        });
    }
  </script>
  <script src="{{asset('assets/vendor/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/js-cookie/js.cookie.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
  <script src="{{asset('assets/js/argon.js?v=1.2.0')}}"></script>
</body>

</html>