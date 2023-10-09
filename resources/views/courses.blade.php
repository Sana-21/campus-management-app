@extends('layouts.app')
@section('content')

<div class="course-head">
  @if(session('success'))
  <div class="alert alert-msg alert-success">
    {{ session('success') }}
  </div>
  @endif

  @if ($errors->has('message'))
  <div class="alert alert-msg alert-danger">
    {{ $errors->first('message') }}
  </div>
  @endif
  <div class="d-flex justify-content-between align-items-center">
    <h2>Courses</h2>
    <a class="btn add-course-btn btn-dark" href="{{ route('addcourse') }}">Add Course</a>
  </div>
</div>


<div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
  <div class="w-75">
    <table class="table course-table table-striped" style="margin-right: auto;">
      <thead>
        <tr>
          <th class = "col-1"scope="col">Sr No.</th>
          <th class = "col-1"scope="col">Course Code</th>
          <th class = "col-1"scope="col">Course Name</th>
          <th class = "col-1"scope="col" ></th>
        </tr>
      </thead>
      <tbody>

        @foreach ($courses as $index => $course)
        <tr>
          <td>{{ $index + 1 }}</td>
          <td>{{ $course->code}}</td>
          <td>{{ $course->name}}</td>
          <td><a class="btn btn-secondary"
              href="{{ route('editcourse', ['code'=> $course->code, 'name' => $course->name]) }}" role="button">Edit</a>
            <form method="POST" action="{{ route('deletecourse', $course->id) }}" style="display: inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-secondary"
                onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                {{ __('Delete') }}
              </button>
            </form>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection