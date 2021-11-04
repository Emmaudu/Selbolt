@extends('admin.layouts.master')
@section('title')
Tasks
@endsection
@section('link')
<link rel="stylesheet" href="{{asset('main.css')}}">
@endsection
<!-- Page content -->
@section('content')
<div class="container mt--6">
  <h1 id="text-color">ALL MENTEES</h1>
    @if(!$users->isEmpty())
    <div class="row">
      @foreach($users as $user)
          <div class="col-lg-4">
          <a href="/admin/mentees/details/{{$user->id}}">
              <div class="pt-3">
                  <div class="two">
                      <div class="d-flex justify-content-end px-3 pt-1"><i class="mdi mdi-star-outline pr-1 star"></i><i class="mdi mdi-dots-horizontal dot"></i></div>
                      <div class="px-3">
                          <div class="round"><img src="https://img.icons8.com/emoji/48/000000/hedgehog-emoji.png" width="23" class="imgfix" /></div>
                      </div>
                      <div class="px-3 pt-3">
                          <h3 class="name">{{$user->fullname()}}</h3>
                          @foreach($user->mentors as $mentor)
                          <p class="quote2 p2">Mentor: {{$mentor->fullname()}}</p>
                          @endforeach
                      </div>
                      <div class="d-flex justify-content-start px-3 align-items-center"> <i class="mdi mdi-view-comfy task"></i> <span class="quote2 pl-2">Date Joined:{{$user->created_at}}</span> </div>
                      <div class="d-flex justify-content-between px-3 align-items-center pb-3">
                        <div class="d-flex justify-content-start align-items-center">
                            <a href="/admin/mentees/deactivate/{{$user->id}}" class="btn btn-info" style="background-color: #191970;color: white">Deactivate User</a>
                        </div>
                        <div class="d-flex justify-content-end"> <img src="https://img.icons8.com/bubbles/50/000000/girl-and-playing-card.png" width="20" class="img2" /> <img src="https://img.icons8.com/bubbles/50/000000/short-hair-girl-question-mark.png" width="20" class="img3" /> </div>
                      </div>
                  </div>
          </div> 
          </a>     
      </div>
      
    @endforeach
      </div>
    @else
        <div class="card mt-3">
            <div class="card-header">
                <p>No mentee yet!</p>
            </div>
        </div>
    @endif
@endsection
@section('scripts')
@endsection