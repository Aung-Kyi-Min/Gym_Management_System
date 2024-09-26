@extends('layouts.layout')

@section('content')

    <!-- slider section -->
    <section class=" slider_section position-relative">
        <div class="slider_container adj-size">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
                                <div class="detail-box">
                                <h2>
                                    Get Your Body
                                </h2>
                                <h1>
                                    Fitness Here
                                </h1>
                                <p>
                                    Are you ready to take your fitness to the next level? Join our gym and let us help you reach your goals.
                                    Our experienced trainers will guide you every step of the way, and our state-of-the-art equipment will make
                                    your workouts more effective and enjoyable. Don't wait any longer, start your fitness journey today!
                                </p>
                                <div class="btn-box">
                                    <a href="#about-us" class="btn-1">
                                    Read More
                                    </a>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                    <div class="container">
                        <div class="row">
                        <div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
                            <div class="detail-box">
                            <h2>
                                Unleashed Your Inner Fighter
                            </h2>
                            <h1>
                                IN HERE
                            </h1>
                            <p>
                                Boxing is not just a sport, it's a way of life.
                                Our gym offers top-notch boxing training that will help you improve your strength,
                                coordination, and mental toughness. Our experienced trainers will teach you the fundamentals of boxing
                                and guide you towards achieving your goals.
                                Join our gym and become the best version of yourself through boxing!
                            </p>
                            <div class="btn-box">
                                <a href="#about-us" class="btn-1">
                                Read More
                                </a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="carousel-item ">
                    <div class="container">
                        <div class="row">
                        <div class="col-lg-6 col-md-7 offset-md-6 offset-md-5">
                            <div class="detail-box">
                            <h2>
                                Aim Your Target Body Weight
                            </h2>
                            <h1>
                                WITH US
                            </h1>
                            <p>
                                Are you ready to transform your body and your life?
                                Our gym offers personalized support and cutting-edge equipment to help you reach your weight loss goals.
                                Our experienced trainers will guide you every step of the way, and our supportive community will keep you motivated.
                                Don't wait any longer, start your weight loss journey today!
                            </p>
                            <div class="btn-box">
                                <a href="#about-us" class="btn-1">
                                Read More
                                </a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end slider section -->

    <!-- service section -->
    <section class="service_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Our Main Services
                </h2>
            </div>
            <div class="service_container">
                <div class="box">
                    <img src="/images/gym.webp" class="test" alt="">
                    <h6 class="visible_heading">
                        Gym Traning
                    </h6>
                    <div class="link_box">
                        <a href="{{route('user.workout')}}">
                        <img src="images/link.png" alt="">
                        </a>
                        <h6>
                        Gym Traning
                        </h6>
                    </div>
                </div>
                <div class="box">
                    <img src="images/boxing.jpg" class="test" alt="">
                    <h6 class="visible_heading">
                        Boxing Traning
                    </h6>
                    <div class="link_box">
                        <a href="{{route('user.workout')}}">
                            <img src="images/link.png" alt="">
                        </a>
                        <h6>
                            Boxing Traning
                        </h6>
                    </div>
                </div>
                <div class="box">
                    <img src="images/cardio.jpg" class="test" alt="">
                    <h6 class="visible_heading">
                        Cardio Traning
                    </h6>
                    <div class="link_box">
                        <a href="{{route('user.workout')}}">
                            <img src="images/link.png" alt="">
                        </a>
                    <h6>
                        Cardio Traning
                    </h6>
                    </div>
                </div>
                <div class="box">
                    <img src="images/custom.jpg" class="test" alt="">
                    <h6 class="visible_heading">
                        Custom Package
                    </h6>
                    <div class="link_box">
                        <a href="{{route('user.workout')}}">
                            <img src="images/link.png" alt="">
                        </a>
                        <h6>
                            Custom Package
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end service section -->

    <!-- instructor section -->
    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Our Instructors
                </h2>
            </div>
            <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($instructors as $index => $instructor)
                    <li data-target="#carouselExample2Indicators" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($instructors as $index => $instructor)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                        <div class="box">
                            <div>
                            <img class="index-profile" src="{{asset('storage/images/admin/instructor/'.$instructor->image)}}" alt="{{$instructor->image}}">
                            </div>
                            <div class="detail-box">
                                <h5>{{ $instructor->name }}</h5>
                                <span>{{ $instructor->speciality }}</span>
                                <p>{{ $instructor->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end instrtuctor section -->

    <!-- Us Example section -->
    <section class="us_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>Why Choose Us</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="box">
                        <div class="text-center index-us">
                            <img src="images/u-1.png" alt="">
                        </div>
                        <div>
                            <h5 class="text-center py-2">QUALITY EQUIPMENT</h5>
                            <p>
                                Welcome to our state-of-the-art gym training center where we prioritize quality equipment
                                to enhance your workout experience. Our top-notch gear is designed to optimize your fitness journey.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box ">
                        <div class="text-center index-us">
                            <img src="images/u-2.png" alt="">
                        </div>

                        <div>
                            <h5 class="text-center py-2">HEALTHY NUTRITION PLAN</h5>
                            <p>
                                Fuel your progress with a personalized healthy nutrition plan tailored to your goals.
                                We ensure that your body gets the nourishment it needs for optimal results.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <div class="text-center index-us">
                            <img src="images/u-3.png" alt="">
                        </div>
                        <div>
                            <h5 class="text-center py-2">SHOWER SERVICE</h5>
                            <p>
                                Relax and rejuvenate with our invigorating shower service after an intense workout session.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box">
                        <div class="text-center index-us">
                            <img src="images/u-4.png" alt="">
                        </div>
                        <div>
                            <h5 class="text-center py-2">UNIQUE TO YOUR NEEDS</h5>
                            <p>
                                Embrace a fitness routine that is tailored to your specific needs, designed by our expert trainers
                                who are dedicated to your success. Join us and embark on a transformative fitness journey today!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


>
    <!-- end us section -->

    <!-- client section -->
    <section class="client_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    What Says Ours Customers
                </h2>
            </div>
            <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach ($feedbacks as $index => $feedback)
                    <li data-target="#carouselExample2Indicators" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($feedbacks as $index => $feedback)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">

                        <div class="box">
                            <div>
                            <img class="index-profile" src="{{asset('storage/images/admin/user/'.$feedback->user->image)}}" alt="{{$feedback->user->image}}">
                            </div>
                            <div class="detail-box">
                                <h5>{{ $feedback->user->name }}</h5>
                                <p>{{ $feedback->message }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- end client section -->

    <!-- result section -->
    <section class="result_section">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-6 px-0">
                <div class="img-box">
                <img src="images/result-img.jpg" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="detail-box">
                <h2>
                    BUILT TO BRING <br>
                    BEST RESULTS
                </h2>
                <p>
                Welcome to our state-of-the-art gym training center,
                where we are built to bring you the best results.
                Our expert instructors are dedicated to guiding you towards achieving your fitness goals,
                    providing personalized workouts and nutritional guidance. With top-of-the-line equipment
                    and a motivating atmosphere, we create the perfect environment for your transformation.
                    Join us today and unlock your full potential, as we are committed to delivering unparalleled fitness success.
                </p>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- end result section -->

    <!-- about section -->
    <section class="about_section layout_padding">
        <div class="container">
            <div class="heading_container">
            <h2 id="about-us">
                About GLP
            </h2>
            </div>
            <div class="box">
            <div class="img-box">
                <img src="images/about-img.png" alt="">
            </div>
            <div class="detail-box">
                <p>
                Welcome to our fitness center, where we provide a holistic approach to health and wellness.
                Our state-of-the-art facility offers a wide range of amenities, including a fully-equipped gym,
                a boxing area, and a variety of cardio machines. We believe that physical fitness is not just about lifting weights
                or running on a treadmill, but it's about achieving balance in all areas of your life.
                Our knowledgeable and friendly staff are dedicated to helping you reach your fitness goals,
                whether that's building strength, increasing endurance, or improving overall health and well-being.
                With our focus on community, we aim to create a supportive and inclusive environment where everyone feels welcome
                and encouraged to be their best selves. Come join us and discover the transformative power of fitness!
                </p>
            </div>
            </div>
        </div>
    </section>
    <!-- end about section -->

    <!-- contact section -->
    <section class="contact_section layout_padding" id="location">
        <div class="container">
            <div class="heading_container">
                <h2>
                    <span>Get In Touch</span>
                </h2>
            </div>
            <div class="layout_padding2-top">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <img src="/images/glplogo.jpg" class="test img-fluid" alt="">
                    </div>

                    <div class="col-md-6">
                        <div class="map_container">
                            <div class="map-responsive">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4490.992998259165!2d95.23757776064735!3d18.822207627994924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c79d2de79ac6fd%3A0xf8603af78e2251e!2sGLP!5e0!3m2!1sen!2smm!4v1685368519212!5m2!1sen!2smm" width="100%" height="390" style="border-0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- end contact section -->

    <!-- info section -->
    <section class="info_section layout_padding2-top">
        <div class="container">
            <div class="row">
            <div class="col-md-4">
                <h6>
                About GLP
                </h6>
                <p>
                    GLP is equipped with a range of fitness facilities to cater to various workout preferences.
                    This may include a well-equipped gym area with cardiovascular machines, strength training equipment,
                    free weights, and functional training areas.
                </p>
            </div>
            <div class="col-md-3 offset-md-1">
                <h6>
                Menus
                </h6>
                <ul>
                <li class=" active">
                    <a class="" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="">
                    <a class="" href="{{route('user.workout')}}">Workout List </a>
                </li>

                <li class="">
                    <a class="" href="{{route('user.successPurchase')}}">Purchase</a>
                </li>
                <li class="">
                    <a class="" href="{{route('user.feedback')}}">Feedback</a>
                </li>
                </ul>
            </div>

            <div class="col-md-3">
                <h6>
                Contact Us
                </h6>
                <div class="info_link-box">
                <a href="#location">
                    <img src="images/location-white.png" alt="">
                    <span> R6CP+MG Pyay</span>
                </a>
                <a class="d-none d-sm-inline-block" href="tel:+95754323345">
                    <img src="images/call-white.png" alt="">
                    <span>+95754323345</span>
                </a>

                <a class="d-inline-block d-sm-none"  href="tel:+95754323345">
                    <img src="images/call-white.png" alt="">
                    <span>+95754323345</span>
                </a>

                <a href="mailto:GLP@gmail.com">
                    <img src="images/mail-white.png" alt="">
                    <span>GLP@gmail.com</span>
                </a>

                </div>
                <div class="info_social">
                <div>
                    <a href="">
                    <img src="images/facebook-logo-button.png" alt="">
                    </a>
                </div>
                <div>
                    <a href="">
                    <img src="images/twitter-logo-button.png" alt="">
                    </a>
                </div>
                <div>
                    <a href="">
                    <img src="images/linkedin.png" alt="">
                    </a>
                </div>
                <div>
                    <a href="">
                    <img src="images/instagram.png" alt="">
                    </a>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- end info section -->
    <script src="../js/sweetalert.min.js"></script>
    @if (Session::has('message'))
        <script>
            swal("Message", "{{ Session::get('message') }}", 'success', {
                button: true,
                button: "Ok",
            });
        </script>
    @endif
    @if (Session::has('success'))
    <script>
        swal("Message", "{{ Session::get('success') }}", 'success', {
            button: true,
            button: "Ok",
        });
    </script>
@endif

@endsection
