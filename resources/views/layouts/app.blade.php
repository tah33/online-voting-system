<!DOCTYPE html>
<html>
<head>
    <title>OVS</title>
    <link rel="shortcut icon" href="{{ asset('public/favicon.jpg') }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
          href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
          href="{{asset('bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('bower_components/select2/dist/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{asset('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')}}"></script>
    <script src="{{asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('home')}}" class="logo">
            <!-- mini logo for siiiidebar mini 50x50 pixels -->
            <span class="logo-mini">{{Auth::user()->name}}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Dashboard</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <ul class="dropdown-menu">
                            <ul class="menu">
                                </li>
                            </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            @if(Auth::user()->image == "")
                                <img src="{{asset('images/avatar.png')}}" class="user-image">
                            @else
                                <img src="{{asset('images/'.Auth::user()->image)}}" class="user-image">
                            @endif
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                @if(Auth::user()->image =='')
                                    <img src="{{asset('images/avatar.png')}}" class="img-circle">
                                @else
                                    <img src="{{asset('images/'.Auth::user()->image)}}" class="img-circle">
                                @endif
                                <p>
                                     {{Auth::user()->name}}
                                    <small>Member since {{Auth::user()->created_at->diffForHumans()}}</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{url('profile')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                     <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    @if(Auth::user()->image =='')
                        <img src="{{asset('images/avatar.png')}}" class="img-circle">
                    @else
                        <img src="{{asset('images/'.Auth::user()->image)}}" class="img-circle">
                    @endif
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                </div>
            </div>
            <br>
            <li><a href="{{url('password')}}"><i class="glyphicon glyphicon-wrench"></i>Change Password</a></li>
            <br><ul class="sidebar-menu" data-widget="tree">
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
                            <li><a href="{{url('elections/create')}}"><i class="fa fa-user-plus"></i> Create Election</a></li>
                                <li>
                                    <a href="{{url('elections')}}"><i class="fa fa-users"></i> Elections</a>
                                </li>
                        </ul>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'candidate')
                           <li class="treeview">
                        <a href="#">
                            <i class="fa fa-share"></i> <span>Application</span>
                            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{url('candidates')}}"><i class="fa fa-user-plus"></i>Apply</a></li>
                                <li>
                                    <a href="{{url('pending-application')}}"><i class="fa fa-users"></i> Pending Application</a>
                                </li>
                                <li>
                                    <a href="{{url('reject-applications')}}"><i class="fa fa-users"></i> Reject Application</a>
                                </li>
                        </ul>
                        </li>
                        @endif
                        @if(Auth::user()->role == 'admin')
                        <li>
                                    <a href="{{url('pending-application')}}"><i class="fa fa-users"></i> Pending Application</a>
                                </li>
                                @endif
                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'candidate')

                                <li>
                                    <a href="{{url('candidates')}}"><i class="fa fa-users"></i>Candidates</a>
                                </li>
                                @endif
                         @if(Auth::user()->role == 'voter')

                                <li>
                                    <a href="{{url('voters')}}"><i class="fa fa-users"></i>Voter Area</a>
                                </li>
                                @endif


            </ul>
            @yield('sidebar')
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>

        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.18
        </div>
        <strong>©<?php echo date("Y"); ?> Copyright. <a
                href="https://www.datatrixsoft.com">Online Voting</a>.</strong> All rights
        reserved.
    </footer>

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 3 -->
<script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<script src="{{asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="sweetalert2.all.min.js"></script>
@stack('script-file');
<script>
    $(function () {
        $(".select2").select2();
        $(".btn-success").click(function () {
            var html = $(".clone").html();
            $(".increment").after(html);
        });

        $("body").on("click", ".btn-danger", function () {
            $(this).parents(".control-group").remove();
        });


    })

    $(document).ready(function () {
        $("#formButton").click(function () {
            $("#form1").toggle();
        });
    });
</script>

</body>

</html>
