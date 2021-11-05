@extends('layouts.master')
@section('title')
Profile Page
@endsection
@section('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
<!-- Page content -->
@section('content')
<div class="container mt--6">
  <div class="row">
    <div class="col-md-12 col-lg-12">
      <h3 id="text-color" class="p2"><span >Name</span>: {{$user->fullname()}}</h3>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-lg-12">
      @for($i = 0; $i < count($service);$i++)
      <h3 style="display: inline-block;"><span class="label label-primary">
          {{$service[$i]}}
      </span></h3>
      @endfor
    </div>
  </div>
  <div class="row">
    <div class="col-xl-10 col-md-12">
      <div class="card mt-5">
        <div class="card-header">
          <div class="row">
            <div class="col-8">
              <h3 class="mb-0">Todos</h3>
            </div>
          </div>
          </div>
          @if($message = Session::get('success'))
            <div class ='alert alert-success' style = "margin-bottom:8px">{{$message}}</div>
          @endif
        <div class="card-body">
          <form action="/taskers/task/{{$userId}}" method="post">
            @csrf
            <h6 class="heading-small text-muted mb-4">Add New Todo</h6>
            @if ($errors->any())
            <ul style = "margin-bottom:10px">
            @foreach ($errors->all() as $error)
                <li class ='text-danger' style = "color:red;margin-bottom:8px">{{$error}}</li>
            @endforeach
            </ul>
            @endif
            <div class="pl-lg-4">
            <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                      <label class="form-control-label" for="input-username">Title</label>
                      <input class="form-control" required name="title" style="border:1px solid black;" style="border:1px solid black;">
                  </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label" for="input-username">Todo</label>
                        <textarea id="summernote" style="border:1px solid black;"  class="form-control" rows="5" cols="3" required name="todo"></textarea>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Deadline</label>
                        <input type="date" required class="form-control" style="border:1px solid black;" name="expiry_date">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn  btn-success btn-lg">Add</button>
            </div>
          </form>
          
      </div>
    </div>
    </div>
    <div class="container mt-5">

      <h2 class="p2" id="text-color">Previous Tasks</h2>
      @foreach($tasks as $task)
      <div class="card mt-3 mb-5">
        <div class="card-header">
          {!! $task->title !!}
        </div>
        <div class="card-body">
            <p>{!! $task->todo !!}</p>
        </div>
        <div class="card-footer text-muted">
          Status: {{$task->status}}
        </div>
        <div class="card-footer text-muted">
          Deadline: {{$task->expiry_date}}
          <a href="/taskers/user/submission/{{$task->id}}/{{$task->user_id}}" class="btn btn-primary">View Submission</a>
          <button data-toggle="modal" data-target="#myModal{{$task->id}}" onclick="summer('todocontent{{$task->id}}')" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
          <button data-toggle="modal" data-target="#delete{{$task->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
        </div>
      </div>
    

    <div class="modal fade" id="myModal{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Todo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/taskers/task/update/{{$task->id}}" method="post">
            @csrf
              <div class="form-group">
                <label for="message-text" class="col-form-label">Title</label>
                <input name="title" class="form-control" id="message-text" style="border:1px solid black;" type="text" value="{{$task->title}}">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Todo</label>
                <textarea id="todocontent{{$task->id}}" style="border:1px solid black;" type="text" name="todo" class="form-control">{{$task->todo}}</textarea>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Date</label>
                <input class="form-control" style="border:1px solid black;" name="expiry_date" id="message-text" type="date" value="{{$task->expiry_date}}">
              </div>
            
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="delete{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Delete Todo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/taskers/task/delete/{{$task->id}}" method="post">
            @csrf
              <div class="form-group">
                <label for="message-text" class="col-form-label">Are you sure want to delete this task ?</label>
                </div>
            
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
</div>
@endsection
@section('scripts')
<script>
  function summer(id) {
            $('#'+id).summernote({
              tabsize: 2,
              height: 120,
              toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview']]
              ]
            });
          }
</script>
@endsection