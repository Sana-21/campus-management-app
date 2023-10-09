@extends('layouts.app')
@section('content')
<div class="course-detail" style="background-color: #eaf0f6;">
    <div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
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
        </div>
    </div>

    <div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
        <div class="w-20">
            <div class="btn-group" role="group" aria-label="Basic example">
                <a class="btn btn-secondary" href="{{ route('coursedetail', ['course_id' => $course_id]) }}"
                    role="button">Content</a>
                <a class="btn btn-secondary" href="{{ route('coursestudents',['course_id' =>  $course_id])}}"
                    role="button">Students</a>
                <a class="btn btn-secondary" href="#" role="button">Classwork</a>
            </div>
        </div>
    </div>

    @if(Auth::user()->role_id == 2)
    <div class="classwork-head">
        <div>
            <a class="btn add-course-btn btn-dark"
                href="{{ route('createassignment', ['course_id' => $course_id]) }}">Upload Assignment</a>
        </div>
    </div>
    @endif

    <div class="d-flex justify-content-center announcement-box" style="background-color: #eaf0f6;">
        <div class="w-50">
            <div class="list-group course-list list-group-flush">
                <div class="w-100">
                    @if(count($assignments) == 0)
                    <div class="alert alert-msg alert-success">
                        no assignment
                    </div>
                    @else

                    <ul>
                    @foreach ($assignments as $assignment)
                    <li class="list-group-item flex-column align-items-start assignment-item">
                        <div class="d-flex w-100">
                            <h5 class="mb-1">
                                {{$assignment->title}}
                            </h5>
                            <br>
                        </div>
                        @if($assignment->description)
                        <div>
                            <p> {{$assignment->description}} </p>

                        </div>
                        @else
                        <div>
                            <p>No description </p>
                        </div>
                        @endif
                        @if($assignment->due_date)
                        <span class="due">
                            <small>
                                Due: {{$assignment->due_date}}
                            </small>
                        </span>
                        @else
                        <span class="due">
                            <small>No Due Date</small>
                        </span>
                        @endif
                        @if($assignment->file_id)
                        <small class="text-muted"><a href={{ route('downloadfile', ['file_id'=>
                                $assignment->file_id])}}>Download
                                File</a></small>
                        @endif
                    </li>
                    @endforeach
                </ul>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>


</div>
@endsection