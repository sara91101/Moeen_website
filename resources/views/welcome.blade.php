<!DOCTYPE html>
<html lang="trans('app.lg')">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>{{ trans('app.title') }}</title>

        <meta name="description" content="">
        <meta name="keywords" content="">

        <!-- Favicons -->
        <link href="/images/logo_small.jpeg" rel="icon">
        <link href="/images/logo_small.jpeg" rel="apple-touch-icon">

        <!-- Vendor CSS Files -->
        <link href="/website/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/website/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/website/vendor/aos/aos.css" rel="stylesheet">
        <link href="/website/vendor/animate.css/animate.min.css" rel="stylesheet">
        <link href="/website/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="/website/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Main CSS File -->
        <link href="/website/css/main.css" rel="stylesheet">

        <link href="/assets/css/icons.css" rel="stylesheet" >

        <script src='https://www.google.com/recaptcha/api.js'></script>
        @if(app()->getLocale() == "en")
        <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
        <style>
            *{
                font-family: 'Poppins';
            }
            .services .service-item .icon {
                right:-3px;
            }
            .toast-center-center
            {
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: {{ trans('app.align') }} !important;
                direction: {{ trans('app.align') }} !important;
            }
        </style>
        @elseif(app()->getLocale() == "ar")
        <link href="https://fonts.googleapis.com/earlyaccess/droidarabickufi.css" rel="stylesheet">
        <style>
            *{
                font-family: 'Droid Arabic Kufi';
            }
            .services .service-item .icon {
                left:-3px;
            }
            .toast-center-center
            {
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: {{ trans('app.align') }} !important;
                direction: {{ trans('app.align') }} !important;
            }

        </style>
        @endif
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            var url = "";
            function changeLanguage(lang)
            {
                url = document.URL;

                document.cookie = "url="+url;

                window.location = "/change/"+lang;
            }

            function validateFrom(formName,event)
            {
                var recaptcha = document.forms[formName]["g-recaptcha-response"].value;
                if (recaptcha != "")
                {
                    document.forms[formName].submit();
                }

                else
                {
                    toastr.options=
                    {
                        positionClass: "toast-center-center"
                    }
                    toastr.error("{!! trans('app.robot') !!}","{!! trans('app.robot_title') !!}");
                    event.preventDefault();
                }
            }
        </script>


    </head>

    <body class="index-page">


        @if(Session("errorNote") > 0)
            <script>
                toastr.options=
                {
                    positionClass: "toast-center-center"
                }
                toastr.error("{!! Session::get('errorNote') !!}","{!! trans('app.robot_title') !!}");
                sessionStorage.clear();
            </script>
        @endif
        @if(Session::has("note"))
            <script>
                toastr.options=
                {
                    positionClass: "toast-center-center"
                }
                toastr.success("{!! Session::get('note') !!}","{!! trans('app.success') !!}");
                sessionStorage.clear();
            </script>
        @endif

        <header id="header" class="header d-flex align-items-center fixed-top" dir="{{ trans('app.dir') }}">
            <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="/" class="logo d-flex align-items-center">
                <img src="/images/logo_large_black.jpeg" alt="" width="100" height="50">
                <!-- <h1 class="sitename">Selecao</h1> -->
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                <li><a href="#hero" class="active">{{ trans('app.home') }}</a></li>
                <li><a href="#about">{{ trans('app.about') }}</a></li>
                <li><a href="#services">{{ trans('app.services') }}</a></li>
                <li><a href="#partners">{{ trans('app.partners') }}</a></li>
                <li><a href="#team">{{ trans('app.team') }}</a></li>
                <li><a href="#testimonials">{{ trans('app.customers') }}</a></li>
                {{--  <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                    <li><a href="#">Dropdown 1</a></li>
                    <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                        <li><a href="#">Deep Dropdown 1</a></li>
                        <li><a href="#">Deep Dropdown 2</a></li>
                        <li><a href="#">Deep Dropdown 3</a></li>
                        <li><a href="#">Deep Dropdown 4</a></li>
                        <li><a href="#">Deep Dropdown 5</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Dropdown 2</a></li>
                    <li><a href="#">Dropdown 3</a></li>
                    <li><a href="#">Dropdown 4</a></li>
                    </ul>
                </li>  --}}
                <li><a href="#contact">{{ trans('app.contact') }}</a></li>
                <li>
                    {{--  <a href="/change/{{  trans('app.lg') }}">  --}}
                    <a href="javascript:;" onclick="changeLanguage('{{  trans('app.lg') }}')">
                        <i class="bi bi-globe"></i>
                        {{--  &nbsp;{{ trans('app.lang') }}  --}}
                    </a>
                </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            </div>
        </header>

        <main class="main">

            <!-- Hero Section -->
            <section id="hero" class="hero section dark-background {!! trans('app.txt') !!}">

                <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                    <div class="carousel-container">
                        <h2 class="animate__animated animate__fadeInDown {!! trans('app.txt') !!}">{!! trans('app.title') !!}</h2>
                        <p class="animate__animated animate__fadeInUp {!! trans('app.txt') !!}">{{ $introduction[trans('app.home_fld')] }}</p>
                        <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">{{ trans('app.more') }}</a>
                    </div>
                    </div>

                </div>

                <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
                    <defs>
                    <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
                    </defs>
                    <g class="wave1">
                    <use xlink:href="#wave-path" x="50" y="3"></use>
                    </g>
                    <g class="wave2">
                    <use xlink:href="#wave-path" x="50" y="0"></use>
                    </g>
                    <g class="wave3">
                    <use xlink:href="#wave-path" x="50" y="9"></use>
                    </g>
                </svg>

            </section><!-- /Hero Section -->

            <!-- About Section -->
            <section id="about" class="about section" dir="{{ trans('app.dir') }}">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ trans('app.about') }}</h2>
                    {{--  <p>Who we are</p>  --}}
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p>{{ $introduction[trans('app.home_fld')] }}</p>
                        <h5>{{ trans('app.results') }}</h5>
                        <ul>
                            @foreach ($results as $result)
                                <li>
                                    <i class="{{ $result->home_image }}"></i>&nbsp;
                                    <span>
                                        {{ $result[trans('app.home_fld')] }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <p>{{ $about[trans('app.home_fld')] }}</p>
                        <ul>
                            <li>
                                <i class="bi bi-eye"></i>&nbsp;
                                <label><b>{{ trans('app.vision') }}: </b></label>&nbsp;
                                <span>{{ $vision[trans('app.home_fld')] }}</span>
                            </li>
                            <li>
                                <i class="bi bi-envelope"></i>&nbsp;
                                <label><b>{{ trans('app.mission') }}: </b></label>&nbsp;
                                <span>{{ $mission[trans('app.home_fld')] }}</span>
                            </li>
                        </ul>
                        <a href="#" class="read-more"><span>{{ trans('app.more') }}</span><i class="bi bi-arrow-{{ trans('app.arrow') }}"></i></a>
                    </div>

                    </div>

                </div>

            </section><!-- /About Section -->

            <!-- Features Section -->
            <section id="features" class="features section" dir="{{ trans('app.dir') }}">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ trans('app.goals') }}</h2>
                    {{--  <p>What we do offer</p>  --}}
                </div><!-- End Section Title -->

                <div class="container">

                    <ul class="nav nav-tabs row  d-flex" data-aos="fade-up" data-aos-delay="100">
                        @foreach($goals as $goal)
                            <li class="nav-item col-3">
                                <a class="nav-link @if($loop->first) active @endif show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                                    <i class="{{ $goal->home_image }}"></i> &nbsp;&nbsp;
                                    <h4>{{ $goal[trans('app.home_fld')] }}</h4>
                                </a>
                            </li>
                        @endforeach
                    </ul><!-- End Tab Nav -->

                    <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                        <div class="tab-pane fade active show" id="features-tab-1">
                            <div class="row">
                            <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0">
                                <h3>{{ trans('app.values') }}</h3>
                                <ul>
                                    @foreach($motivators as $motivator)
                                        <li>
                                            <i class="{{ $motivator->home_image }}"></i>&nbsp;
                                            <span>{{ $motivator[trans('app.home_fld')] }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-lg-6 order-1 order-lg-2 text-center">
                                <img src="/website/img/working-1.jpg" alt="" class="img-fluid">
                            </div>
                            </div>
                        </div><!-- End Tab Content Item -->

                    </div>

                </div>

            </section><!-- /Features Section -->


            <!-- competitions Section -->
            <section id="competitions" class="testimonials section {{ trans('app.txt') }}" dir="{{ trans('app.dir') }}">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ trans('app.competitions') }}</h2>
                    {{--  <p>What they are saying about us</p>  --}}
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                            {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                                },
                                "1200": {
                                "slidesPerView": 3,
                                "spaceBetween": 10
                                }
                            }
                            }
                        </script>
                    <div class="swiper-wrapper ">
                        @foreach($competitions as $competition)
                            <div class="swiper-slide">
                                <img src="{{ $competition->logo }}" class="testimonial-img" alt="">
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                    </div>

                </div>

            </section><!-- /competitions Section -->

            <!-- Services Section -->
            <section id="services" class="services section {{ trans('app.txt') }}" dir="{{ trans('app.dir') }}">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ trans('app.services') }}</h2>
                    {{--  <p>What we do offer</p>  --}}
                </div><!-- End Section Title -->

                <div class="container">
                    <div class="row gy-4">
                        @php $num = 0; @endphp
                        @foreach ($services as $service)
                        @php if($num % 6 == 0) {$num = 0;} @endphp
                            <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="service-item  position-relative">
                                <div class="icon">
                                    <i class="{{ $service->icon }}" style="color: {{ $colors[$num] }};"></i>
                                </div>
                                <a href="javascript:;">
                                    <h3>{{ $service[trans('app.service_val')] }}</h3>
                                </a>
                                </div>
                            </div><!-- End Service Item -->
                            @php $num++; @endphp
                        @endforeach
                    </div>
                </div>

            </section><!-- /Services Section -->

            <!-- Recent Posts Section -->
            <section id="partners" class="recent-posts section {{ trans('app.txt') }}" dir="{{ trans('app.dir') }}">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ trans('app.partners') }}</h2>
                    {{--  <p>Recent Blog Posts<br></p>  --}}
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="row gy-4">
                        @foreach($partners as $partner)
                            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <article>

                                <div class="post-img">
                                    <img src="{{ $partner->logo }}" alt="" class="img-fluid">
                                </div>

                                {{--  <p class="post-category">Politics</p>  --}}

                                <h2 class="title">
                                    <a href="javascript:;">
                                        {{ $partner[trans('app.team_val')] }}
                                    </a>
                                </h2>

                                {{--  <div class="d-flex align-items-center">
                                    <img src="/website/img/blog/blog-author.jpg" alt="" class="img-fluid post-author-img flex-shrink-0">
                                    <div class="post-meta">
                                    <p class="post-author">Maria Doe</p>
                                    <p class="post-date">
                                        <time datetime="2022-01-01">Jan 1, 2022</time>
                                    </p>
                                    </div>
                                </div>  --}}

                                </article>
                            </div><!-- End post list item -->
                        @endforeach

                    </div><!-- End recent posts list -->

                </div>

            </section><!-- /Recent Posts Section -->


            <!-- Call To Action Section -->
            <section  id="service-details" class="service-details section" dir="{{ trans('app.dir') }}">


                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up" dir="{{ trans('app.dir') }}">
                    <h2>{{ trans('app.gover') }}</h2>
                    {{--  <p>Recent Blog Posts<br></p>  --}}
                </div><!-- End Section Title -->
              <div class="container">

                {{--  <div class="row" data-aos="zoom-in" data-aos-delay="100">
                  <div class="col-xl-9 text-center text-xl-start">
                    <h3>Call To Action</h3>
                    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  </div>
                  <div class="col-xl-3 cta-btn-container text-center">
                    <a class="cta-btn align-middle" href="#">Call To Action</a>
                  </div>
                </div>  --}}

                <div class="row gy-5">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                      <div class="service-box">
                        <h4 class="text-center">{{ trans('app.gover_style') }}</h4>
                        <br>
                        <div class="text-center text-white" style="font-size: 30px;background-color: #ef6603;padding-top: 15px;padding-bottom: 15px;">
                            <i class="bi bi-buildings"></i>
                            {{ trans('app.agency') }}
                        </div>
                        <br>
                        <div class="services-list">
                            <a href="javascript:;">
                                <i class="bi bi-arrow-{{ trans('app.arrow') }}-circle"></i>&nbsp;
                                <span>{{ trans('app.health') }}</span>
                            </a>
                            <a href="javascript:;"><i class="bi bi-arrow-{{ trans('app.arrow') }}-circle"></i>&nbsp;<span>{{ trans('app.awareness') }}</span></a>
                            <a href="javascript:;"><i class="bi bi-arrow-{{ trans('app.arrow') }}-circle"></i>&nbsp;<span>{{ trans('app.garden') }}</span></a>
                        </div>
                        <br>
                        <div class="text-center text-white" style="background-color: #ef6603;padding-top: 15px;padding-bottom: 15px;">
                            <i class="las la-people-carry" style="font-size: 64px;"></i>
                        </div>
                      </div><!-- End Services List -->
                    </div>



                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                        <div class="service-box">
                            <h4 class="text-center">{{ trans('app.Advanced_style') }}</h4>
                            <br>
                            <div class="text-center text-white" style="font-size: 30px;background-color: #ef6603;padding-top: 15px;padding-bottom: 15px;">
                                <i class="bi bi-buildings"></i>
                                {{ trans('app.agency') }}
                            </div>
                            <br>
                            <div class="services-list">
                                <a href="javascript:;">
                                    <i class="bi bi-arrow-{{ trans('app.arrow') }}-circle"></i>&nbsp;
                                    <span>{{ trans('app.contract') }}</span>
                                </a>
                            </div>
                            <br>
                            <div class="text-center text-white" style="font-size: 30px;background-color: #ef6603;padding-top: 15px;padding-bottom: 15px;">
                                <i class="las la-city"></i>
                                {{ trans('app.organization') }}
                            </div>
                            <br>
                          <div class="services-list">
                              <a href="javascript:;">
                                  <i class="bi bi-arrow-{{ trans('app.arrow') }}-circle"></i>&nbsp;
                                  <span>{{ trans('app.health') }}</span>
                              </a>
                              <a href="javascript:;"><i class="bi bi-arrow-{{ trans('app.arrow') }}-circle"></i>&nbsp;<span>{{ trans('app.awareness') }}</span></a>
                              <a href="javascript:;"><i class="bi bi-arrow-{{ trans('app.arrow') }}-circle"></i>&nbsp;<span>{{ trans('app.garden') }}</span></a>
                          </div>
                          <br>
                          <div class="text-center text-white" style="background-color: #ef6603;padding-top: 15px;padding-bottom: 15px;">
                              <i class="las la-people-carry" style="font-size: 64px;"></i>
                          </div>
                        </div><!-- End Services List -->
                      </div>

              </div>

            </section><!-- /Call To Action Section -->

            <!-- Team Section -->
            <section id="team" class="team section" dir="{{ trans('app.dir') }}">

                <!-- Section Title -->
                <div class="container section-title {{ trans('app.txt') }}" data-aos="fade-up">
                    <h2>{{ trans('app.team') }}</h2>
                    {{--  <p>Our Hardworking Team</p>  --}}
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="row gy-4 text-center">
                        @foreach ($team as $member)
                            <div class="col-lg-4 col-md-12 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                                <div class="team-member">
                                <div class="member-img">
                                    <div align="center">
                                        <img src="/teamImages/{{ $member->image }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="social">
                                    <a href="javascript:;"><i class="bi bi-twitter-x"></i></a>
                                    <a href="javascript:;"><i class="bi bi-facebook"></i></a>
                                    <a href="javascript:;"><i class="bi bi-instagram"></i></a>
                                    <a href="javascript:;"><i class="bi bi-linkedin"></i></a>
                                    </div>
                                </div>
                                <div class="member-info">
                                    <h4>{{ $member[trans('app.team_val')] }}</h4>
                                    <span>{{ $member[trans('app.job_fld')] }}</span>
                                </div>
                                </div>
                            </div><!-- End Team Member -->
                        @endforeach
                    </div>

                </div>

            </section><!-- /Team Section -->



            <!-- Testimonials Section -->
            <section id="testimonials" class="testimonials section {{ trans('app.txt') }}" dir="{{ trans('app.dir') }}">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ trans('app.customers') }}</h2>
                    {{--  <p>What they are saying about us</p>  --}}
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                            {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "breakpoints": {
                                "320": {
                                "slidesPerView": 1,
                                "spaceBetween": 40
                                },
                                "1200": {
                                "slidesPerView": 3,
                                "spaceBetween": 10
                                }
                            }
                            }
                        </script>
                    <div class="swiper-wrapper ">
                        @foreach($customers as $customer)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="{{ $customer->logo }}" class="testimonial-img" alt="">
                                    <h3>{{ $customer[trans('app.team_val')] }}</h3>
                                </div>
                            </div><!-- End testimonial item -->
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                    </div>

                </div>

            </section><!-- /Testimonials Section -->

            <!-- Contact Section -->
            <section id="contact" class="contact section" dir="{{ trans('app.dir') }}">

                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
                    <h2>{{ trans('app.contact') }}</h2>
                    {{--  <p>Contact Us</p>  --}}
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade" data-aos-delay="100">

                    <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>{{ trans('app.address') }}</h3>
                            <p>{{ $address[trans('app.home_fld')] }}</p>
                        </div>
                        </div><!-- End Info Item -->

                        @foreach($phones as $phone)
                            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>{{ trans('app.phone') }}</h3>
                                <p dir="ltr">{{ $phone[trans('app.home_fld')] }}</p>
                            </div>
                            </div><!-- End Info Item -->
                        @endforeach

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>{{ trans('app.email') }}</h3>
                            <p>{{ $email[trans('app.home_fld')] }}</p>
                        </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8">
                        <form action="/contacts" method="POST" class="php-email-form" name="my-form" onsubmit="validateFrom('my-form',event)">
                            @csrf
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="{{ trans('app.name') }}" required>
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="{{ trans('app.email') }}" required>
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="{{ trans('app.subject') }}">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="msg" rows="6" placeholder="{{ trans('app.message') }}" required></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">{{ trans('app.send') }}</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                    </div>

                </div>

            </section><!-- /Contact Section -->

        </main>

        <footer id="footer" class="footer dark-background">
            <div class="container">
            <h3 class="sitename">{{ trans('app.title') }}</h3>
            {{--  <p>{{ $goals[0][trans('app.home_fld')] }}</p>  --}}
            <div class="social-links d-flex justify-content-center">
                <a href="https://tr.ee/AOpt3LihxN"><i class="bi bi-twitter-x"></i></a>
                <a href="https://www.facebook.com/moeen2030dev/"><i class="bi bi-facebook"></i></a>
                <a href="https://tr.ee/wlPoOcWMuD"><i class="bi bi-instagram"></i></a>
                <a href="https://www.threads.net/@moeen2030dev"><i class="bi bi-threads"></i></a>
                <a href="https://tr.ee/KAuJ9QXCnw"><i class="bi bi-snapchat"></i></a>
                <a href="https://tr.ee/T-sCCutcER"><i class="bi bi-whatsapp"></i></a>
                <a href="https://tr.ee/BmaF1M3IX1"><i class="bi bi-tiktok"></i></a>
            </div>
            <div class="container">
                <div class="copyright">
                <span>Copyright</span> <strong class="px-1 sitename">MOEEN</strong> <span>All Rights Reserved</span>
                </div>
                <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if youve purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                {{--  Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>  --}}
                </div>
            </div>
            </div>
        </footer>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="/website/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        {{--  <script src="/website/vendor/php-email-form/validate.js"></script>  --}}
        <script src="/website/vendor/aos/aos.js"></script>
        <script src="/website/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="/website/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="/website/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="/website/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Main JS File -->
        <script src="/website/js/main.js"></script>

        <script>
            document.addEventListener('contextmenu', event => event.preventDefault());
        </script>
    </body>

</html>
