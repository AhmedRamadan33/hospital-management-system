<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="#"><img src="{{ URL::asset('Dashboard/img/brand/logo.png') }}" class="logo-1"
                        alt="logo"></a>
                <a href="#"><img src="{{ URL::asset('Dashboard/img/brand/logo-white.png') }}" class="dark-logo-1"
                        alt="logo"></a>
                <a href="#"><img src="{{ URL::asset('Dashboard/img/brand/favicon.png') }}" class="logo-2"
                        alt="logo"></a>
                <a href="#"><img src="{{ URL::asset('Dashboard/img/brand/favicon.png') }}" class="dark-logo-2"
                        alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
            <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
                <input class="form-control" placeholder="Search for anything..." type="search">
                <button class="btn"><i class="fas fa-search d-none d-md-block"></i></button>
            </div>
        </div>
        <div class="main-header-right">
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <div class="nav-link" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="reset" class="btn btn-default">
                                    <i class="fas fa-times"></i>
                                </button>
                                <button type="submit" class="btn btn-default nav-link resp-btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="dropdown nav-item main-header-message ">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-mail">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                            </path>
                            <polyline points="22,6 12,13 2,6"></polyline>
                        </svg>
                        <span class=" pulse-danger"></span></a>
                    <div class="dropdown-menu">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Messages</h6>
                                <span class="badge badge-pill badge-warning mr-auto my-auto float-left">Mark All
                                    Read</span>
                            </div>
                            <p class="dropdown-title-text subtext mb-0 text-white op-6 pb-0 tx-12 ">You have 4 unread
                                messages</p>
                        </div>
                        <div class="main-message-list chat-scroll">
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="  drop-img  cover-image  "
                                    data-image-src="{{ URL::asset('Dashboard/img/faces/3.jpg') }}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Petey Cruiser</h5>
                                    </div>
                                    <p class="mb-0 desc">I'm sorry but i'm not sure how to help you with that......</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 15 3:55 PM</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="drop-img cover-image"
                                    data-image-src="{{ URL::asset('Dashboard/img/faces/2.jpg') }}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Jimmy Changa</h5>
                                    </div>
                                    <p class="mb-0 desc">All set ! Now, time to get to you now......</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">Mar 06 01:12 AM</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="drop-img cover-image"
                                    data-image-src="{{ URL::asset('Dashboard/img/faces/9.jpg') }}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Graham Cracker</h5>
                                    </div>
                                    <p class="mb-0 desc">Are you ready to pickup your Delivery...</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">Feb 25 10:35 AM</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="drop-img cover-image"
                                    data-image-src="{{ URL::asset('Dashboard/img/faces/12.jpg') }}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Donatella Nobatti</h5>
                                    </div>
                                    <p class="mb-0 desc">Here are some products ...</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">Feb 12 05:12 PM</p>
                                </div>
                            </a>
                            <a href="#" class="p-3 d-flex border-bottom">
                                <div class="drop-img cover-image"
                                    data-image-src="{{ URL::asset('Dashboard/img/faces/5.jpg') }}">
                                    <span class="avatar-status bg-teal"></span>
                                </div>
                                <div class="wd-90p">
                                    <div class="d-flex">
                                        <h5 class="mb-1 name">Anne Fibbiyon</h5>
                                    </div>
                                    <p class="mb-0 desc">I'm sorry but i'm not sure how...</p>
                                    <p class="time mb-0 text-left float-right mr-2 mt-2">Jan 29 03:16 PM</p>
                                </div>
                            </a>
                        </div>
                        <div class="text-center dropdown-footer">
                            <a href="text-center">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                {{-- notification --}}
                <div class="dropdown nav-item main-header-notification">
                    <a class="new nav-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>

                        </svg>
                        <span class="pulse"> </span>
                    </a>
                    <div class="dropdown-menu dropdown-notifications">
                        <div class="menu-header-content bg-primary text-right">
                            <div class="d-flex">
                                <h6 class="dropdown-title mb-1 tx-15 text-white font-weight-semibold">Notifications
                                </h6>
                                <span class="badge badge-pill badge-warning ml-1 my-auto float-left">Mark All
                                    Read</span>
                            </div>

                                <p data-count="{{ App\Models\Notification::CountNotification()->count() }}"
                                    class="dropdown-title-text subtext mb-0 mt-1 text-white op-6 pb-0 tx-12 notif-count">
                                    You have
                                    <span
                                        class=" bg-pink p-1 notifyimg text-white">{{ App\Models\Notification::CountNotification()->count() }}</span>
                                    unread Notifications
                                </p>
                        </div>
                        <div class="main-notification-list Notification-scroll">
                            <div class="new_message">
                                <a class="d-flex p-3 border-bottom" href="#">
                                    <div class="mr-3">
                                        <h4 class="notification-label mb-1"></h4>
                                        <div class="notification-subtext"></div>
                                    </div>
                                </a>
                            </div>

                            @foreach (App\Models\Notification::where('reader_status', 0)->OrderBy('id','DESC')->get() as $notification)
                                <a class="d-flex p-3 border-bottom" href="#">

                                    <div class="mr-3">
                                        <h5 class="notification-label mb-1">{{ $notification->message }}</h5>
                                        <div class="notification-subtext">{{ $notification->created_at }}</div>
                                    </div>

                                </a>
                            @endforeach
                        </div>
                        <div class="dropdown-footer">
                            <a href="">VIEW ALL</a>
                        </div>
                    </div>
                </div>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                            src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt=""
                                        src="{{ URL::asset('Dashboard/img/faces/6.jpg') }}" class=""></div>
                                <div class="mr-3 my-auto">
                                    <h6>{{ Auth::user()->name }}</h6><span>{{ Auth::user()->email }} </span>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="#"><i class="bx bx-user-circle"></i>Profile</a>
                        <a class="dropdown-item" href="#"><i class="bx bx-cog"></i> Edit Profile</a>
                        <a class="dropdown-item" href="#"><i class="bx bxs-inbox"></i>Inbox</a>
                        <a class="dropdown-item" href="#"><i class="bx bx-envelope"></i>Messages</a>
                        <a class="dropdown-item" href="#"><i class="bx bx-slider-alt"></i> Account Settings</a>

                        @if (auth('web')->check())
                            <form method="POST" action="{{ route('logout') }}">
                            @elseif (auth('admin')->check())
                                <form method="POST" action="{{ route('logout.admin') }}">
                                @elseif (auth('patient')->check())
                                    <form method="POST" action="{{ route('logout.patient') }}">
                                    @elseif (auth('doctor')->check())
                                        <form method="POST" action="{{ route('logout.doctor') }}">
                                        @elseif (auth('rayEmployees')->check())
                                            <form method="POST" action="{{ route('logout.rayEmployees') }}">
                                            @elseif (auth('labEmployees')->check())
                                                <form method="POST" action="{{ route('logout.labEmployees') }}">
                        @endif
                        @csrf
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"><i
                                class="bx bx-log-out"></i>Logout </a>
                        </form>

                    </div>
                </div>
                <div class="dropdown main-header-message right-toggle">
                    <a class="nav-link pr-0" data-toggle="sidebar-left" data-target=".sidebar-left">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-menu">
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                            <line x1="3" y1="6" x2="21" y2="6"></line>
                            <line x1="3" y1="18" x2="21" y2="18"></line>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->

<script src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>

<script src="{{asset('js/app.js')}}"></script>


<script>
    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsCountElem = notificationsWrapper.find('p[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('h4.notification-label');
    var new_message = notificationsWrapper.find('.new_message');
    new_message.hide();

    var pusher = new Pusher('46d7189298561c610e66', {
        cluster: 'mt1'
    });
    var channel = pusher.subscribe('create-doctor');
    channel.bind('my-event', function(data) {

        var newNotificationHtml = `
       <h4 class="notification-label mb-1">` + data.message + data.doctor + `</h4>
       <div class="notification-subtext">` + data.created_at + `</div>`;
        new_message.show();
        notifications.html(newNotificationHtml);
        notificationsCount += 1;
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(`You have ` + notificationsCount +
            ` unread Notifications`);
        notificationsWrapper.show();
    });
</script>
