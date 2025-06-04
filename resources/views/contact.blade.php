<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Kontak Kami - SMKN 7 BATAM</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/logo-skaju.png" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Logis
  * Template URL: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="contact-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="/assets/img/logo-skaju.png" alt="Logo SMKN 7 BATAM" class="logo">
                <h1 class="sitename">SMKN 7 BATAM</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/">Beranda<br></a></li>
                    <li><a href="{{ route('kerjasama') }}">Info Kerjasama</a></li>
                    <li><a href="{{ route('contact') }}" class="active">Kontak Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

        </div>
    </header>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/skaju-bg.jpg);">
            <div class="container position-relative">
                <h1>Kontak Kami</h1>
                <p>Bagian Kerjasama SMK Negeri 7 Batam</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Kontak Kami</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Contact Section -->
        <section id="contact" class="contact section">

            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="mb-4" data-aos="fade-up" data-aos-delay="200">
                    <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.069494167915!2d104.08341317396365!3d1.1100904623017085!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d988b07c424207%3A0x9ca1222640c2273a!2sSMK%20Negeri%207%20Batam!5e0!3m2!1sid!2sid!4v1746093338409!5m2!1sid!2sid" frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div><!-- End Google Maps -->

                <div class="row gy-4">

                    <div class="col-lg-4">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Alamat</h3>
                                <p>Perumahan Sekawan Pemko, Kelurahan, Belian, Kec. Batam Kota, Kota Batam, Prov. Kepulauan Riau Kode Pos : 29463</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Hubungi Kami</h3>
                                <p>+62 xxx xxxx xxxx</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email</h3>
                                <p>smknegeri7batam@gmail.com</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                    <div class="col-lg-8">
                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                            <div class="row gy-4">

                                <div class="col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                                </div>

                                <div class="col-md-6 ">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                                </div>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                                </div>

                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                                </div>

                                <div class="col-md-12 text-center">
                                    <div class="loading">Loading</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Your message has been sent. Thank you!</div>

                                    <button type="submit">Send Message</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->

                </div>

            </div>

        </section><!-- /Contact Section -->

    </main>

    <footer id="footer" class="footer dark-background">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-12 footer-about">
                    <a href="/" class="logo d-flex align-items-center">
                        <span class="sitename">SMKN 7 BATAM</span>
                    </a>
                    <p>Alamat: Komp. Koperasi Pemko, Batam centre, Belian, Kec. Batam Kota, Kota Batam, Kepulauan Riau</p>
                    <div class="social-links d-flex mt-4">
                        <a href="https://www.youtube.com/@SMKNegeri7BatamOfficial"><i class="bi bi-youtube"></i></a>
                        <a href="https://www.tiktok.com/@smkn7.official"><i class="bi bi-tiktok"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-6 footer-links">
                    <h4>Tautan Penting</h4>
                    <ul>
                        <li><a href="/">Beranda</a></li>
                        <li><a href="{{ route('kerjasama') }}">Info Kerjasama</a></li>
                        <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
                    </ul>
                </div>



                <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                    <h4>Hubungi Kami</h4>
                    <p>Perumahan Sekawan Pemko,</p>
                    <p>Kelurahan, Belian, Kec. Batam Kota,</p>
                    <p>Kota Batam, Prov. Kepulauan Riau</p>
                    <p class="mt-4"><strong>Kode Pos:</strong> <span>29463</span></p>
                    <p><strong>Email:</strong> <span>smknegeri7batam@gmail.com</span></p>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">2025</strong> <span>Kerjasama SMKN 7 BATAM</span></p>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>