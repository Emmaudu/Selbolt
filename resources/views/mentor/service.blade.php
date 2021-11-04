<html lang="en">
  <head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('overview.css')}}">
    <link href="{{asset('css/styles12.css')}}" rel="stylesheet" />
    <script src = "https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="icon" href="{{asset('assets/img/brand/favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <style>
      .profile1-dp{
        margin-top: 5%;
        width:100%;
        border-radius:100%;
      }

      #profilementor {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        font-size: 70px;
        text-align: center;
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
    
<body style="background-color: #f8f8ff;">
<span class="secret" style="display: none">{{env('FLW_PUBLIC_KEY')}}</span>
<div class="container bootstrap snippets bootdey">
<div class="row">
<div class="container">
    <div class="profile-nav col-md-3" style="border-radius: 50px;">
        <div class="panel">
          <div class="user-heading round">
            @if($mentors->pic != null)
            <span id="text-color" class="avatar avatar-sm rounded-circle">
            <img alt="Image placeholder" class="profile1-dp" src="{{$mentors->pic}}">
            </span>
            @else
            <span id="profilementor" style="color: white;"></span>
            @endif
              <h1>{{$mentors->fullname()}}</h1>
              <p>{{$mentors->email}}</p>
          </div>
        </div>
        <div>
            <span class="mb-0 text-sm  font-weight-bold" id="firstName" style="display: none;">{{$mentors->first_name}}</span>
            <span class="mb-0 text-sm  font-weight-bold" id="lastName" style="display: none;">{{$mentors->last_name}}</span>
        </div>
    </div>
    <div class="profile-info col-md-9">
        <div class="panel" style="border-radius: 20px;">
            <div class="panel-body bio-graph-info">
              <h1 id="text-color" style="padding-left: 1%">Bio</h1>
              <hr>
          </div>
          <div id="text-color" class ="p4" style="display: flex;padding: 5%">
                {{$mentors->bio}}
          </div>
        </div>
        <div class="panel"  style="border-radius: 20px;">
          <div class="panel-body bio-graph-info">
              <h1 id="text-color" style="padding-left: 1%">Bio Graph</h1>
              <hr>
              <div class="row" style="padding: 5%">
                  <div class="bio-row">
                      <p><span id="text-color">First Name </span>: {{$mentors->first_name}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Last Name </span>: {{$mentors->last_name}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Country </span>: Australia</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Phone </span>: {{$mentors->mobile}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Company </span>: {{$mentors->company_name}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Phone </span>: {{$mentors->job_title}}</p>
                  </div>
              </div>
          </div>
      </div>
      <div>
          
          <div class="row" style="margin-bottom: 10px;">
          <div class="col-lg-6">
                <div class="list-group">
                @foreach($mentors->activeServices() as $service)
                    <div class="list-group mt-2">
                      <span class="list-group-item list-group-item-action">
                        <input value="{{$service->name}}" checked type="checkbox" id="service{{$service->id}}" onclick="sum('{{$service->id}}')">{{$service->name}}
                        <span style="float: right" id="{{$service->id}}">{{$service->pivot->price}}</span>
                      </span>
                    </div>
                @endforeach
                @foreach($mentors->extraServices() as $service)
                    <div class="list-group mt-2">
                      <span class="list-group-item list-group-item-action">
                      <input value="{{$service->name}}" type="checkbox" id="service{{$service->id}}" onclick="sum('{{$service->id}}')">{{$service->name}}
                      <span style="float: right" id="{{$service->id}}">{{$service->pivot->price}}</span>
                  </span>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="col-lg-6">
            <span class="subaccount_id" style="display: none;">{{$mentors->subaccount_id}}</span>
            <span class="name" style="display: none;">{{auth()->user()->fullname()}}</span>
            <span class="email" style="display: none;">{{auth()->user()->email}}</span>
            <span class="mobile" style="display: none;">{{auth()->user()->mobile}}</span>

          </div>
      </div>
      <div class="row mb-5">
        <div class="col-md-12">
          <div style="float: right">
                    <h3><b>$</b><label class="total">{{$mentors->price()}}</label></h3>
                    <input id="total" value="" style="display: none;" />
                  <button class="btn btn-primary btn-lg btn-block" type="button" onClick="makePayment()">Pay Now </button>
              </div>
            </div>
        </div>
      </div>
      
  </div>
</div>
</div>
</div>
 </body>
 <script src="https://checkout.flutterwave.com/v3.js"></script>
 <script>
        $(document).ready(function() {
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
    <script>
    const subaccount_id = $(".subaccount_id").text()
    function sum(id) {
      var searchIDs = $('input:checked').map(function(){
      return $(this).val();
    });

    var services = searchIDs.get();
    console.log(services);
      console.log($('#service'+id+':checked'));
      console.log($('#service'+id+':checked'));
        if($('#service'+id).is(":checked")) {
          $value = parseInt($('.total').text()) + parseInt($('#'+id).text());
          $('.total').text($value);
          $('#total').text($value);
          }else{
          $value = parseInt($('.total').text()) - parseInt($('#'+id).text());
          $('.total').text($value);
          $('#total').text($value);
        }
    }
    var searchIDs = $('input:checked').map(function(){
      return $(this).val();
    });

    var services = searchIDs.toArray();

    function makePayment() {
        FlutterwaveCheckout({
          public_key: $('.secret').text(),
          tx_ref: "pay-mentor",
          amount: $('.total').text(),
          currency: "USD",
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
            axios.post('/pending-transaction/flutterwave', {
                flw_ref: data.flw_ref,
                status: 'pending',
                customer_email: data.customer.email,
                transaction_id: data.transaction_id,
                subaccount_id: subaccount_id,
                amount: data.amount,
                tx_ref: data.tx_ref,
                services: services
            }).then(function($data){
                window.location.href = '/mentee/dashboard';
            }).catch(function($data){
                window.location.href = '/mentee/dashboard';
            });
          },
          customizations: {
            title: "MentorShip.ng",
            description: "Payment for mentor",
            logo: "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse1.mm.bing.net%2Fth%3Fid%3DOIP.cvYs4BjNBrUjbdvC5KVePQHaEo%26pid%3DApi&f=1",
          },
        });
    }
  </script>
</html>