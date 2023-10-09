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

@if(Auth::user()->role_id == 1)
<div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
    <div class="w-20">
        <div class="btn-group" role="group" aria-label="Basic example">
            <a class="btn btn-secondary" href="{{ route('viewusers', "all")}}" role="button">All</a>
            <a class="btn btn-secondary" href="{{ route('viewusers', "faculty")}}" role="button">Teachers</a>
            <a class="btn btn-secondary" href="{{ route('viewusers', "students")}}" role="button">Students</a>
        </div>
    </div>
</div>
@endif

<div class="d-flex justify-content-center" style="background-color: #eaf0f6;">
    <div class="w-75">
        <table class="table course-table table-striped" style="margin-right: auto;">
            <thead>
                <tr>
                    <th class="col-1" scope="col">Sr No.</th>
                    <th class="col-1" scope="col">ID</th>
                    <th class="col-1" scope="col">First Name</th>
                    <th class="col-1" scope="col">Last Name</th>
                    <th class="col-1" scope="col">Role</th>
                    <th class="col-1" scope="col"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->id}}</td>
                    <td>{{ $user->first_name}}</td>
                    <td>{{ $user->last_name}}</td>
                    <td>{{ $user->role->name}}</td>

                    <td><a class="btn btn-secondary" href={{route('edituser', $user->id)}}role="button">Edit</a>
                        <form method="POST" action="{{ route('deleteuser', $user->id) }}" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary"
                              onclick="return confirm('{{ __('Are you sure you want to delete?') }}')">
                              {{ __('Delete') }}
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