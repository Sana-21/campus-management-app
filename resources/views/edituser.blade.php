@extends('layouts.app')
@section('content')
<section class="vh-100 gradient-custom" style="background-color:#eaf0f6">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Edit User</h3>
                        <form action="{{ route('updateuser', $user->id) }}" method="POST" >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="_method" value="PUT">
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">First Name</label>
                                        <input type="text" name="first_name" id="firstName"
                                            required value="{{$user->first_name}}" class="form-control form-control-lg" />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="lastName">Last Name</label>
                                        <input type="text" name="last_name" id="lastName" value="{{$user->last_name}}"
                                            required class="form-control form-control-lg" />
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <label for="birthdayDate" class="form-label">DOB</label>
                                        <input type="date" name=dob class="form-control form-control-lg"
                                            id="birthdayDate" required value="{{$user->dob}}" />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 pb-1">Gender: </h6>
                                    <select class="form-select" required aria-label="Default select example">
                                        <option selected value="{{$user->gender_id}}">{{$user->gender->name}}</option>
                                        @if($user->gender_id != 1)
                                        <option value="1">Male</option>
                                        @endif
                                        @if($user->gender_id != 2)
                                        <option value="2">Female</option>
                                        @endif
                                        @if($user->gender_id != 3)
                                        <option value="3">Other</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="emailAddress">Email</label>
                                        <input type="email" required id="emailAddress" name="email" value="{{$user->email}}"
                                            class="form-control form-control-lg" />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <input type="tel" id="phoneNumber" required name="phoneNo" value="{{$user->phoneNo}}"
                                            class="form-control form-control-lg" />
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <label class="form-label" for="Address">Address</label>
                                        <input type="text" id="Address" name="address" required value="{{$user->address}}"
                                            class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="col-md-6 mb-4">
                                <h6 class="mb-2 pb-1">Role: </h6>
                                <select class="form-select" aria-label="Default select example" required>
                                    <option selected value="{{$user->role_id}}">{{$user->role->name}}</option>
                                    @if($user->role_id != 1)
                                    <option value="1">Admin</option>
                                    @endif
                                    @if($user->role_id != 2)
                                    <option value="2">Teacher</option>
                                    @endif
                                    @if($user->role_id != 3)
                                    <option value="3">Student</option>
                                    @endif
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <label class="form-label" for="password">Password</label>
                                        <input required type="password" value="{{$user->password}}" name="password"
                                            class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Save Changes" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection