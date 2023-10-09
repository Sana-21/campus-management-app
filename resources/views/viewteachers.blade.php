@extends('layouts.app')

@section('content')

<div class="course-head">
    @if(session('success'))
    <div class="alert alert-msg alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(session('failure'))
    <div class="alert alert-danger alert-msg">
        {{ session('failure') }}
    </div>
    @endif
    @if ($errors->has('message'))
    <div class="alert alert-msg alert-danger">
        {{ $errors->first('message') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center">
        <h2>Assigned Courses</h2>
        <a class="btn btn-dark" href="{{ route('addteacher') }}">Assign Teacher</a>
    </div>
</div>

<div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
    <div class="w-75">
        <table class="table course-table table-striped" style="margin-right: auto;">
            <thead>
                <tr>
                    <th class="col-1" scope="col">Sr No.</th>
                    <th class="col-1" scope="col">Teacher Name</th>
                    <th class="col-1" scope="col">Course Code</th>
                    <th class="col-1" scope="col">Course Name</th>
                    <th class="col-1" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @php
                $index = 1;
                @endphp
                @foreach ($teachers as $teacher)

                @foreach ($teacher->courses as $course)
                <tr>
                    <td>{{ $index}}</td>
                    <td>{{ $teacher->first_name }} {{ $teacher->last_name }}</td>
                    <td>{{ $course->code }}</td>
                    <td>{{ $course->name }}</td>
                    <td>
                        <form method="POST"
                            action="{{ route('deletecourseteacher', ['t_id' => $teacher->id, 'c_id' => $course->id]) }}"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary"
                                onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                                {{ __('Delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
                @php
                $index++;
                @endphp
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection