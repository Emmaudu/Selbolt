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
    <style>
      .profile1-dp{
        margin-top: 5%;
        width:100%;
        border-radius:100%;
        height:25%;
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
<div class="container bootstrap snippets bootdey">
<div class="row">
<div class="container">
    <div class="profile-nav col-md-3" style="border-radius: 50px;">
        <div class="panel">
          <div class="user-heading round">
        
            
              <h1>{{$mentor->fullname()}}</h1>
              <p>{{$mentor->email}}</p>
          </div>
        </div>
        <div>
            <span class="mb-0 text-sm  font-weight-bold" id="firstName" style="display: none;">{{$mentor->first_name}}</span>
            <span class="mb-0 text-sm  font-weight-bold" id="lastName" style="display: none;">{{$mentor->last_name}}</span>
        </div>
    </div>
    <div class="profile-info col-md-9">
        <div class="panel" style="border-radius: 20px;">
            <div class="panel-body bio-graph-info">
              <h1 id="text-color" style="padding-left: 1%">Bio</h1>
              <hr>
          </div>
          <div id="text-color" class ="p4" style="display: flex;justify-content: center;padding: 5%">
                {{$mentor->bio}}
          </div>
        </div>
        <div class="panel"  style="border-radius: 20px;">
          <div class="panel-body bio-graph-info">
              <h1 id="text-color" style="padding-left: 1%">Bio Graph</h1>
              <hr>
              <div class="row" style="padding: 5%">
                  <div class="bio-row">
                      <p><span id="text-color">First Name </span>: {{$mentor->first_name}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Last Name </span>: {{$mentor->last_name}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Country </span>: Australia</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Phone </span>: {{$mentor->mobile}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Company </span>: {{$mentor->company_name}}</p>
                  </div>
                  <div class="bio-row">
                      <p><span id="text-color">Phone </span>: {{$mentor->job_title}}</p>
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
                      
                      <input checked type="checkbox" disabled>{{$service->name}}
                      <span style="float: right">{{$service->pivot->price}}</span>
                    </div>
                @endforeach
                @foreach($mentors->extraServices() as $service)
                
                    <div class="list-group mt-2">
                      
                      <span href="#" class="list-group-item list-group-item-action">
                      <input type="checkbox" id="service{{$service->id}}" onclick="sum('{{$service->id}}')">{{$service->name}}
                      <span style="float: right" id="{{$service->id}}">{{$service->pivot->price}}</span>
                  </span>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="col-lg-6">
            <span class="subaccountId" style="display: none;">{{$mentors->subaccount_id}}</span>
            <span class="name" style="display: none;">{{$mentors->fullname()}}</span>
            <span class="email" style="display: none;">{{$mentors->email}}</span>
            <span class="mobile" style="display: none;">{{$mentors->mobile}}</span>
            <div style="float: right">
                    <label class="total">{{$mentors->price()}}</label>
                    <input id="total" value="" style="display: none;" />
                    <button type="button" onClick="makePayment()">Pay Now </button>
                </div>
            </div>
          </div>
      </div>
  </div>
</div>
</div>
</div>
 </body>
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

            function sum(id) {
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
            
        });
      </script>
</html>