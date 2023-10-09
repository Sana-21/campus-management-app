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
        <h2>Register Courses</h2>
    </div>
</div>


<div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
    <div class="w-75">
        <table class="table course-table table-striped" style="margin-right: auto;">
            <thead>
                <tr>
                    <th class="col-1" scope="col">Sr No.</th>
                    <th class="col-1" scope="col">Course Code</th>
                    <th class="col-1" scope="col">Course Name</th>
                    <th class="col-1" scope="col">Teacher Name</th>
                    <th class="col-1" scope="col"></th>
                </tr>
            </thead>
            <tbody>




                @foreach ($coursesWithTeachers as $index => $course)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $course->code}}</td>
                    <td>{{ $course->name}}</td>
                    <td>
                        @if($course->teacher)
                        <ul>
                            @foreach($course->teacher as $teacher)
                            <li>{{ $teacher->first_name }} {{ $teacher->last_name }}</li>
                            @endforeach
                        </ul>
                        @else
                        <p>N/A</p>
                        @endif
                    </td>
                    <td>
                        <form method="POST" action="{{ route('enrollcourse', $course->id) }}"
                            style="display: inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-secondary"
                                onclick="return confirm('{{ __('Are you sure you want to register in this course?') }}')">
                                Register
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection