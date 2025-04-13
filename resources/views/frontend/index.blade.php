<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radio Republik Indonesia - Portal Siaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/landing.css')}}">

</head>

<body>
    <!-- Modern Header with Responsive Design -->
    <header class="shadow-sm sticky-top bg-white">
        <div class="container py-2">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="{{ route('landing.page') }}" class="navbar-brand d-flex align-items-center">
                    <img src="img/rpro2.jpg" alt="Logo RRI" class="me-2 rounded-circle" width="50" height="50">
                    <div class="logo-text">
                        <div class="fw-bold text-primary">Radio Republik Indonesia</div>
                        <div class="small text-muted fst-italic">Sekali di Udara, Tetap di Udara</div>
                    </div>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item mx-2">
                            <a href="{{ route('landing.page') }}" class="nav-link fw-medium position-relative">
                                <i class="fas fa-home me-1"></i> Beranda
                                <span class="position-absolute bottom-0 start-50 translate-middle-x bg-primary"
                                    style="height: 2px; width: 0%; transition: width 0.3s; opacity: 0;"></span>
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <a href="{{ route('jadwal-siaran.landing') }}" class="nav-link fw-medium position-relative">
                                <i class="fas fa-calendar-alt me-1"></i> Jadwal Siaran
                                <span class="position-absolute bottom-0 start-50 translate-middle-x bg-primary"
                                    style="height: 2px; width: 0%; transition: width 0.3s; opacity: 0;"></span>
                            </a>
                        </li>
                    </ul>

                    <div class="auth-buttons d-flex gap-2">
                        <a href="/loginn" class="btn btn-outline-primary btn-sm px-3 rounded-pill">
                            <i class="fas fa-sign-in-alt me-1"></i> Masuk
                        </a>
                        <a href="register" class="btn btn-primary btn-sm px-3 rounded-pill">
                            <i class="fas fa-user-plus me-1"></i> Daftar
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Hero Banner -->
    <section class="bg-light py-4 mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-5 fw-bold text-primary mb-3">Jadwal Siaran RRI</h1>
                    <p class="lead text-muted">Temukan program siaran terbaik dari Radio Republik Indonesia yang
                        menginformasi, mengedukasi, dan menghibur seluruh masyarakat Indonesia.</p>
                    <div class="d-flex align-items-center">
                        @if($program)
                            <div class="on-air-badge d-flex align-items-center pe-3">
                                <span class="pulse-dot me-2"></span>
                                <span class="fw-bold text-danger">ON AIR</span>
                            </div>
                            <div class="vr mx-3 opacity-25" style="height: 24px"></div>
                            <div class="live-now">
                                <span class="small text-muted">Sedang Tayang:</span>
                                <span class="ms-2 fw-medium text-primary">{{$program->judul}}</span>
                            </div>
                        @else
                            <div class="live-now">
                                <span class="small text-muted">Tidak ada program yang sedang tayang</span>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 text-end d-none d-lg-block">
                    <img src="{{asset('img/banner.png')}}" alt="RRI Hero Image" class="img-fluid rounded-3  w-50">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Programs Section -->
    <section class="featured-programs mb-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="badge bg-primary rounded-pill px-3 py-2 mb-2">Program Unggulan</span>
                <h2 class="display-6 fw-bold">Program Harian RRI</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p class="text-muted">Temukan program siaran terbaik dari Radio Republik Indonesia yang
                            menginformasi, mengedukasi, dan menghibur seluruh masyarakat Indonesia.</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($siaran as $program)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-scale transition">
                            <div class="position-relative">
                                <div class="card-img-top ratio ratio-16x9">
                                    <div
                                        style="background: {{ $program->gambar ? 'url(' . asset('storage/' . $program->gambar) . ')' : '/api/placeholder/300/180' }} no-repeat center/cover;">
                                    </div>
                                </div>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-primary rounded-pill px-3 py-2">Program</span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h3 class="card-title fw-bold h5 mb-3">{{ $program->judul }}</h3>
                                <p class="card-text text-muted">{{ $program->deskripsi }}</p>
                            </div>
                            <div class="card-footer bg-white border-top-0 px-4 pb-4">
                                <div class="d-flex justify-content-between text-muted small">
                                    <span class="d-flex align-items-center">
                                        <i class="far fa-clock me-2 text-primary"></i>
                                        {{ $program->jam_mulai }} - {{ $program->jam_selesai }} WIB
                                    </span>
                                    <span class="d-flex align-items-center">
                                        <i class="fas fa-broadcast-tower me-2 text-primary"></i>
                                        Pro RRI2
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Weekly Programs Section -->
    <section class="weekly-programs py-5 bg-light rounded-4 mb-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="badge bg-success rounded-pill px-3 py-2 mb-2">Setiap Minggu</span>
                <h2 class="display-6 fw-bold">Program Weekly</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <p class="text-muted">Temukan program mingguan terbaik dari Radio Republik Indonesia yang siap
                            menemani aktivitas Anda di setiap hari yang berbeda.</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                @foreach ($week as $program)
                    <div class="col-lg-4 col-md-6">
                        <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-scale transition">
                            <div class="position-relative">
                                <div class="card-img-top ratio ratio-16x9">
                                    <div
                                        style="background: {{ $program->gambar ? 'url(' . asset('storage/' . $program->gambar) . ')' : '/api/placeholder/300/180' }} no-repeat center/cover;">
                                    </div>
                                </div>
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-success rounded-pill px-3 py-2">{{ $program->hari }}</span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h3 class="card-title fw-bold h5 mb-3">{{ $program->judul }}</h3>
                                <p class="card-text text-muted">{{ $program->deskripsi }}</p>
                            </div>
                            <div class="card-footer bg-white border-top-0 px-4 pb-4">
                                <div class="d-flex justify-content-between text-muted small">
                                    <span class="d-flex align-items-center">
                                        <i class="far fa-clock me-2 text-success"></i>
                                        {{ $program->jam_mulai }} - {{ $program->jam_selesai }} WIB
                                    </span>
                                    <span class="d-flex align-items-center">
                                        <i class="fas fa-broadcast-tower me-2 text-success"></i>
                                        Pro RRI2
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-column">
                    <h3>Radio Republik Indonesia</h3>
                    <p>Stasiun radio tertua dan terluas di Indonesia yang menyiarkan program informatif, edukatif, dan
                        menghibur.</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <div class="footer-column">
                    <h3>Layanan</h3>
                    <ul class="footer-links">
                        <li><a href="#">Jadwal Siaran</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h3>Informasi</h3>
                    <ul class="footer-links">
                        <li><a href="#">Tentang RRI</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="#">Kerjasama</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; 2025 Radio Republik Indonesia. Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>
    <script src="{{ asset('/js/script.js') }}"></script>
</body>
</html>