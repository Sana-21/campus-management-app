@extends('layouts.app')
@section('content')
<div class="form-div">
    <div class="card course-form" style="width:40%; margin-top: 100px; margin-left: 520px;">
        <div class="card-body">
            <form method="POST" action="{{ route('updatecourse', $name) }}">
                @csrf
                @method('PUT')
                <h2>Edit Course</h2>
                <div class="form-group row">
                    <label for="staticEmail" style="width: 20%" class="col-sm-2 col-form-label">Course Code</label>
                    <div class="col-sm-10">
                        <input style="width: 50%" name="code" type="text" required class="form-control"
                            value="{{$code}}">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="inputPassword" style="width: 20%" class="col-sm-2 col-form-label">Course Name</label>
                    <div class="col-sm-10">
                        <input style="width: 50%" name="name" type="text" class="form-control" id="inputPassword"
                            placeholder="Course Name" value="{{$name}}">
                    </div>
                </div>
                <button style="width: 30%; margin-left: 350px; margin-top: 20px" type="submit"
                    class="btn btn-primary">Save Changes</button>
            </form>
        </div>
    </div>
@endsection