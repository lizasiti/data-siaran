@extends('layouts.admin')
@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="fw-bold text-primary mb-0">Jadwal Siaran Mingguan</h1>
            <p class="text-muted">Program unggulan untuk menemani akhir pekan Anda</p>
        </div>
        <div class="col-md-4 text-md-end">
            
            <button class="btn btn-primary rounded-pill px-4 shadow-sm" data-bs-toggle="modal" data-bs-target="#tambah">
                <i class="bi bi-plus-circle me-2"></i>Tambah Program
            </button>
        </div>
    </div>

    {{-- Session --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Errors --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle me-2"></i>Terdapat kesalahan:
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row g-4 mt-2">
        @foreach ($weeklySchedule as $program)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden hover-shadow transition">
                    <div class="position-relative">
                        <img src="{{ asset('storage/' . $program['gambar']) }}" class="card-img-top" alt="{{ $program['judul'] }}" style="height: 200px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 w-100 p-3 bg-gradient-dark text-white">
                            <span class="badge bg-primary rounded-pill mb-2">{{ ucfirst($program['hari']) }}</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light rounded-pill px-3 py-1 me-3 text-center">
                            <h5 class="fw-bold mb-0 text-primary ">{{ $program['judul'] }}</h5>
                                <i class="bx bx-time me-1"></i>
                                <span>{{ $program['jam_mulai'] }} - {{ $program['jam_selesai'] }}</span>
                            </div>
                        </div>
                        <p class="card-text text-muted">{{ Str::limit($program['deskripsi'], 100) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0 pt-0">
                        <div class="d-flex justify-content-end gap-2">
                            <button class="btn btn-outline-primary btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#edit{{ $program['id'] }}">
                                <i class="bi bi-pencil me-1"></i>Edit
                            </button>
                            <button class="btn btn-outline-danger btn-sm rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#hapus{{ $program['id'] }}">
                                <i class="bi bi-trash me-1"></i>Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Modal tambah data --}}
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <form action="{{ route('weekly.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title text-white" id="tambahLabel"><i class="bi bi-calendar-plus me-2"></i>Tambah Program Siaran</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label fw-medium">Judul Program</label>
                        <input type="text" class="form-control form-control-lg rounded-3" id="judul" name="judul" placeholder="Masukkan judul program" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label fw-medium">Deskripsi</label>
                        <textarea class="form-control rounded-3" id="deskripsi" name="deskripsi" rows="3" placeholder="Deskripsi singkat tentang program" required></textarea>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="jam_mulai" class="form-label fw-medium">Jam Mulai</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-clock"></i></span>
                                <input type="time" class="form-control rounded-end" id="jam_mulai" name="jam_mulai" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="jam_selesai" class="form-label fw-medium">Jam Selesai</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="bi bi-clock-fill"></i></span>
                                <input type="time" class="form-control rounded-end" id="jam_selesai" name="jam_selesai" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="hari" class="form-label fw-medium">Hari Tayang</label>
                        <select name="hari" class="form-select rounded-3" required>
                            <option value="" disabled selected>Pilih Hari Tayang</option>
                            <option value="sabtu">Sabtu</option>
                            <option value="minggu">Minggu</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label fw-medium">Gambar Cover</label>
                        <div class="input-group mb-1">
                            <span class="input-group-text bg-light"><i class="bi bi-image"></i></span>
                            <input type="file" class="form-control rounded-end" id="gambar" name="gambar" accept="image/*" required>
                        </div>
                        <small class="text-muted">Format: JPG, PNG. Ukuran maks: 2MB</small>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary rounded-pill px-4">
                        <i class="bi bi-save me-1"></i>Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal edit data --}}
@foreach ($weeklySchedule as $program)
    <div class="modal fade" id="edit{{ $program['id'] }}" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <form action="{{ route('weekly.update', $program['id']) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title text-white" id="editLabel"><i class="bi bi-pencil-square me-2"></i>Edit Program Siaran</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-medium">Judul Program</label>
                            <input type="text" class="form-control form-control-lg rounded-3" id="judul" name="judul" value="{{ $program['judul'] }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-medium">Deskripsi</label>
                            <textarea class="form-control rounded-3" id="deskripsi" name="deskripsi" rows="3" required>{{ $program['deskripsi'] }}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="jam_mulai" class="form-label fw-medium">Jam Mulai</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-clock"></i></span>
                                    <input type="time" class="form-control rounded-end" id="jam_mulai" name="jam_mulai" value="{{ $program['jam_mulai'] }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="jam_selesai" class="form-label fw-medium">Jam Selesai</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="bi bi-clock-fill"></i></span>
                                    <input type="time" class="form-control rounded-end" id="jam_selesai" name="jam_selesai" value="{{ $program['jam_selesai'] }}" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label fw-medium">Hari Tayang</label>
                            <select name="hari" class="form-select rounded-3" required>
                                <option value="" disabled>Pilih Hari Tayang</option>
                                <option value="sabtu" {{ $program['hari'] == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
                                <option value="minggu" {{ $program['hari'] == 'minggu' ? 'selected' : '' }}>Minggu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label fw-medium">Gambar Cover</label>
                            <div class="input-group mb-1">
                                <span class="input-group-text bg-light"><i class="bi bi-image"></i></span>
                                <input type="file" class="form-control rounded-end" id="gambar" name="gambar" accept="image/*">
                            </div>
                            <div class="mt-2">
                                <p class="mb-1 text-muted small">Gambar saat ini:</p>
                                <img src="{{ asset('storage/' . $program['gambar']) }}" alt="{{ $program['judul'] }}" class="img-thumbnail" style="height: 80px;">
                            </div>
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">
                            <i class="bi bi-save me-1"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

{{-- Modal hapus --}}
@foreach ($weeklySchedule as $program)
    <div class="modal fade" id="hapus{{ $program['id'] }}" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow">
                <form action="{{ route('weekly.destroy', $program['id']) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="hapusLabel"><i class="bi bi-exclamation-triangle me-2"></i>Konfirmasi</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center py-4">
                        <div class="mb-3">
                            <i class="bi bi-trash text-danger display-1"></i>
                        </div>
                        <h5>Yakin hapus program ini?</h5>
                        <p class="text-muted mb-0">{{ $program['judul'] }}</p>
                    </div>
                    <div class="modal-footer border-0 justify-content-center">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger rounded-pill px-4">
                            <i class="bi bi-trash me-1"></i>Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection