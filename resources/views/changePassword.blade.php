@extends('layouts.app')
@section('content')

<section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5" style="background-color: white;">

                            <h2 class="text-uppercase text-center mb-5">Change Password</h2>
                            <form action="{{ route('updatepassword') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    @if (session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                    @endif
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

                                    <div class="mb-3">
                                        <label for="oldPasswordInput" class="form-label" style ="padding-left:2%;">Old Password</label>
                                        <input name="old_password" type="password"
                                            class="form-control @error('old_password') is-invalid @enderror"
                                            id="oldPasswordInput" placeholder="Old Password">
                                        @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <label for="newPasswordInput" class="form-label" style ="padding-left:2%;">New Password</label>
                                        <input name="new_password" type="password"
                                            class="form-control @error('new_password') is-invalid @enderror"
                                            id="newPasswordInput" placeholder="New Password">
                                        @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <br>
                                    <div class="mb-3">
                                        <label for="confirmNewPasswordInput" class="form-label" style ="padding-left:2%;">Confirm New
                                            Password</label>
                                        <input name="new_password_confirmation" type="password" class="form-control"
                                            id="confirmNewPasswordInput" placeholder="Confirm New Password">
                                    </div>
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-dark" style="color: white;">Change
                                        Password</button>
                                </div>

                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>













@endsection