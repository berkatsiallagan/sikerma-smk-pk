<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SIKERMA SMKN 7 BATAM</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/logo-skaju.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="#" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <img src="/assets/img/logo-skaju.png" alt="Logo SMKN 7 BATAM" class="logo">
                <h1 class="sitename">SMKN 7 BATAM</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="active">Beranda<br></a></li>
                    <li><a href="{{ route('kerjasama') }}">Info Kerjasama</a></li>
                    <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="assets/img/skaju-bg.jpg" alt="" class="hero-bg" data-aos="fade-in" style="filter: opacity(35%);">

            <div class="container">
                <div class="row gy-4 d-flex justify-content-between">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                        <h2 data-aos="fade-up">Selamat Datang</h2>
                        <p data-aos="fade-up" data-aos-delay="100">di Website Sistem Kerjasama (SIKERMA) SMK NEGERI 7 BATAM</p>

                        <div class="row gy-4" data-aos="fade-up" data-aos-delay="300">

                            <div class="col-lg-3 col-6">
                                <div class="stats-item text-center w-100 h-100">
                                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="3" class="purecounter">232</span>
                                    <p>Dudi Nasional</p>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-3 col-6">
                                <div class="stats-item text-center w-100 h-100">
                                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="3" class="purecounter">521</span>
                                    <p>Dudi Internasional</p>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-3 col-6">
                                <div class="stats-item text-center w-100 h-100">
                                    <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="3" class="purecounter">1453</span>
                                    <p>Instansi Nasional</p>
                                </div>
                            </div><!-- End Stats Item -->

                            <div class="col-lg-3 col-6">
                                <div class="stats-item text-center w-100 h-100">
                                    <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="3" class="purecounter">32</span>
                                    <p>Instansi Internasional</p>
                                </div>
                            </div><!-- End Stats Item -->

                        </div>

                    </div>

                </div>
            </div>

        </section><!-- /Hero Section -->

        
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
                        <li><a href="#">Info Kerjasama</a></li>
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