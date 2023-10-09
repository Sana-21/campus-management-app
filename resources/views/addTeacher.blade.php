@extends('layouts.app')
@section('content')

<div class="form-div">
    <div class="card course-form" style="width:40%; margin-top: 100px; margin-left: 520px;">
        <div class="card-body">
            <br>
            @if(session('success'))
            <div class="alert alert-success alert-msg">
                {{ session('success') }}
            </div>
            @endif
        
            @if(session('failure'))
                <div class="alert alert-danger alert-msg">
                    {{ session('failure') }}
                </div>
            @endif
            <h2 class="course-head" style="background-color: white">Add Teacher</h2>
            <br>
            <form method="POST" action="{{ route('addcourseteacher') }}">
                @csrf
                <select class="form-select" required name="teacher_id" aria-label="Default select example">
                    <option selected>Select Teacher</option>
                    @foreach ($teachers as $teacher)
                    <option value="{{$teacher->id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
                    @endforeach
                </select>
                <div style="margin-top: 30px;"></div>
                <select class="form-select" required name="course_id" aria-label="Default select example">
                    <option selected>Select Course</option>
                    @foreach ($courses as $course)
                    <option value="{{$course->id }}">{{$course->name}}</option>
                    @endforeach
                </select>
                <br>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark" style="color: white;">Save Changes</button>
                </div>
                <br>
              
            </form>
        </div>
    </div>
        
 

</div>
@endsection