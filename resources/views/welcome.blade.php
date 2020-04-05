<!DOCTYPE HTML>

<html>
    <head>
        <title>Online Voting System</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="{{URL::asset('dist/css/main.css')}}" />
        <link rel="stylesheet" href="{{URL::to('bower_components/font-awesome/css/font-awesome.min.css')}}">

    </head>
    <body>

        <!-- Header -->
            <header id="header">
                <div class="inner">
                    <a href="{{url('/')}}" class="logo"><strong>Online </strong> Voting System</a>
                    <nav id="nav">
                        <a href="{{url('/')}}">Home</a>
                        <a href="{{route('login')}}">Login</a>
                        <a href="{{route('register')}}">Registration</a>
                        <a href="#about_us">About Us</a>

                    </nav>
                    <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
                </div>
            </header>

        <!-- Banner -->
            <section id="banner">
                <div class="inner">
                    <header>
                        <h1>Welcome to Site</h1>
                    </header>

                    <div class="flex ">

                        <div>
                            <span class="icon fa-car"></span>
                            <h3>{{count($voters)}}</h3>
                            <p>Total Voters</p>
                        </div>

                        <div>
                            <span class="icon fa-camera"></span>
                            <h3>{{count($candidates)}}</h3>
                            <p>Total Candidates</p>
                        </div>

                        <div>
                            <span class="icon fa-bug"></span>
                            <h3>{{count($elections)}}</h3>
                            <p>Total elections</p>
                        </div>

                    </div>

                    <footer>
                        <a href="{{route('register')}}" class="button">Get Started</a>
                    </footer>
                </div>
            </section>
 <section id="banner">
                <div class="inner section-padding" id="about_us">
                    <h2 style="color: white">About Us</h2>
                    <p style="color: white">
                    Presently voting is performed using ballot paper and the counting is done
                    manually, hence it consumes a lot of time. There can be possibility of
                    invalid votes. All these make election a tedious task.
                    In our Online Voting System, voting and counting is done with the help
                    of computer. It saves time, avoid error in counting and there will be no
                    invalid votes. It makes the election process easy. The user interface is
                    designed keeping in mind that many people are not computer savvy.
                    It is very user friendly and convenient application to use.
                    It minimizes human errors as everything is automated and is integrated
                    with systematic procedure.</p>
                </div>
            </section>




        <!-- Footer -->
            <footer id="footer">

                    <div class="copyright" style="font-size: 25px;color: white">
                        &copy; Online Voting System
                    </div>

                </div>
            </footer>

        <!-- Scripts -->
            <script src="assets/js/jquery.min.js"></script>
            <script src="assets/js/skel.min.js"></script>
            <script src="assets/js/util.js"></script>
            <script src="assets/js/main.js"></script>

    </body>
</html>
