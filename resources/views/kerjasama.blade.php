<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Info Kerjasama - SMKN 7 BATAM</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- boostrap -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">

    <!-- Favicons -->
    <link href="assets/img/logo-skaju.png" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,90,   family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,90,   display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- jQuery + DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#kerjasamaTable').DataTable();
        });
    </script>


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
                    <li><a href="{{ route('kerjasama') }}" class="active">Info Kerjasama</a></li>
                    <li><a href="{{ route('contact') }}">Kontak Kami</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <a class="btn-getstarted" href="{{ route('login') }}">Login</a>

        </div>
    </header>

    <main class="main">

        <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpeg);">
            <div class="container position-relative">
                <h1>Info Kerjasama</h1>
                <p>Data Kerjasama antara SMK Negeri 7 Batam dan Dunia Industri</p>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/">Beranda</a></li>
                        <li class="current">Info Kerjasama</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Cooperation Section -->
        <section id="kerjasama" class="section">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="table-responsive">
                    <table id="kerjasamaTable" class="display table table-bordered" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Mitra</th>
                                <th>Bidang Kerjasama</th>
                                <th>Unit Pengaju</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Loop 10 data dummy -->
                            <!-- Gunakan struktur sama dan ubah ID Modal setiap baris -->
                            <!-- Baris 1 -->
                            <tr>
                                <td class="text-center">1</td>
                                <td>Koperasi Politeknik Negeri Batam</td>
                                <td>Pendidikan, Layanan</td>
                                <td>Teknik Informatika</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal1"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                            <!-- Baris 2 - 10 -->
                            <tr>
                                <td class="text-center">2</td>
                                <td>PT. Sukses Makmur</td>
                                <td>Magang Siswa</td>
                                <td>Teknik Mesin</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal2"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">3</td>
                                <td>CV. Digital Solusi</td>
                                <td>Penyaluran Alumni</td>
                                <td>Rekayasa Perangkat Lunak</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal3"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">4</td>
                                <td>PT. Logistik Nusantara</td>
                                <td>Pelatihan Guru</td>
                                <td>Logistik</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal4"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">5</td>
                                <td>PT. Industri Kreatif</td>
                                <td>Riset,   Inovasi</td>
                                <td>DKV</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal5"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">6</td>
                                <td>PT. Sumatera Energi</td>
                                <td>Pendidikan</td>
                                <td>Teknik Listrik</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal6"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">7</td>
                                <td>CV. Agrotek Nusantara</td>
                                <td>Penyuluhan</td>
                                <td>Agribisnis</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal7"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">8</td>
                                <td>PT. Teknologi Pintar</td>
                                <td>Magang,  Riset</td>
                                <td>Sistem Informasi</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal8"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">9</td>
                                <td>PT. Maritim Batam</td>
                                <td>Pendidikan Maritim</td>
                                <td>Teknik Perkapalan</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal9"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-center">10</td>
                                <td>CV. Visual Studio</td>
                                <td>Workshop Desain</td>
                                <td>Multimedia</td>
                                <td class="text-center">
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal10"><i class="fas fa-list"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 1 -->
            <div class="modal fade" id="detailModal1" tabindex="-1" aria-labelledby="detailModalLabel1" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel1">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Memorandum of Understanding (MoU)</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>Koperasi Politeknik Negeri Batam</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Pendidikan, Layanan</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>022/MOU.PL29/III/2017</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2017-03-15 s.d 2027-03-15</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 2 -->
            <div class="modal fade" id="detailModal2" tabindex="-1" aria-labelledby="detailModalLabel2" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel2">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Magang Siswa</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>PT. Sukses Makmur</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Teknik Mesin</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>021/MOU.SM29/IV/2018</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2018-05-01 s.d 2023-05-01</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 3 -->
            <div class="modal fade" id="detailModal3" tabindex="-1" aria-labelledby="detailModalLabel3" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel3">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Penyaluran Alumni</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>CV. Digital Solusi</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Rekayasa Perangkat Lunak</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>020/MOU.DS29/V/2019</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2019-07-01 s.d 2024-07-01</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 4 -->
            <div class="modal fade" id="detailModal4" tabindex="-1" aria-labelledby="detailModalLabel4" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel4">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Pelatihan Guru</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>PT. Logistik Nusantara</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Logistik</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>019/MOU.LN29/VI/2020</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2020-01-01 s.d 2025-01-01</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-secondary">Tidak Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 5 -->
            <div class="modal fade" id="detailModal5" tabindex="-1" aria-labelledby="detailModalLabel5" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel5">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Riset,   Inovasi</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>PT. Industri Kreatif</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>DKV</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>018/MOU.IK29/V/2021</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2021-06-01 s.d 2026-06-01</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 6 -->
            <div class="modal fade" id="detailModal6" tabindex="-1" aria-labelledby="detailModalLabel6" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel6">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Praktek Kerja Lapangan</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>PT. Teknologi Batam</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Rekayasa Perangkat Lunak</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>017/MOU.TB29/VII/2022</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2022-09-01 s.d 2027-09-01</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 7 -->
            <div class="modal fade" id="detailModal7" tabindex="-1" aria-labelledby="detailModalLabel7" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel7">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Pelatihan Online</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>PT. Inovasi Global</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Digital Marketing</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>016/MOU.IG29/VIII/2023</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2023-08-01 s.d 2028-08-01</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 8 -->
            <div class="modal fade" id="detailModal8" tabindex="-1" aria-labelledby="detailModalLabel8" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel8">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Program Beasiswa</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>PT. Pendidikan Mandiri</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Pendidikan</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>015/MOU.PM29/IX/2024</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2024-10-01 s.d 2029-10-01</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-secondary">Tidak Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 9 -->
            <div class="modal fade" id="detailModal9" tabindex="-1" aria-labelledby="detailModalLabel9" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel9">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Program Magang</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>PT. Batam Digital</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>IT</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>014/MOU.BD29/X/2025</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2025-11-01 s.d 2030-11-01</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Kerjasama 10 -->
            <div class="modal fade" id="detailModal10" tabindex="-1" aria-labelledby="detailModalLabel10" aria-hidden="true">
                <div class="modal-dialog custom-modal-size">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="detailModalLabel10">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>Jenis Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Workshop Industri</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nama Mitra</strong></td>
                                            <td>:</td>
                                            <td>PT. Global Investama</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Bidang Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>Industri Kreatif</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Nomor Kerjasama</strong></td>
                                            <td>:</td>
                                            <td>013/MOU.GI29/XI/2025</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Masa Berlaku</strong></td>
                                            <td>:</td>
                                            <td>2025-12-01 s.d 2030-12-01</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Status Kerjasama</strong></td>
                                            <td>:</td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

        </section>




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