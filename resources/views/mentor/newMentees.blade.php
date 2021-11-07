@extends('layouts.master')
@section('title')
Mentee Page
@endsection
@section('link')
<link rel="stylesheet" href="{{asset('main.css')}}">
@endsection
<!-- Page content -->
@section('content')
<div class="container">

<h1 id="text-color" class="p2">New Users</h1>
<div>
    <div class="row">
    @foreach($users as $user)
      <div class="col-lg-4">
              <div class="pt-3">
                  <div class="two">
                      <div class="d-flex justify-content-end px-3 pt-1"><i class="mdi mdi-star-outline pr-1 star"></i><i class="mdi mdi-dots-horizontal dot"></i></div>
                      <div class="px-3">
                          <div class="round"><img src="https://img.icons8.com/emoji/48/000000/hedgehog-emoji.png" width="23" class="imgfix" /></div>
                      </div>
                      <div class="px-3 pt-3">
                          <h3 class="name">Names: {{$user->user->fullname()}}</h3>
                          <p class="quote2 p2">Email: {{$user->user->email}}</p>
                          <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#myModal{{$user->id}}">View Questions</button>
                      </div>
                      <div class="d-flex justify-content-between px-3 align-items-center pb-3">
                        <div class="d-flex justify-content-end"> <img src="https://img.icons8.com/bubbles/50/000000/girl-and-playing-card.png" width="20" class="img2" /> <img src="https://img.icons8.com/bubbles/50/000000/short-hair-girl-question-mark.png" width="20" class="img3" /> </div>
                      </div>
                  </div>
          </div>
      </div>

      <div class="modal fade" id="myModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">View</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            @foreach($user->user->answers as $answer)
            <div class="card card-body">
                <div id="text-color" class=""><h5><b>{!! $answer->question->content !!}</b></h5></div>
                <span class="">{{$answer->answer}}</span>
            </div>
            @endforeach
            <form action="/taskers/approve/{{$user->user->id}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Are you sure want approve this mentee ?</label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-lg" style="background-color:  	#191970;color: white">Confirm</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    </div>
</div>

@endsection
@section('scripts')
@endsection