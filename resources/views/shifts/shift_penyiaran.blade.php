@extends('layouts.template')

@section('content')
<div class="container">
    <h1>Shift Penyiaran</h1>

    <!-- Tombol Lihat Rekap Shift -->
    <a href="{{ route('shift_penyiaran.rekap') }}" class="btn btn-info mb-3">Lihat Rekap Shift</a>

    <!-- Tombol Tambah Shift -->
    <a href="{{ route('shift_penyiaran.create') }}" class="btn btn-success mb-3">Tambah Data Penyiaran</a>
    
    <!-- Form Pencarian -->
<!-- Form Pencarian dengan Bootstrap -->
 <div class="input-group">
<form action="{{ route('shift_penyiaran.index') }}" method="GET" class="mb-3 ">
    <div class="">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari Nama Penyiar..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary rounded-end">Cari</button>
    </div>
</form>
</div>



    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Penyiar</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th class="naskah-column">Naskah Siaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($shifts as $index => $shift)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $shift->nama_penyiar }}</td>
                    <td>{{ $shift->hari }}</td>
                    <td>{{ $shift->jam_mulai }}</td>
                    <td>{{ $shift->jam_selesai }}</td>
                    <td class="naskah-column">{{ $shift->naskah_siaran }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
@endsection
