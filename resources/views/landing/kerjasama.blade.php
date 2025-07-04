<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Info Kerjasama - SMKN 7 BATAM</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: '#0d6efd',
              secondary: '#6c757d',
              success: '#198754',
              danger: '#dc3545',
              warning: '#ffc107',
              info: '#0dcaf0',
            }
          }
        }
      }
    </script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logo-skaju.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <!-- jQuery (required for DataTables) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">

    <!-- Initialize AOS after DOM loads -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        AOS.init();
      });
    </script>
</head>

<body class="contact-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="/" class="logo d-flex align-items-center me-auto">
                <img src="{{ asset('assets/img/logo-skaju.png') }}" alt="Logo SMKN 7 BATAM" class="logo">
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
        <div class="page-title dark-background" data-aos="fade" style="background-image: url({{ asset('assets/img/skaju-bg.jpg') }});">
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
                @if($kerjasamas->isEmpty())
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i> Belum ada data kerjasama yang tersedia.
                    </div>
                @else
                    <div class="table-responsive">
                        <table id="kerjasamaTable" class="display table table-bordered table-hover" style="width:100%">
                            <thead class="text-center bg-primary text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Mitra</th>
                                    <th>Bidang Kerjasama</th>
                                    <th>Jurusan</th>
                                    <th>Jenis Kerjasama</th>
                                    <th>Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kerjasamas as $kerjasama)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $kerjasama->mitra->nama_mitra ?? '-' }}</td>
                                    <td>
                                       @foreach($kerjasama->pemohon->bidangs as $bidang)
                                        {{ $bidang->nama_bidang }}@if(!$loop->last), @endif
                                     @endforeach
                                    </td>
                                    <td>
                                        @forelse($kerjasama->pemohon->jurusans ?? [] as $jurusan)
                                            {{ $jurusan->nama_jurusan }}@if(!$loop->last), @endif
                                        @empty
                                            -
                                        @endforelse
                                    </td>
                                    <td>{{ $kerjasama->jenis_kerjasama ?? '-' }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" 
                                                data-bs-target="#detailModal{{ $kerjasama->id_kerjasama }}"
                                                title="Lihat Detail">
                                            <i class="fas fa-list"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- Modal Detail Kerjasama -->
            @foreach($kerjasamas as $kerjasama)
            <div class="modal fade" id="detailModal{{ $kerjasama->id_kerjasama }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $kerjasama->id_kerjasama }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Header dengan garis bawah -->
                        <div class="modal-header bg-white text-dark border-bottom" style="border-color: #dee2e6 !important;">
                            <h5 class="modal-title fw-bold" id="detailModalLabel{{ $kerjasama->id_kerjasama }}">Detail Kerjasama</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        
                        <!-- Body dengan tabel bergaris -->
                        <div class="modal-body p-0">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <td class="fw-bold" style="width: 40%; border-color: #dee2e6;">Jenis Kerjasama</td>
                                            <td style="border-color: #dee2e6;">{{ $kerjasama->jenis_kerjasama ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold" style="border-color: #dee2e6;">Nama Mitra</td>
                                            <td style="border-color: #dee2e6;">{{ $kerjasama->mitra->nama_mitra ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold" style="border-color: #dee2e6;">Bidang Kerjasama</td>
                                    <td style="border-color: #dee2e6;">
                                 <div class="text-left">{{ $kerjasama->pemohon && $kerjasama->pemohon->bidangs
              ? $kerjasama->pemohon->bidangs->pluck('nama_bidang')->join(', ')
              : '' ?? '-' }}</div>
                                        </td>
              
                                               
                                        
                                             
                                        </tr>
                                        <tr>
                                            <td class="fw-bold" style="border-color: #dee2e6;">Nomor Kerjasama</td>
                                            <td class="font">{{ $kerjasama->pemohon->no_permohonan ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold" style="border-color: #dee2e6;">Masa Berlaku</td>
                                            <td style="border-color: #dee2e6;">
                                                {{ ($kerjasama->dokumen->tanggal_mulai ?? '-')->format('d-M-Y') }} s.d {{ ($kerjasama->dokumen->tanggal_selesai ?? '-')->format('d-M-Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold" style="border-color: #dee2e6;">Status Kerjasama</td>
                                            <td style="border-color: #dee2e6;">
                                                 @php
          $tanggalSelesai = $kerjasama->dokumen->tanggal_selesai ?? null;
          $sisaHari = $tanggalSelesai ? now()->diffInDays(\Carbon\Carbon::parse($tanggalSelesai), false) : null;
          
          if ($sisaHari === null) {
              $statusText = '-';
              $color = 'gray';
          } elseif ($sisaHari > 30) {
              $statusText = 'Aktif';
              $color = 'green';
          } elseif ($sisaHari > 0) {
              $statusText = 'Akan Berakhir';
              $color = 'yellow';
          } elseif ($sisaHari > 0) {
            $statusText = 'Tidak Aktif';
            $color = 'red';
          } else {
              $statusText = 'Kadaluarsa';
              $color = 'blue';
          }
      @endphp
     <div="px-6 py-4 text-sm bo">
    <div class="flex justify-left">
        <button class="bg-{{ $color }}-600 hover:bg-{{ $color }}-500 text-white font-semibold px-4 py-1 rounded-md transition">
            {{ $statusText }}
        </button>
    </div>
</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <!-- Footer dengan garis atas -->
                        <div class="modal-footer border-top" style="border-color: #dee2e6 !important;">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
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
                        <a href="https://www.youtube.com/@SMKNegeri7BatamOfficial" target="_blank" rel="noopener noreferrer"><i class="bi bi-youtube"></i></a>
                        <a href="https://www.tiktok.com/@smkn7.official" target="_blank" rel="noopener noreferrer"><i class="bi bi-tiktok"></i></a>
                        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-instagram"></i></a>
                        <a href="#" target="_blank" rel="noopener noreferrer"><i class="bi bi-linkedin"></i></a>
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
            <p>© <span>Copyright</span> <strong class="px-1 sitename">{{ date('Y') }}</strong> <span>Kerjasama SMKN 7 BATAM</span></p>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- jQuery + DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    
    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable hanya sekali
            var table = $('#kerjasamaTable').DataTable({
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json'
                },
                responsive: true
            });
            
            // Initialize tooltips
            $('[data-bs-toggle="tooltip"]').tooltip();
            
            // Initialize AOS animations
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });
        });
    </script>
</body>
</html>