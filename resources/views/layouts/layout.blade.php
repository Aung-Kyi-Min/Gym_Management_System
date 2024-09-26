<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>GLP</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,600;1,400&display=swap" rel="stylesheet">
    {{--<link rel="stylesheet" href="/css/sourcesanspro-font.css.css">--}}

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap4.min.css" />
    <link rel="stylesheet" href="/css/bootstrap.css">

    <!-- fonts style -->
    <link  rel="stylesheet" href="/css/font.css" />
    <link rel="stylesheet" href="/css/style.css">
    {{--<link rel="stylesheet" href="/css/template2.css">--}}

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
</head>

<body>
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container">
                <a class="navbar-brand mr-5" href="/">
                    <img src="/images/logo.png" alt="" />
                    <span>
                        GLP
                    </span>
                </a>
                <div class="contact_nav " id="">
                    <ul class="navbar-nav ">
                        <li class="nav-item mt-2 ml-5 mr-5">
                            <a class="nav-link" href="#location">
                                <img src="/images/location.png" alt="" /><br>
                                <span>Location</span>
                            </a>
                        </li>
                        <li class="nav-item mt-2 ml-5 mr-5">
                            <a class="nav-link " href="tel:+95754323345">
                                <img src="/images/call.png" alt="" />
                                <span>+95754323345</span>
                            </a>
                        </li>
                        <li class="nav-item mt-2 ml-5 mr-5">
                            <a class="nav-link" href="mailto:GLP@gmail.com">
                                <img src="/images/envelope.png" alt="" />
                                <span>GLP@gmail.com</span>
                            </a>
                        </li>

                        <li class="nav-item ml-5 mb-2">
                            
                        </li>
                    </ul>
                </div>
                <div class="">
                                @if (Auth::check())
                                    <div class=" ">
                                        <img src="{{auth()->user()->image ? asset('storage/images/admin/user/' .auth()->user()->image) : 'https://bootdey.com/img/Content/avatar/avatar7.png' }}"
                                            class="w-50 rounded-circle mb-3 user-profile" onclick="showProfile()" />
                                        <div id="profile-buttons" class="hidden mt-1">
                                            <a href="{{ route('user.profile') }}" class="btn btn-info btn-sm">
                                                Profile
                                            </a>
                                            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
                                        </div>
                                    @else
                                        <div class="mt-4 row">
                                            <a href="{{ route('auth.login') }}" class="col-md-6 text-dark auth-btn">
                                                Login
                                            </a>
                                            <a href="{{ route('auth.register') }}" class="col-md-6 text-dark auth-btn">
                                                Register
                                            </a>
                                        </div>
                                @endif
                            </div>
            </nav>
        </div>
        <div class="container-fluid purple-bg">
            <div class="custom_nav2">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav  ">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.index') }}">Home </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.workout') }}">Workout List</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('member.purchase') }}">Purchase</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.feedback') }}">Feedback</a>
                                </li>
                                @if (Auth::check())
                                <li class="nav-item">
                                    <a href="{{ route('purchaseHistory') }}" class="nav-link text-dark" >History</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- end header section -->
    @yield('content')

    <!-- footer section -->
    <section class="container-fluid footer_section ">
        <p>
            &copy; 2023 All Rights Reserved.
        </p>
    </section>
    <!-- footer section -->

    <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.js"></script>
    <script type="text/javascript" src="../js/anchor.js"></script>

    <script>
        function openNav() {
            document.getElementById("myNav").classList.toggle("menu_width");
            document
                .querySelector(".custom_menu-btn")
                .classList.toggle("menu_btn-style");
        }
    </script>
    <script>
        function showProfile() {
            const profileButtons = document.getElementById("profile-buttons");
            profileButtons.classList.remove("hidden");
        }
    </script>

</body>

</html>
