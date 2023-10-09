@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-center" style="background-color: #eaf0f6; padding-left:30%;">
    <div class="container course-menu">
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-4">Courses</h2>
                @if(count($courses) == 0)
                <div class="alert alert-primary" role="alert">
                    You are not registered in any course
                </div>
                @else
                <p>Please select a course:</p>
                <div class="list-group course-list">
                    <div class="w-50">
                        @foreach ($courses as $course)
                        <a  href="{{ route('coursedetail', ['course_id' => $course->id]) }}" class="list-group-item list-group-item-action">
                            {{$course->name}}
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection