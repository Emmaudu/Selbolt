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
  <h1 id="text-color">My Tasks</h1>
    @if(!$tasks->isEmpty())
    <div class="row">
      @foreach($tasks as $task)
          <div class="col-lg-4 col-md-6">
              <div class="pt-3">
                  <div class="two">
                      <div class="d-flex justify-content-end px-3 pt-1"><i class="mdi mdi-star-outline pr-1 star"></i><i class="mdi mdi-dots-horizontal dot"></i></div>
                      <div class="px-3">
                          <div class="round"><img src="https://img.icons8.com/emoji/48/000000/hedgehog-emoji.png" width="23" class="imgfix" /></div>
                      </div>
                      <div class="px-3 pt-3">
                          <h3 class="name">{{$task->title}}</h3>
                          <p class="quote2 p2">Mentor: {{$task->mentors->fullname()}}</p>
                      </div>
                      <div class="d-flex justify-content-start px-3 align-items-center"> <i class="mdi mdi-view-comfy task"></i> <span class="quote2 pl-2">Task: Commercial project</span> </div>
                      <div class="d-flex justify-content-between px-3 align-items-center pb-3">
                          <div class="d-flex justify-content-start align-items-center"> <i class="mdi mdi-calendar-clock date"></i> <span class="quote2 pl-2">{{$task->expiry_date}}</span> </div>
                          <div class="d-flex justify-content-start align-items-center">
                            <button data-toggle="modal" onclick="deadline('{{$task->expiry_date}}', '{{$task->id}}')" data-target="#myModal{{$task->id}}" class="btn"  style="background-color: #191970;color: white">View Details</button>
                          </div>
                        <div class="d-flex justify-content-end"> <img src="https://img.icons8.com/bubbles/50/000000/girl-and-playing-card.png" width="20" class="img2" /> <img src="https://img.icons8.com/bubbles/50/000000/short-hair-girl-question-mark.png" width="20" class="img3" /> </div>
                      </div>
                  </div>
          </div>
        <div class="modal fade" id="myModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        
      <div class="modal-dialog modal-lg" style="margin: 10vh auto 0px auto" role="document">
        <div class="modal-content mt-5">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Todo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <span id="deadline{{$task->id}}" style="float: right;color: green"></span>
            <div class="p2">{!! $task->todo !!}</div>
            <form action="{{route('mentee.submit-task')}}" class="mt-2" id="form{{$task->id}}" method="post">
            @csrf
              <input name="id" value="{{$task->id}}" type="text" style="display: none;">
              <div class="form-group">
                <textarea class="summernote" type="text" name="content"></textarea>
              </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>
      </div>
      
    @endforeach
      </div>
    @else
        <div class="card mt-3">
            <div class="card-header">
                <p>No task yet!</p>
            </div>
        </div>
    @endif
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