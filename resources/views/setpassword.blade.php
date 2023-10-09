<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      setTimeout(function () {
      var elements = document.getElementsByClassName('alert-msg');
      for (var i = 0; i < elements.length; i++) {
        elements[i].style.display = 'none';
      }
    }, 2000);
    </script>
</head>

<body>
<section class="vh-100 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        @if ($errors->has('message'))
                        <div class="alert alert-msg alert-danger">
                            {{ $errors->first('message') }}
                        </div>
                        @endif
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Change Password</h2>
                            <form action="{{ route('changepassword') }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="newpassword">New Password</label>
                                    <input id="newpassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="confirmpassword">Confirm Password</label>
                                    <input id="confirmpassword" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-dark" style="color: white;">Save Password</button>
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
</body>
</html>
