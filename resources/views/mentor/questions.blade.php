@extends('layouts.master')
@section('title')
Questions Page
@endsection
@section('link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection
<!-- Page content -->
@section('content')
<div class="container">
  <div class="">
    <div class="">
      <div class="">
        <div class="">
          <div class="">
            
          </div>
          </div>
        <div class="">
          <form action="/mentors/question" method="post">
            @csrf
            <h1 class="heading-small mb-4" id="text-color">ADD QUESTIONS HERE</h1>
              @if ($errors->any())
                <ul style = "margin-bottom:10px">
                @foreach ($errors->all() as $error)
                    <li class ='text-danger' style = "color:red;margin-bottom:8px">{{$error}}</li>
                @endforeach
                </ul>
              @endif
            <div class="">
              <div class="card-body">
                <label class="form-control-label" for="input-username" id="text-color">Content</label>
                <div class="form-group">
                  <textarea id="summernote" type="text" required class="form-control" name="content" style="border:1px solid black;"></textarea>
                </div>
                <div class="form-group">
                  <button  type="submit" class="btn btn-lg" style="background-color:  	#191970;color: white">Add Question</button>
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>

<div class="container">
<h3 class="mb-0 p2" id="text-color"><b>Previous Questions</b></h3>
      @foreach($questions as $question)
      <div class="card mt-5 mb-5">
        <div class="card-body">
            <p>{!! $question->content !!}</p>
        </div>
        <div class="card-footer text-muted">
          
      <span class="glyphicon glyphicon-name"></span>
      <span style="display: none;">{{$question->id}}</span>
          <button data-toggle="modal" onclick="summer('{{$question->id}}')" data-target="#myModal{{$question->id}}" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></button>
          <button data-toggle="modal" data-target="#delete{{$question->id}}" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
        </div>
      </div>

    <div class="modal fade" id="myModal{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Edit Question</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <div class="modal-body">
            <form action="/mentors/question/update/{{$question->id}}" method="post">
            @csrf
                <div class="form-group">
                <div class="form-group">
                <label for="recipient-name" class="col-form-label">Content</label>
                <textarea class="summernote" id="question{{$question->id}}" type="text" name="content" class="form-control">{{$question->content}}</textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-g" style="background-color:  	#191970;color: white">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    </div>
    <div class="modal fade" id="delete{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel">Delete Todo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="/mentors/question/delete/{{$question->id}}" method="post">
            @csrf
              <div class="form-group">
                <label for="message-text" class="col-form-label">Are you sure want to delete this task ?</label>
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
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
              ]
            });

            $('#question'+id).summernote({
              tabsize: 2,
              height: 120,
              toolbar: [
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
              ]
            });
            
          }
</script>
@endsection