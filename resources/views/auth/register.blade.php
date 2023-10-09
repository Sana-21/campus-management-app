@extends('layouts.app')
@section('content')
<section class="vh-100 gradient-custom" style="background-color:#eaf0f6">
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        @if ($errors->any())
                        <div class="container mt-3">
                            <div class="alert alert-msg alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        <form method="POST" action="/adduser">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="firstName">First Name</label>
                                        <input type="text" name="first_name" id="firstName" required
                                            class="form-control form-control-lg" />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">

                                    <div class="form-outline">
                                        <label class="form-label" for="lastName">Last Name</label>
                                        <input type="text" name="last_name" id="lastName" required
                                            class="form-control form-control-lg" />
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <label for="birthdayDate" class="form-label">DOB</label>
                                        <input type="date" name=dob class="form-control form-control-lg" required
                                            id="birthdayDate" />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4">
                                    <h6 class="mb-2 pb-1">Gender: </h6>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender_id" id="femaleGender"
                                            value=1 checked required />
                                        <label class="form-check-label" for="femaleGender">Male</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender_id" id="maleGender"
                                            value=2 />
                                        <label class="form-check-label" for="maleGender">Female</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender_id" id="otherGender"
                                            value=3 />
                                        <label class="form-check-label" for="otherGender">Other</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="emailAddress">Email</label>
                                        <input type="email" id="emailAddress" name="email" required
                                            class="form-control form-control-lg" />
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <label class="form-label" for="phoneNumber">Phone Number</label>
                                        <input type="tel" id="phoneNumber" name="phoneNo" required
                                            class="form-control form-control-lg" />
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <label class="form-label" for="Address">Address</label>
                                        <textarea required class="form-control form-control-lg" id="textAreaExample3"
                                            id="Address" name="address" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="col-md-6 mb-4">
                                <h6 class="mb-2 pb-1">Role: </h6>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role_id" value="1" checked
                                        required />
                                    <label class="form-check-label">Admin</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role_id" value="2" />
                                    <label class="form-check-label">Faculty</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role_id" value="3" />
                                    <label class="form-check-label">Student</label>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-outline">
                                        <label class="form-label" for="password">Password</label>
                                        <input type="password" name="password" class="form-control form-control-lg" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection