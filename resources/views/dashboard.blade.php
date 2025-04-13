@extends('layouts.admin')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Dashboard Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">
                <i class="bx bx-tachometer me-2"></i>Dashboard
            </h1>
            <div class="d-flex">
                <span class="badge bg-primary fs-6 p-2">
                    <i class="bx bx-buildings me-1"></i> PR02 Sumenep
                </span>
            </div>
        </div>

        <!-- Quick Access Cards -->
        <div class="row justify-content-center mb-4">
            <div class="col-md-4 mb-3">
                <div class="card dashboard-card h-100 shadow-sm border-0 hover-scale">
                    <div class="card-body text-center">
                        <div class=" bg-opacity-10 rounded-circle p-3 mb-3 d-inline-block">
                            <i class="bx bx-user me-1 "></i>
                        </div>
                        <h5 class="card-title mb-2">Penyiar</h5>
                        {{-- total penyiar --}}
                        <p class="card-text">{{ $penyiarCount }}</p>
                        <a href="{{ route('penyiar.index') }}" class="btn btn-sm btn-outline-primary stretched-link">
                            Kelola Penyiar <i class="bx bx-right-arrow-alt ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card dashboard-card h-100 shadow-sm border-0 hover-scale">
                    <div class="card-body text-center">
                        <div class=" bg-opacity-10 rounded-circle p-3 mb-3 d-inline-block">
                            <i class="bx bx-calendar me-1 "></i>
                        </div>
                        <h5 class="card-title mb-2">Jadwal Siaran</h5>
                        <p class="card-text">{{ $jadwalCount }}</p>
                        <a href="{{ route('jadwal-siaran.index') }}" class="btn btn-sm btn-outline-success stretched-link">
                            Lihat Jadwal <i class="bx bx-right-arrow-alt ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
           
        </div>

        <!-- Featured Programs Section -->
        <section class="featured-programs mb-5">
            <div class="card shadow-sm border-0">
                <div class="card-body">
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
                                <div
                                    class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-scale transition">
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
                                                <i class="bx bx-broadcast-tower me-2 text-primary"></i>
                                                Pro RRI2
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- Weekly Programs Section -->
        <section class="weekly-programs py-5 bg-light rounded-4 mb-5">
            <div class="card shadow-sm border-0 bg-light">
                <div class="card-body">
                    <div class="section-header text-center mb-5">
                        <span class="badge bg-success rounded-pill px-3 py-2 mb-2">Setiap Minggu</span>
                        <h2 class="display-6 fw-bold">Program Weekly</h2>
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <p class="text-muted">Temukan program mingguan terbaik dari Radio Republik Indonesia yang
                                    siap
                                    menemani aktivitas Anda di setiap hari yang berbeda.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4">
                        @foreach ($week as $program)
                            <div class="col-lg-4 col-md-6">
                                <div
                                    class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden hover-scale transition">
                                    <div class="position-relative">
                                        <div class="card-img-top ratio ratio-16x9">
                                            <div
                                                style="background: {{ $program->gambar ? 'url(' . asset('storage/' . $program->gambar) . ')' : '/api/placeholder/300/180' }} no-repeat center/cover;">
                                            </div>
                                        </div>
                                        <div class="position-absolute top-0 end-0 m-3">
                                            <span
                                                class="badge bg-success rounded-pill px-3 py-2">{{ $program->hari }}</span>
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
                                                <i class="bx bx-broadcast-tower me-2 text-success"></i>
                                                Pro RRI2
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </div>

    <style>
        .dashboard-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-radius: 0.5rem;
        }

        .hover-scale:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
        }

        .w-30 {
            width: 30%;
        }

        .progress {
            border-radius: 0.25rem;
            overflow: visible;
        }

        .progress-bar {
            position: relative;
            overflow: visible;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .progress-bar::after {
            content: attr(aria-valuenow);
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            text-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
        }

        .featured-programs .card,
        .weekly-programs .card {
            transition: all 0.3s ease;
        }

        .featured-programs .card:hover,
        .weekly-programs .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .ratio-16x9 {
            aspect-ratio: 16/9;
        }
    </style>
@endsection
