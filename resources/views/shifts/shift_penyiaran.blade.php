@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">
            <i class="fas fa-broadcast-tower me-2"></i>Shift Penyiaran
        </h1>

    </div>

    <!-- Search and Filter Section -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form action="{{ route('shift_penyiaran.index') }}" method="GET">
                <div class="d-flex justify-content-end">
                    <div class="me-3">
                        <div class="input-group">
                            <span class="input-group-text bg-white">
                                <i class="bx bx-search"></i>
                            </span>
                            <input type="text" name="search" class="form-control"
                                   placeholder="Cari berdasarkan nama penyiar, hari, atau naskah..."
                                   value="{{ request('search') }}">
                        </div>
                    </div>

                    <div class=" me-3">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="bx bx-filter me-1"></i> Filter
                        </button>
                    </div>
                    <div class="me-3">
                        <a href="{{ route('shift_penyiaran.export_pdf', request()->query()) }}"
                           class="btn btn-secondary">
                           <i class="bx bx-download me-1"></i> Export PDF
                        </a>
                    </div>
                    <div class="d-flex">
                        <a href="{{ route('shift_penyiaran.rekap') }}" class="btn btn-info me-2">
                            <i class="bx bxs-report me-1"></i> Lihat Rekap
                        </a>
                        <a href="{{ route('shift_penyiaran.create') }}" class="btn btn-success">
                            <i class="bx bx-plus me-1"></i> Tambah
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Shift Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Nama Penyiar</th>
                            <th width="10%">Hari</th>
                            <th width="12%">Jam Mulai</th>
                            <th width="12%">Jam Selesai</th>
                            <th>Naskah Siaran</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($shifts as $shift)
                        @php
                            $no = 1;

                        @endphp
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td >
                                    <span class="d-flex align-items-center">
                                        {{ $shift->penyiar->nama }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $shift->hari == 'Sabtu' || $shift->hari == 'Minggu' ? 'info' : 'primary' }}">
                                        {{ $shift->hari }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($shift->jam_mulai)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($shift->jam_selesai)->format('H:i') }}</td>
                                <td class="naskah-column" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $shift->naskah_siaran }}">
                                    {{ Str::limit($shift->naskah_siaran, 50) }}
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('shift_penyiaran.edit', $shift->id) }}"
                                           class="btn btn-sm btn-icon btn-warning me-2"
                                           data-bs-toggle="tooltip" title="Edit">
                                           <i class='bx bx-edit-alt'></i>
                                        </a>
                                        <form action="{{ route('shift_penyiaran.destroy', $shift->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-icon btn-danger"
                                                    data-bs-toggle="tooltip" title="Hapus"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus shift ini?')">
                                                <i class='bx bx-trash'></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="fas fa-broadcast-tower fa-2x text-muted mb-3"></i>
                                    <h5 class="text-muted">Tidak ada data shift penyiaran</h5>
                                    <a href="{{ route('shift_penyiaran.create') }}" class="btn btn-sm btn-primary mt-2">
                                        <i class="fas fa-plus me-1"></i> Tambah Shift Baru
                                    </a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<style>
    .symbol {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        vertical-align: middle;
    }

    .symbol-circle {
        border-radius: 50%;
    }

    .symbol-40 {
        width: 40px;
        height: 40px;
    }

    .symbol-label {
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        color: #fff;
        background-color: #f3f6f9;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: cover;
    }

    .naskah-column {
        max-width: 200px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
    }

    .card {
        border-radius: 0.5rem;
    }

    .badge {
        font-size: 0.85em;
        padding: 0.35em 0.65em;
    }
</style>

<script>
    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>
@endsection
