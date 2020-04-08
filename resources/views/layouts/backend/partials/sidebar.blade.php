<aside class="main-sidebar">
    <!-- sidebar: style can be found insidebar.less -->

    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Dashboard</li>
            <li class="{{\Illuminate\Support\Facades\Request::is('home') ? 'active' : ''}}"><a href="{{url('home')}}"><i class="fa fa-dashboard"></i>Dashboard</a></li>

            <li class="header">Password</li>
            <li class="{{\Illuminate\Support\Facades\Request::is('password') ? 'active' : ''}}"><a href="{{url('password')}}"><i class="fa fa-cog"></i>Change Password</a></li>

            @if(Auth::user()->role == 'admin')
                <li class="header">User Panel</li>
                <li class="{{\Illuminate\Support\Facades\Request::is('users') ? 'active' : ''}}"><a href="{{url('users')}}"><i class="fa fa-users"></i> View Registered Users</a></li>

                <li class="header">Election Area</li>
                <li class="treeview {{\Illuminate\Support\Facades\Request::is('elections') || \Illuminate\Support\Facades\Request::is('elections/*') ? 'active' : ''}}">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Election</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{\Illuminate\Support\Facades\Request::is('elections/create') ? 'active' : ''}}"><a href="{{url('elections/create')}}"><i class="fa fa-plus-square"></i> Create Election</a>
                        </li>
                        <li class="{{\Illuminate\Support\Facades\Request::is('elections') ? 'active' : ''}}"><a href="{{url('elections')}}"><i class="fa fa-eye"></i> Elections</a></li>
                    </ul>
                </li>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->role != 'voter')
            <li class="header">Applications</li>
            <li class="treeview {{\Illuminate\Support\Facades\Request::is('applies') || \Illuminate\Support\Facades\Request::is('pending-application') ||
                                  \Illuminate\Support\Facades\Request::is('reject-applications')  ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Application</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->role == 'candidate')
                        <li class="{{\Illuminate\Support\Facades\Request::is('applies') ? 'active' : ''}}"><a href="{{url('applies')}}"><i class="fa fa-check"></i>Apply</a></li>
                    @endif

                    <li class="{{\Illuminate\Support\Facades\Request::is('pending-application') ? 'active' : ''}}"><a href="{{url('pending-application')}}"><i class="fa fa-hourglass-3"></i> Pending Application</a></li>
                    <li class="{{\Illuminate\Support\Facades\Request::is('reject-applications') ? 'active' : ''}}"><a href="{{url('reject-applications')}}"><i class="fa fa-user-times"></i> Reject Application</a></li>
                </ul>
            </li>
            @endif

            @if(Auth::user()->role == 'candidate')
            <li class="header">Applications</li>
            <li class="treeview {{\Illuminate\Support\Facades\Request::is('socials') || \Illuminate\Support\Facades\Request::is('socials/*')  ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Social Activities</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                        <li class="{{\Illuminate\Support\Facades\Request::is('socials/create') ? 'active' : ''}}"><a href="{{url('socials/create')}}"><i class="fa fa-check"></i>Add Social Activity</a></li>
                    <li class="{{\Illuminate\Support\Facades\Request::is('socials') ? 'active' : ''}}"><a href="{{url('socials')}}"><i class="fa fa-eye"></i> All Social Activities</a></li>
                </ul>
            </li>
            @endif

            <li class="header">Candidates</li>
            <li class="{{\Illuminate\Support\Facades\Request::is('candidates') ? 'active' : ''}}"><a href="{{url('candidates')}}"><i class="fa fa-user"></i>Candidates</a></li>

            <li class="header">Voting Area</li>
            <li class="{{\Illuminate\Support\Facades\Request::is('voters') ? 'active' : ''}}"><a href="{{url('voters')}}"><i class="fa fa-area-chart"></i>Voter Area</a></li>

            <li class="header">Result Area</li>
            <li class="treeview {{\Illuminate\Support\Facades\Request::is('results') || \Illuminate\Support\Facades\Request::is('winner')  ? 'active' : ''}}">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Result</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{\Illuminate\Support\Facades\Request::is('winner') ? 'active' : ''}}"><a href="{{url('winner')}}"><i class="fa fa-check"></i>Winner</a></li>

                    <li class="{{\Illuminate\Support\Facades\Request::is('results') ? 'active' : ''}}"><a href="{{url('results')}}"><i class="glyphicon glyphicon-filter"></i> Area Wise</a></li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
