@extends('layouts.master')
@section('title')
User Page
@endsection
@section('link')
<link rel="stylesheet" href="{{asset('main.css')}}">
@endsection
<!-- Page content -->
@section('content')
<div class="container">
<h1 id="text-color" class="p2">Users</h1>
<i id="text-color">click the box to view user details</i>
<nav class="mb-3 mt-3">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" style="margin: auto;" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Active Mentees</a>
    <a class="nav-item nav-link" style="margin: auto;" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Inactive Mentees</a>
    <a class="nav-item nav-link" style="margin: auto;" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Unapprove Mentees</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">  
    <div class="row" style="width: 100%">
        
      @foreach($activeMentees as $activeMentee)
      <div class="col-lg-4 col-md-6">
        <a href="/mentors/task/{{$activeMentee->id}}">
              <div class="pt-3">
                  <div class="two">
                      <div class="d-flex justify-content-end px-3 pt-1"><i class="mdi mdi-star-outline pr-1 star"></i><i class="mdi mdi-dots-horizontal dot"></i></div>
                      <div class="px-3">
                          <div class="round"><img src="https://img.icons8.com/emoji/48/000000/hedgehog-emoji.png" width="23" class="imgfix" /></div>
                      </div>
                      <div class="px-3 pt-3">
                          <h3 class="name">Names: {{$activeMentee->fullname()}}</h3>
                          <p class="quote2 p2">Email: {{$activeMentee->email}}</p>
                      </div>
                      <div class="d-flex justify-content-between px-3 align-items-center pb-3">
                          <div class="d-flex justify-content-start align-items-center">
                            <a href="/message/{{$activeMentee->custom_id}}" class="btn" style="background-color: #191970;color: white">Chat</a>
                          </div>
                          <div class="d-flex justify-content-start px-3  align-items-center pb-3">
                            <span class="mt-3" style="display: inline-block">
                                <form action="{{route('delay.mentorship', ['id' => $activeMentee->id])}}" method="post">
                                    @csrf
                                    <input value="{{$activeMentee->pivot->delay}}" name="delay" type="hidden" />
                                    @if($activeMentee->pivot->delay == 1)
                                      <button class="btn btn-info" type="submit">Start</button> 
                                    @else

                                    <button class="btn btn-primary" type="submit">Pause</button> 
                                    
                                    @endif
                                 </form>
                            </span>
                           </div>
                        <div class="d-flex justify-content-end"> <img src="https://img.icons8.com/bubbles/50/000000/short-hair-girl-question-mark.png" width="20" class="img3" /> </div>
                      </div>
                  </div>
            </a>
          </div>
      </div>
      @endforeach
        
    </div>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
    <div class="row">
    @foreach($inactiveMentees as $inactiveMentee)
      <div class="col-lg-4 col-md-6">
              <div class="pt-3">
                  <div class="two">
                      <div class="d-flex justify-content-end px-3 pt-1"><i class="mdi mdi-star-outline pr-1 star"></i><i class="mdi mdi-dots-horizontal dot"></i></div>
                      <div class="px-3">
                          <div class="round"><img src="https://img.icons8.com/emoji/48/000000/hedgehog-emoji.png" width="23" class="imgfix" /></div>
                      </div>
                      <div class="px-3 pt-3">
                          <h3 class="name">Names: {{$inactiveMentee->fullname()}}</h3>
                          <p class="quote2 p2">Email: {{$inactiveMentee->email}}</p>
                      </div>
                      <div class="d-flex justify-content-between px-3 align-items-center pb-3">
                        <div class="d-flex justify-content-end"> <img src="https://img.icons8.com/bubbles/50/000000/girl-and-playing-card.png" width="20" class="img2" /> <img src="https://img.icons8.com/bubbles/50/000000/short-hair-girl-question-mark.png" width="20" class="img3" /> </div>
                      </div>
                  </div>
          </div>
      </div>
    @endforeach
    </div>
    

  </div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
    <div class="row">
    @foreach($unApproveMentees as $unApproveMentee)
      <div class="col-lg-4 col-md-6">
              <div class="pt-3">
                  <div class="two">
                      <div class="d-flex justify-content-end px-3 pt-1"><i class="mdi mdi-star-outline pr-1 star"></i><i class="mdi mdi-dots-horizontal dot"></i></div>
                      <div class="px-3">
                          <div class="round"><img src="https://img.icons8.com/emoji/48/000000/hedgehog-emoji.png" width="23" class="imgfix" /></div>
                      </div>
                      <div class="px-3 pt-3">
                          <h3 class="name">Names: {{$unApproveMentee->fullname()}}</h3>
                          <p class="quote2 p2">Email: {{$unApproveMentee->email}}</p>
                      </div>
                      <div class="d-flex justify-content-between px-3 align-items-center pb-3">
                          <div class="d-flex justify-content-start px-3  align-items-center pb-3">
                            <span class="mt-3" style="display: inline-block">
                              <form action="/mentors/approve/{{$unApproveMentee->id}}" method="post">
                                @csrf
                                    <button type="submit" class="btn btn-sm btn-info">Approve</button>
                              </form>
                            </span>
                           </div>
                        <div class="d-flex justify-content-end">  <img src="https://img.icons8.com/bubbles/50/000000/short-hair-girl-question-mark.png" width="20" class="img3" /> </div>
                      </div>
                  </div>
          </div>
      </div>
    @endforeach
    </div>

  </div>
</div>

@endsection
@section('scripts')
@endsection