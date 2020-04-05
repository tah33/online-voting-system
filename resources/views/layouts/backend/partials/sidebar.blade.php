<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li><a href="{{url('password')}}"><i class="glyphicon glyphicon-cog"></i>Change Password</a></li>

            @if(Auth::user()->role == 'admin')
                <li>
                    <a href="{{url('users')}}"><i class="fa fa-users"></i> View Registered Users</a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-share"></i> <span>Election</span>
                        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('elections/create')}}"><i class="fa fa-plus-square"></i> Create Election</a>
                        </li>
                        <li>
                            <a href="{{url('elections')}}"><i class="fa fa-eye"></i> Elections</a>
                        </li>
                    </ul>
                </li>
            @endif
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Application</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    @if(Auth::user()->role == 'candidate')
                        <li><a href="{{url('applies')}}"><i class="fa fa-check"></i>Apply</a></li>
                    @endif

                    <li>
                        <a href="{{url('pending-application')}}"><i class="fa fa-hourglass-3"></i> Pending
                            Application</a>
                    </li>
                    <li>
                        <a href="{{url('reject-applications')}}"><i class="fa fa-user-times"></i> Reject Application</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{url('candidates')}}"><i class="fa fa-user"></i>Candidates</a>
            </li>


            <li>
                <a href="{{url('voters')}}"><i class="fa fa-area-chart"></i>Voter Area</a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Result</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('winner')}}"><i class="fa fa-check"></i>Winner</a></li>

                    <li>
                        <a href="{{url('results')}}"><i class="glyphicon glyphicon-filter"></i> Area Wise</a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
