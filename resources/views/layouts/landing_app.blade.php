<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>Sicakra Kota Madiun</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('asset_admin/Lambang_Kota_Madiun.png') }}" />
  
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/slick.css') }}">
        
    <!--====== Font Awesome CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/font-awesome.min.css') }}">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/LineIcons.css') }}">
        
    <!--====== Animate CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/animate.css') }}">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/magnific-popup.css') }}">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/bootstrap.min.css') }}">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/default.css') }}">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="{{ asset('landing/assets/css/style.css') }}">
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
   
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header class="header-area">
        <div class="navbar-area headroom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                           
                            <a class="navbar-brand" href="{{ route('landing') }}" style="max-width:15%; max-height:15%">
                               
                                <img src="{{ asset('landing/assets/images/LOGO_PENDEKAR DISBUD.png') }}" alt="Logo">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav m-auto" style="position: absolute; right:0;">
                                    <li class="nav-item {{ Request::is('*landing*') ? 'active' : '' }}">
                                        <a href="{{ route('landing') }}">Beranda</a>
                                    </li>
                                    {{-- <li class="nav-item {{ Request::is('*kalender*') ? 'active' : '' }}">
                                        <a href="{{ route('kalender') }}">Kalender </a>
                                    </li> --}}
                            
                            @guest

                                    @if (Route::has('login'))
                                    <hr>
                                    <li class="nav-item ">
                                     <a href="{{ route('login') }}" style=" background-color:#f14836;background-color: #f14836;padding: 28px;color: white;padding-top: 8px;padding-bottom: 8px;">{{ __('Masuk') }} </a>
                                    </li>
                                    <!-- navbar collapse -->
                                    {{-- <div class="navbar-btn d-none d-sm-inline-block">
                                        <a class="main-btn" href="{{ route('login') }}">{{ __('Masuk') }}</a>
                                    </div> --}}
                                    @endif
                         
                            @else

                                <li class="nav-item">
                                    <a href="{{ route('gantiPassword') }}"> Pengaturan Akun</a>
                                </li>
                                @if(auth()->user()->hasRole('admin'))
                                <li class="nav-item"><a href="{{ route('admin.page') }}">Dashboard</a></li>
                                @elseif(auth()->user()->hasRole('superadmin'))
                                <li class="nav-item"><a href="{{ route('superadmin.page') }}">Dashboard</a></li>
                                @elseif(auth()->user()->hasRole('user'))
                                <li class="nav-item"><a href="{{ route('user.page') }}">Dashboard</a></li>
                                
                                @elseif(auth()->user()->hasRole('kelurahan'))
                                <li class="nav-item"><a href="{{ route('kelurahan.page') }}">Dashboard</a></li>
                              
                                @elseif(auth()->user()->hasRole('kecamatan'))
                                <li class="nav-item"><a href="{{ route('kecamatan.page') }}">Dashboard</a></li>
                                @endif
                                <hr>
                                <li class="nav-item">
                                    <a style=" background-color:#f14836;background-color: #f14836;padding: 28px;color: white;padding-top: 8px;padding-bottom: 8px;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"> {{ __('Keluar') }}</a>
                                   
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                                 
                                
                            @endguest
                                </ul>
                            </div> 
                          
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        @yield('header-content')
    </header>
    
    @yield('main-content')
    <!--====== HEADER PART ENDS ======-->
{{--     
    <!--====== ABOUT PART START ======-->
    
   
    
    <!--====== ABOUT PART ENDS ======-->
    
  
    
    <!--====== SERVICE PART START ======-->
    
    <section id="service" class="service-area pt-105">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <div class="section-title wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h6 class="sub-title">Why Us</h6>
                        <h4 class="title">The reasons to choose us <span>as your business partner</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="service-wrapper mt-60 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                <div class="row no-gutters justify-content-center">
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service d-flex">
                            <div class="service-icon">
                                <img src="{{ asset('landing/assets/images/service-1.png') }}" alt="Icon">
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">Highly Experienced</h4>
                                <p class="text">Lorem Ipsum is simply dummy tex of the printing and typesetting industry. Lorem Ipsum .</p>
                            </div>
                            <div class="shape shape-1">
                                <img src="{{ asset('landing/assets/images/shape/shape-1.svg') }}" alt="shape">
                            </div>
                            <div class="shape shape-2">
                                <img src="{{ asset('landing/assets/images/shape/shape-2.svg') }}" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service service-border d-flex">
                            <div class="service-icon">
                                <img src="{{ asset('landing/assets/images/service-2.png') }}" alt="Icon">
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">Bunch of Services</h4>
                                <p class="text">Lorem Ipsum is simply dummy tex of the printing and typesetting industry. Lorem Ipsum .</p>
                            </div>
                            <div class="shape shape-3">
                                <img src="{{ asset('landing/assets/images/shape/shape-3.svg') }}" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                    <div class="col-lg-4 col-md-7">
                        <div class="single-service d-flex">
                            <div class="service-icon">
                                <img src="{{ asset('landing/assets/images/service-3.png') }}" alt="Icon">
                            </div>
                            <div class="service-content media-body">
                                <h4 class="service-title">Quality Support</h4>
                                <p class="text">Lorem Ipsum is simply dummy tex of the printing and typesetting industry. Lorem Ipsum .</p>
                            </div>
                            <div class="shape shape-4">
                                <img src="{{ asset('landing/assets/images/shape/shape-4.svg') }}" alt="shape">
                            </div>
                            <div class="shape shape-5">
                                <img src="{{ asset('landing/assets/images/shape/shape-5.svg') }}" alt="shape">
                            </div>
                        </div> <!-- single service -->
                    </div>
                </div> <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="service-btn text-center pt-25 pb-15">
                            <a class="main-btn main-btn-2" href="#">All Services</a>
                        </div> <!-- service btn -->
                    </div>
                </div> <!-- row -->
            </div> <!-- service wrapper -->
        </div> <!-- container -->
    </section>
    
    <!--====== SERVICE PART ENDS ======-->
    
  
    
 
    <!--====== TESTIMONIAL PART START ======-->
    
    <section id="testimonial" class="testimonial-area pt-70 pb-120">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-xl-5 col-lg-6">
                    <div class="testimonial-left-content mt-45 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.3s">
                        <div class="section-title">
                            <h6 class="sub-title">Testimonials</h6>
                            <h4 class="title">What Client Says, About Us</h4>
                        </div> <!-- section title -->
                        <ul class="testimonial-line">
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>
                        <p class="text">Duis et metus et massa tempus lacinia. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Maecenas ultricies, orci molestie blandit interdum. <br> <br> ipsum ante pellentesque nisl, eget mollis turpis quam nec eros. ultricies, orci molestie blandit interdum.</p>
                    </div> <!-- testimonial left content -->
                </div>
                <div class="col-lg-6">
                    <div class="testimonial-right-content mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                        <div class="quota">
                            <i class="lni-quotation"></i>
                        </div>
                        <div class="testimonial-content-wrapper testimonial-active">
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Praesent scelerisque, odio eu fermentum malesuada, nisi arcu volutpat nisl, sit amet convallis nunc turp.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="assets/images/author-1.jpg" alt="author">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">John Doe</h5>
                                            <span class="sub-title">CEO, Alphabet</span>
                                        </div>
                                    </div>
                                    <div class="author-review">
                                        <ul class="star">
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                        </ul>
                                        <span class="review">( 7 Reviews )</span>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Praesent scelerisque, odio eu fermentum malesuada, nisi arcu volutpat nisl, sit amet convallis nunc turp.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="assets/images/author-2.jpg" alt="author">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">John Doe</h5>
                                            <span class="sub-title">CEO, Alphabet</span>
                                        </div>
                                    </div>
                                    <div class="author-review">
                                        <ul class="star">
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                        </ul>
                                        <span class="review">( 7 Reviews )</span>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                            <div class="single-testimonial">
                                <div class="testimonial-text">
                                    <p class="text">“Praesent scelerisque, odio eu fermentum malesuada, nisi arcu volutpat nisl, sit amet convallis nunc turp.”</p>
                                </div>
                                <div class="testimonial-author d-sm-flex justify-content-between">
                                    <div class="author-info d-flex align-items-center">
                                        <div class="author-image">
                                            <img src="assets/images/author-3.jpg" alt="author">
                                        </div>
                                        <div class="author-name media-body">
                                            <h5 class="name">John Doe</h5>
                                            <span class="sub-title">CEO, Alphabet</span>
                                        </div>
                                    </div>
                                    <div class="author-review">
                                        <ul class="star">
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                            <li><i class="lni-star"></i></li>
                                        </ul>
                                        <span class="review">( 7 Reviews )</span>
                                    </div>
                                </div>
                            </div> <!-- single testimonial -->
                        </div> <!-- testimonial content wrapper -->
                    </div> <!-- testimonial right content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <!--====== TESTIMONIAL PART ENDS ======-->
    
   
    
    <!--====== BLOG PART START ======-->

    <section id="blog" class="blog-area pt-115">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="section-title text-center pb-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6 class="sub-title">Our Blog</h6>
                        <h4 class="title">Letest <span>News.</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-blog mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.4s">
                        <div class="blog-image">
                            <a href="blog-details.html"><img src="assets/images/news-1.jpg" alt="news"></a>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="blog-details.html">Nulla eget urna at tortor  turpi feugiat tristique in sit.</a></h4>
                            <div class="blog-author d-flex align-items-center">
                                <div class="author-image">
                                    <img src="assets/images/author-1.jpg" alt="author">
                                </div>
                                <div class="author-content media-body">
                                    <h6 class="sub-title">Posted by</h6>
                                    <p class="text">Isabela Moreira</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- single blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-blog mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="0.7s">
                        <div class="blog-image">
                            <a href="blog-details.html"><img src="assets/images/news-2.jpg" alt="news"></a>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="blog-details.html">Nulla eget urna at tortor  turpi feugiat tristique in sit.</a></h4>
                            <div class="blog-author d-flex align-items-center">
                                <div class="author-image">
                                    <img src="assets/images/author-2.jpg" alt="author">
                                </div>
                                <div class="author-content media-body">
                                    <h6 class="sub-title">Posted by</h6>
                                    <p class="text">Elon Musk</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- single blog -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-blog mt-30 wow fadeInUpBig" data-wow-duration="1s" data-wow-delay="1s">
                        <div class="blog-image">
                            <a href="blog-details.html"><img src="assets/images/news-3.jpg" alt="news"></a>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title"><a href="blog-details.html">Nulla eget urna at tortor  turpi feugiat tristique in sit.</a></h4>
                            <div class="blog-author d-flex align-items-center">
                                <div class="author-image">
                                    <img src="assets/images/author-3.jpg" alt="author">
                                </div>
                                <div class="author-content media-body">
                                    <h6 class="sub-title">Posted by</h6>
                                    <p class="text">Fiona</p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- single blog -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== BLOG PART ENDS ======-->
    
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="section-title text-center pb-20 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <h6 class="sub-title">Our Contact</h6>
                        <h4 class="title">Get In <span>Touch.</span></h4>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="contact-info pt-30">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-1 mt-30 d-flex  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="contact-info-icon">
                                <i class="lni-map-marker"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">21 King Street, Melbourne <br> Victoria, 1202 Australia.</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-2 mt-30 d-flex  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="contact-info-icon">
                                <i class="lni-envelope"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">hello@uideck.com</p>
                                <p class="text">support@uideck.com</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-contact-info contact-color-3 mt-30 d-flex  wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.9s">
                            <div class="contact-info-icon">
                                <i class="lni-phone"></i>
                            </div>
                            <div class="contact-info-content media-body">
                                <p class="text">+99 000 1111 555</p>
                                <p class="text">+88 999 5555 444</p>
                            </div>
                        </div> <!-- single contact info -->
                    </div>
                </div> <!-- row -->
            </div> <!-- contact info -->
      
        </div> <!-- container -->
    </section> --}}

    <!--====== CONTACT PART ENDS ======-->
    
    <!--====== FOOTER PART START ======-->
    
    <footer id="footer" class="footer-area bg_cover" style="background-image: url(assets/images/footer-bg.jpg)">
        <div class="container">
            {{-- <div class="footer-widget pt-30 pb-70">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 order-sm-1 order-lg-1">
                        <div class="footer-about pt-40">
                            <a href="#">
                                <img src="assets/images/logo.png" alt="Logo">
                            </a>
                            <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, repudiandae! Totam, nemo sed? Provident.</p> <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus</p>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-3 order-lg-2">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">Services</h5>
                            </div>
                            <ul>
                                <li><a href="#">Business Consultancy</a></li>
                                <li><a href="#">Digital Marketing</a></li>
                                <li><a href="#">Market Analysis</a></li>
                                <li><a href="#">Web Development</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-4 order-lg-3">
                        <div class="footer-link pt-40">
                            <div class="footer-title">
                                <h5 class="title">About Us</h5>
                            </div>
                            <ul>
                                <li><a href="#">Overview</a></li>
                                <li><a href="#">Why us</a></li>
                                <li><a href="#">Awards & Recognitions</a></li>
                                <li><a href="#">Team</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-sm-6 order-sm-2 order-lg-4">
                        <div class="footer-contact pt-40">
                            <div class="footer-title">
                                <h5 class="title">Contact Info</h5>
                            </div>
                            <div class="contact pt-10">
                                <p class="text">21 King Street, Melbourne <br>
                                    Victoria, 1202 Australia.</p>
                                <p class="text">support@uideck.com</p>
                                <p class="text">+99 000 555 66 22</p>

                                <ul class="social mt-40">
                                    <li><a href="#"><i class="lni-facebook"></i></a></li>
                                    <li><a href="#"><i class="lni-twitter"></i></a></li>
                                    <li><a href="#"><i class="lni-instagram"></i></a></li>
                                    <li><a href="#"><i class="lni-linkedin"></i></a></li>
                                </ul>
                            </div> <!-- contact -->
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget --> --}}
            <div class="footer-copyright text-center">
                <p class="text">Created By <a href="https://www.madiunkota.go.id/" rel="nofollow">Dinas Komunikasi dan Informatika</a> Pemerintah Kota Madiun.</p>
            </div>
        </div> <!-- container -->
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->  



   
    <!--====== Jquery js ======-->
    <script src="{{ asset('landing/assets/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/vendor/modernizr-3.7.1.min.js') }}"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="{{ asset('landing/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/bootstrap.min.js') }}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{ asset('landing/assets/js/slick.min.js') }}"></script>
    
    <!--====== Isotope js ======-->
    <script src="{{ asset('landing/assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/isotope.pkgd.min.js') }}"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{ asset('landing/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/jquery.counterup.min.js') }}"></script>
    
    <!--====== Circles js ======-->
    <script src="{{ asset('landing/assets/js/circles.min.js') }}"></script>
    
    <!--====== Appear js ======-->
    <script src="{{ asset('landing/assets/js/jquery.appear.min.js') }}"></script>
    
    <!--====== WOW js ======-->
    <script src="{{ asset('landing/assets/js/wow.min.js') }}"></script>
    
    <!--====== Headroom js ======-->
    <script src="{{ asset('landing/assets/js/headroom.min.js') }}"></script>
    
    <!--====== Jquery Nav js ======-->
    <script src="{{ asset('landing/assets/js/jquery.nav.js') }}"></script>
    
    <!--====== Scroll It js ======-->
    <script src="{{ asset('landing/assets/js/scrollIt.min.js') }}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{ asset('landing/assets/js/jquery.magnific-popup.min.js') }}"></script>
    
    <!--====== Main js ======-->
    <script src="{{ asset('landing/assets/js/main.js') }}"></script>
    
</body>

</html>
