<header class="main-header">
    <!-- Logo -->
    <a href="{{url('home')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Admin</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu" >
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(empty(Auth::user()->image))
                        <img src="{{asset('images/avatar.png')}}" class="user-image" alt="User Image">
                        @else
                        <img src="{{asset('images/'.Auth::user()->image)}}" class="user-image" alt="User Image">
                        @endif
                        <span class="hidden-xs">{{Auth::check() ? Auth::user()->name : ""}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            @if(empty(Auth::user()->image))
                        <img src="{{asset('images/avatar.png')}}" class="image-circle" alt="User Image">
                        @else
                        <img src="{{asset('images/'.Auth::user()->image)}}" class="image-circle" alt="User Image">
                        @endif

                            <p>
                                {{Auth::check() ? Auth::user()->name : Auth::user()->name}}
                                <small>Member since {{Auth::check() ? Auth::user()->created_at->diffForHumans() : Auth::user()->created_at->diffForHumans()}}</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{url('profiles',Auth::check() ? Auth::id() : Auth::id())}}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>


    </nav>
</header>

