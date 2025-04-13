@extends('layouts.admin')

@section('content')

<div class="container">
    <h1>Rekap Shift Penyiaran</h1>

    <!-- Form Pencarian Hari -->
    <form action="{{ route('shift_penyiaran.rekap') }}" method="GET" class="mb-3 d-flex align-items-center">
        <select name="hari" class="form-select me-2" style="max-width: 200px;">
            <option value="">-- Pilih Hari --</option>
            @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
            <option value="{{ $day }}" {{ request('hari') == $day ? 'selected' : '' }}>{{ $day }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>



    <!-- Tombol Tambah Shift -->
    <a href="{{ route('shift_penyiaran.create') }}" class="btn btn-success mb-3">Tambah Shift</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(isset($shifts) && $shifts->isEmpty())
    <div class="alert alert-warning">Data tidak ditemukan.</div>
    @endif

    @if(isset($shifts) && !$shifts->isEmpty())
    <div class="table-responsive">
    <table class="table table-striped table-bordered text-center">
        <thead class="table-primary">
            <tr>
                <th class="">No</th>
                <th class="">Nama Penyiar</th>
                <th class="">Hari</th>
                <th class="">Jam Mulai</th>
                <th class="">Jam Selesai</th>
                <th class=" naskah-column">Naskah Siaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $index => $shift)
            <tr class="">
                <td>{{ $index + 1 }}</td>
                <td>{{ $shift->nama_penyiar }}</td>
                <td>{{ $shift->hari }}</td>
                <td>{{ $shift->jam_mulai }}</td>
                <td>{{ $shift->jam_selesai }}</td>
                <td class=" naskah-column" title="{{ $shift->naskah_siaran }}">{{ Str::limit($shift->naskah_siaran, 30) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    /* Memperkecil tinggi baris */

    /* Menyesuaikan kolom Naskah Siaran */
    .naskah-column {
        max-width: 150px; /* Batasi lebar kolom */
        white-space: nowrap; /* Mencegah teks turun ke baris baru */
        overflow: hidden; /* Sembunyikan teks berlebih */
        text-overflow: ellipsis; /* Tambahkan tiga titik jika teks terlalu panjang */
    }
</style>



</div>

@endif
</div>
@endsection