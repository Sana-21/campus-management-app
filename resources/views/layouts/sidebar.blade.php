@extends('layouts.app');
@section('content');
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-dark ">
    <div class="position-sticky">
        <div>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple" style="margin-top: 10px" aria-current="true">
                <i class="fa-solid fa-house me-3 fa-3x"></i>
                <div class="side-title" style="padding-left: 25px;">Home</div>
            </a>
            <a href="#" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fas fa-lock fa-fw me-3 fa-3x"></i>
                <div class="side-title" style="padding-left: 20px">Password</div>
            </a>
            @if (Auth::user()->role_id == 1)
            <a href="{{ route('course') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fa-solid fa-book me-3 fa-3x"></i>
                <div class="side-title" style="padding-left: 20px">Courses</div>
            </a>
            <a href="{{ route('register') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fa-solid fa-user-plus fa-fw me-3 fa-3x"></i>
                <div class="side-title">Register Users</div>
            </a>
            <a href="{{ route('viewusers') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fa-solid fa-users fa-fw me-3 fa-3x"></i>
                <div class="side-title">View Users</div>
            </a>
            <a href="{{ route('viewteachers') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fa-solid fa-chalkboard-user fa-fw me-3 fa-3x"></i>
                <div class="side-title">Assigned Courses</div>
            </a>
            @endif
            @if (Auth::user()->role_id == 2)
            <a href="{{ route('coursemenu') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fa-solid fa-book me-3 fa-3x"></i>
                <div class="side-title"style="padding-left: 35px">Courses</div>
            </a>
            @endif
            @if (Auth::user()->role_id == 3)
            <a href="{{ route('coursemenu') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fa-solid fa-book me-3 fa-3x"></i>
                <div class="side-title"style="padding-left: 20px" >Courses</div>
            </a>
            <a href="{{ route('enroll') }}" class="list-group-item list-group-item-action py-2 ripple"><i
                    class="fa-solid fa-table-list me-3 fa-3x"></i>
                <div class="side-title" style="padding-left: 5px">Enroll Courses</div>
            </a>
            @endif
        </div>
    </div>
</nav>

@endsection