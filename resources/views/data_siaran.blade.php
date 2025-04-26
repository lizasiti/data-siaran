@extends('layouts.admin')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">
            <i class="fas fa-broadcast-tower me-2"></i>Data Siaran
        </h1>
        <button class="btn btn-primary" onclick="toggleForm()">
            <i class="fas fa-plus me-1"></i>Tambah Siaran
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form Card -->
    <div class="card shadow-sm mb-4" id="form-container" style="display: none;">
        <div class="card-header bg-primary text-white">
            <h3 class="card-title mb-0" id="form-title">
                <i class="fas fa-plus-circle me-2"></i>Tambah Data Siaran
            </h3>
        </div>
        <div class="card-body">
            <form id="siaran-form" action="{{ route('data_siaran.store') }}" method="POST">
                @csrf
                <input type="hidden" id="siaran-id" name="siaran_id">
                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="daypart" class="form-label">Daypart</label>
                            <select class="form-select" id="daypart" name="daypart" required>
                                <option value="" disabled selected>Pilih Daypart</option>
                                <option value="SPADA">SPADA</option>
                                <option value="SANTAI_SIANG">SANTAI SIANG</option>
                                <option value="SORE_CERIA">SORE CERIA</option>
                                <option value="JAGA_MALAM">JAGA MALAM</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="penyiar_id" class="form-label">Penyiar</label>
                            <select class="form-select" id="penyiar_id" name="penyiar_id" required>
                                <option value="" disabled selected>Pilih Penyiar</option>
                                @foreach ($penyiars as $penyiar)
                                    <option value="{{ $penyiar->id }}">{{ $penyiar->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="interaksi_pendengar" class="form-label">Interaksi Pendengar</label>
                            <textarea class="form-control" id="interaksi_pendengar" name="interaksi_pendengar" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex justify-content-end gap-2">
                            <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                <i class="fas fa-times me-1"></i>Batal
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i>Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Data Table -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">No</th>
                            <th>Daypart</th>
                            <th width="12%">Tanggal</th>
                            <th>Penyiar</th>
                            <th>Interaksi Pendengar</th>
                            <th width="15%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($siaran as $data)
                        @php
                            $no = 1;
                        @endphp
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>
                                <span class="badge bg-{{ $data->daypart == 'SPADA' || $data->daypart == 'SANTAI_SIANG' ? 'info' : 'primary' }}">
                                    {{ $data->daypart }}
                                </span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($data->tanggal)->format('d/m/Y') }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div>{{ $data->penyiar->nama }}</div>
                                </div>
                            </td>
                            <td class="interaksi-column" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $data->interaksi_pendengar }}">
                                {{ Str::limit($data->interaksi_pendengar, 50) }}
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="btn btn-sm btn-icon btn-warning"
                                            onclick="editSiaran('{{ $data->id }}')"
                                            data-bs-toggle="tooltip" title="Edit">
                                        <i class="bx bx-edit"></i>
                                    </button>
                                    <form action="{{ route('data_siaran.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-icon btn-danger"
                                                data-bs-toggle="tooltip" title="Hapus"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">
                                <i class="fas fa-broadcast-tower fa-2x text-muted mb-3"></i>
                                <h5 class="text-muted">Tidak ada data siaran</h5>
                                <button class="btn btn-sm btn-primary mt-2" onclick="toggleForm()">
                                    <i class="fas fa-plus me-1"></i>Tambah Data Siaran
                                </button>
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

    .interaksi-column {
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

    .badge-bg-SPADA {
        background-color: #4e73df;
    }

    .badge-bg-SANTAI_SIANG {
        background-color: #1cc88a;
    }

    .badge-bg-SORE_CERIA {
        background-color: #f6c23e;
    }

    .badge-bg-JAGA_MALAM {
        background-color: #e74a3b;
    }
</style>

<script>
    function toggleForm() {
        var form = document.getElementById('form-container');
        form.style.display = form.style.display === 'block' ? 'none' : 'block';
        if (form.style.display === 'block') {
            form.scrollIntoView({ behavior: 'smooth' });
        }
    }

    function resetForm() {
        document.getElementById("siaran-form").reset();
        document.getElementById("form-title").innerHTML = '<i class="fas fa-plus-circle me-2"></i>Tambah Data Siaran';
        document.getElementById("siaran-form").action = "{{ route('data_siaran.store') }}";
        document.getElementById("siaran-id").value = "";
        document.getElementById("form-container").style.display = "none";
    }

    function editSiaran(id) {
        fetch(`/data-siaran/edit/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("form-title").innerHTML = '<i class="fas fa-edit me-2"></i>Edit Data Siaran';
                document.getElementById("siaran-form").action = `/data-siaran/update/${id}`;
                document.getElementById("siaran-id").value = data.id;
                document.getElementById("daypart").value = data.daypart;
                document.getElementById("tanggal").value = data.tanggal;
                document.getElementById("penyiar_id").value = data.penyiar_id;
                document.getElementById("interaksi_pendengar").value = data.interaksi_pendengar;

                // Show form and scroll to it
                document.getElementById("form-container").style.display = "block";
                document.getElementById("form-container").scrollIntoView({ behavior: 'smooth' });
            })
            .catch(error => console.error('Error:', error));
    }

    // Initialize tooltips
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

@php
function getDaypartColor($daypart) {
    switch($daypart) {
        case 'SPADA': return 'bg-SPADA';
        case 'SANTAI_SIANG': return 'bg-SANTAI_SIANG';
        case 'SORE_CERIA': return 'bg-SORE_CERIA';
        case 'JAGA_MALAM': return 'bg-JAGA_MALAM';
        default: return 'bg-secondary';
    }
}
@endphp
@endsection
