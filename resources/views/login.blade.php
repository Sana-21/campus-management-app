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
                        <div class="card-body p-5">
                            @if ($errors->has('message'))
                            <div class="alert alert-msg alert-danger">
                                {{ $errors->first('message') }}
                            </div>
                            @endif
                            @if(session('success'))
                            <div class="alert alert-msg alert-success">
                              {{ session('success') }}
                            </div>
                            @endif
                            <h2 class="text-uppercase text-center mb-5">Log In</h2>

                            <form method="POST" action="/loginuser">
                                {{ csrf_field() }}
                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Email</label>
                                    <input type="email" required id="form3Example3cg" name="email"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                    <input type="password" required id="form3Example4cg" name="password"
                                        class="form-control form-control-lg" />
                                </div>

                                
                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4 " style="padding-left: 6%;">
                                        <div class="checkbox">
                                            <label>
                                                <a href="{{ route('forget.password.get') }}">Forgot Password</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-dark" style="color: white;">Log in</button>
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
