@extends('layouts.app')
@section('content')
<div class="form-div">
    <div class="card" style="margin-top: 100px; margin-left: 520px; width:40%">
        <div class="card-body">
            <form method="POST" action="{{ route('addnewcourse') }}">
                @csrf
                <h2>Add a new course</h2>
                <br>
                <div class="form-group row">
                    <label for="staticEmail" style = "width: 20%" class="col-sm-2 col-form-label">Course Code</label>
                    <div class="col-sm-10">
                        <input style="width: 60%" value = "cs" name="code" type="text" required class="form-control" placeholder="CS50">
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label for="inputPassword" style = "width: 30%" class="col-sm-2 col-form-label">Course Name</label>
                    <div class="col-sm-10">
                        <input style="width: 60%" name="name" type="text" class="form-control" id="inputPassword"
                            value = "cn" required  placeholder="Course Name">
                    </div>
                </div>
                <br>
                <br>
                <button style=" width: 30%; margin-left: 200px; margin-top: 20px" type="submit" class="btn btn-primary">Create
                    Course</button>
            </form>
        </div>
    </div>
</div>
@endsection

