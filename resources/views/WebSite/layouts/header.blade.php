<div class="nav-outer clearfix">
    <!--Mobile Navigation Toggler For Mobile--><div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>
    <nav class="main-menu navbar-expand-md navbar-light">
        <div class="navbar-header">
            <!-- Togg le Button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon flaticon-menu"></span>
            </button>
        </div>

        <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
            <ul class="navigation clearfix">
                <li class="current"><a href="/">Home</a></li>
                <li><a href="{{route('home.appointments')}}">Appointments</a></li>
                <li><a href="{{route('home.service')}}">Services</a></li>
                <li ><a href="{{route('home.section')}}">Department</a></li>
                <li><a href="{{route('home.doctor')}}">Doctors</a></li>

            </ul>
        </div>

    </nav>
    <!-- Main Menu End-->

    <!-- Main Menu End-->
    <div class="outer-box clearfix">
        <!-- Main Menu End-->
        <div class="nav-box">
            <div class="nav-btn nav-toggler navSidebar-button"><span class="icon flaticon-menu-1"></span></div>
        </div>

        <!-- Social Box -->
        <ul class="social-box clearfix">

            @if (auth()->guard('admin')->check())
            <li><a href="{{route('dashboard')}}" class=" text text-dark">{{Auth::guard('admin')->user()->name}}</a></li>
            @elseif (auth()->guard('doctor')->check())
            <li><a href="{{route('dashboard.doctor')}}" class=" text text-dark">{{Auth::guard('doctor')->user()->name}}</a></li>
            @elseif (auth()->guard('patient')->check())
            <li><a href="{{route('dashboard.patient')}}" class=" text text-dark">{{Auth::guard('patient')->user()->name}}</a></li>
            @elseif (auth()->guard('rayEmployees')->check())
            <li><a href="{{route('dashboard.rayEmployees')}}" class=" text text-dark">{{Auth::guard('rayEmployees')->user()->name}}</a></li>
            @elseif (auth()->guard('labEmployees')->check())
            <li><a href="{{route('dashboard.labEmployees')}}" class=" text text-dark">{{Auth::guard('labEmployees')->user()->name}}</a></li>
            @else
            <li><a title="Login" href="{{route('login')}}"><span class="fas fa-user"></span></a></li>
            @endif
        </ul>

        <!-- Search Btn -->
        {{-- <div class="search-box-btn"><span class="icon flaticon-search"></span></div> --}}

    </div>
</div>
