@extends('layouts.app')
@section('content')
<div class="view-courses">

    @if(count($courses) == 0)
    <div class="alert alert-primary" role="alert">
        You are not registered in any course
    </div>
    @else

    @foreach ($courses as $index => $course)
    <div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
        <div class="w-50">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Course Code</th>
                    <th scope="col">Course Name</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>{{ $course->name}}</td>
                    <td>{{ $course->code}}</td>
                  </tr>
                </tbody>
        </div>
    </div>
    @endforeach

    @endif
</div>
@endsection