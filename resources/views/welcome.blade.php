<!DOCTYPE HTML>

<html>
    <head>
        <title>Online Voting System</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
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
                            <h3>Aliquam</h3>
                            <p>Suspendisse amet ullamco</p>
                        </div>

                        <div>
                            <span class="icon fa-camera"></span>
                            <h3>Elementum</h3>
                            <p>Class aptent taciti ad litora</p>
                        </div>

                        <div>
                            <span class="icon fa-bug"></span>
                            <h3>Ultrices</h3>
                            <p>Nulla vitae mauris non felis</p>
                        </div>

                    </div>

                    <footer>
                        <a href="{{route('register')}}" class="button">Get Started</a>
                    </footer>
                </div>
            </section>


       
        <!-- Footer -->
            <footer id="footer">

                    <div class="copyright" style="font-size: 25px">
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