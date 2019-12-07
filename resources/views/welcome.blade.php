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
                        <a href="#about_us">About Us</a>
                        <a href="">Contact Us</a>
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
                    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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