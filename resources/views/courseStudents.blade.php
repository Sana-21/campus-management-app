@extends('layouts.app')
@section('content')


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
            <a class="btn btn-secondary" href="{{ route('coursedetail', ['course_id' => $course_id]) }}" role="button">Content</a>
            <a class="btn btn-secondary" href="#" role="button">Students</a>
            <a class="btn btn-secondary" href="{{ route('classwork',['course_id' =>  $course_id])}}" role="button">Classwork</a>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
    <div class="w-75">
        <table class="table course-table table-striped" style="margin-right: auto;">
            <thead>
                <tr>
                    <th class="col-1" scope="col">Sr No.</th>
                    <th class="col-1" scope="col">ID</th>
                    <th class="col-1" scope="col">First Name</th>
                    <th class="col-1" scope="col">Last Name</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->first_name}}</td>
                    <td>{{ $user->last_name}}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection