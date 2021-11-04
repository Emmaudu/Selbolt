@extends('master')
@section('title')
Tasks
@endsection
@section('link')
<link rel="stylesheet" href="{{asset('main.css')}}">
@endsection
<!-- Page content -->
@section('content')
<div class="container mt--6">
  <h2 id="text-color">Task Submission</h2>
  <hr>
    <div class="row">
      <div class="col-lg-12">
        <div class="jumbotron" >
          <h6 style="border: 1px;">{!! $task->submission !!}</h6>
        </div>
        <a class="btn btn-sm btn-primary" href="/message/{{$user->custom_id}}" target="_blank"
</div>comment here</a>
      </div>  
    </div>
</div>
@endsection
<script>
  function deadline(Exp, id) {
    console.log(Exp);
    var countDownDate =  Date.parse(Exp);
    console.log(countDownDate);
    var now = <?php echo time() ?> * 1000;

    // Update the count down every 1 second
    var x = setInterval(function() {

        // Get todays date and time
        // 1. JavaScript
        // var now = new Date().getTime();
        // 2. PHP
        now = now + 1000;

        // Find the distance between now an the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Output the result in an element with id="demo"
        document.getElementById("deadline"+id).innerHTML = days + "d " + hours + "h " +
            minutes + "m " + seconds + "s ";
        
        // If the count down is over, write some text 
        if (distance < 0) {
          console.log(distance);
            clearInterval(x);
            console.log(document.getElementById("deadline"+id));
            document.getElementById("form"+id).style.display = "none";
            document.getElementById("deadline"+id).innerHTML = "EXPIRED";
            document.getElementById("deadline"+id).style.color = "red";
        }
    }, 1000);
  }
  
</script>
@section('scripts')
@endsection