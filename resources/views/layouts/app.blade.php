<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"
    type='text/css'>
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
  @php
  $currentRoute = Route::currentRouteName();
  @endphp
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="#">Campus Management</a>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav" style="margin-left: auto;">
        <li class="nav-item profile-icon {{ ($currentRoute === 'profile') ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('profile') }}" title="View Profile">
            <i class="fa-solid fa-user fa-2x" style="color: #ffffff;"></i>
          </a>
        </li>
        <li class="nav-item" id="logout">
          <form class="form-inline logout-form" action="/logout">
            <button title="log out" class="btn logout-btn btn-outline-light" type="submit"><i
                class="fa-solid fa-right-from-bracket fa-2x" style="color: #ffffff;"></i></button>
          </form>
        </li>
      </ul>
    </div>
  </nav>
  {{-- //sidebar --}}

  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-dark ">
    <div class="position-sticky">
      <div>

        <a href="#" class="list-group-item list-group-item-action py-2 ripple " style="margin-top: 10px"
          aria-current="true">
          <i class="fa-solid fa-house me-3 fa-3x"></i>
          <div class="side-title" style="padding-left: 25px;">Home</div>
        </a>

        <a href="{{ route('resetpassword') }}"
          class="list-group-item list-group-item-action py-2 ripple {{ ($currentRoute === 'resetpassword') ? 'active' : '' }}">
          <i class="fas fa-lock fa-fw me-3 fa-3x"></i>
          <div class="side-title" style="padding-left: 20px">Password</div>
        </a>
        @if (Auth::user()->role_id == 1)
        <a href="{{ route('course') }}" class="list-group-item list-group-item-action py-2 ripple {{ ($currentRoute === 'course') ? 'active' : '' }}"><i
            class="fa-solid fa-book me-3 fa-3x"></i>
          <div class="side-title" style="padding-left: 20px">Courses</div>
        </a>
        <a href="{{ route('register') }}" class="list-group-item list-group-item-action py-2 ripple {{ ($currentRoute === 'register') ? 'active' : '' }}"><i
            class="fa-solid fa-user-plus fa-fw me-3 fa-3x"></i>
          <div class="side-title">Register Users</div>
        </a>
        <a href="{{ route('viewusers') }}" class="list-group-item list-group-item-action py-2 ripple {{ ($currentRoute === 'viewusers') ? 'active' : '' }}"><i
            class="fa-solid fa-users fa-fw me-3 fa-3x"></i>
          <div class="side-title">View Users</div>
        </a>
        <a href="{{ route('viewteachers') }}" class="list-group-item list-group-item-action py-2 ripple {{ ($currentRoute === 'viewteachers') ? 'active' : '' }}"><i
            class="fa-solid fa-chalkboard-user fa-fw me-3 fa-3x"></i>
          <div class="side-title">Assigned Courses</div>
        </a>
        @endif
        @if (Auth::user()->role_id == 2)
        <a href="{{ route('coursemenu') }}" class="list-group-item list-group-item-action py-2 ripple {{ ($currentRoute === 'coursemenu') ? 'active' : '' }}"><i
            class="fa-solid fa-book me-3 fa-3x"></i>
          <div class="side-title" style="padding-left: 18px">Courses</div>
        </a>
        @endif
        @if (Auth::user()->role_id == 3)
        <a href="{{ route('enrolledcourses') }}" class="list-group-item list-group-item-action py-2 ripple {{ ($currentRoute === 'enrolledcourses') ? 'active' : '' }}"><i
            class="fa-solid fa-book me-3 fa-3x"></i>
          <div class="side-title" style="padding-left: 20px">Courses</div>
        </a>
        <a href="{{ route('enroll') }}" class="list-group-item list-group-item-action py-2 ripple {{ ($currentRoute === 'enroll') ? 'active' : '' }}"><i
            class="fa-solid fa-table-list me-3 fa-3x"></i>
          <div class="side-title" style="padding-left: 5px">Enroll Courses</div>
        </a>
        @endif
      </div>
    </div>
  </nav>
  @yield('content')
</body>

</html>