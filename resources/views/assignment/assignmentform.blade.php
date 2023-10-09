@extends('layouts.app')
@section('content')
<div class="assignment-form">
  <div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
    <div class="w-75">
      @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
      <h2>Post an Assignment</h2>
      <form method="POST" action={{ route('postassignment', ['course_id' => $course_id]) }} enctype="multipart/form-data">
        @csrf
        <div class="form-outline mb-4">
          <label class="form-label" for="form4Example1">Title:</label>
          <input type="text" name="assignment-title" id="form4Example1" required class="form-control" />
        </div>


        <div class="form-outline mb-4">
          <label class="form-label" for="form4Example3">Instructions (optional) </label>
          <textarea class="form-control" id="form4Example3" rows="4" name="assignment-description"></textarea>
        </div>

        <label for="duetime">Due Date:</label>
        <input type="datetime-local" id="duetime" name="duetime">

        <br><br>

        <div class="form-group">
          <label for="exampleFormControlFile1">Upload File</label>
          <input type="file" name = "assignment-file" class="form-control-file" id="exampleFormControlFile1">
        </div>


        <br><br>
        <button type="submit" class="btn btn-primary btn-block mb-4">Post Assignment</button>
      </form>
    </div>
  </div>
</div>
@endsection