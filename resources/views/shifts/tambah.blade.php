@extends('layouts.admin')

@section('content')

<div class="container">

    <h3>Tambah Data Penyiaran</h3>

    <form action="{{ route('shift_penyiaran.store') }}" method="POST">
        @csrf

        <!-- Nama Penyiar -->
        <div class="mb-3">
            <label for="penyiar_id" class="form-label">Nama Penyiar</label>
            <select class="form-control @error('penyiar_id') is-invalid @enderror" id="penyiar_id" name="penyiar_id" required>
                <option value="">-- Pilih Penyiar --</option>
                @foreach ($penyiars as $penyiar)
                    <option value="{{ $penyiar->id }}">{{ $penyiar->nama }}</option>
                @endforeach
            </select>
            @error('nama_penyiar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Hari -->
        <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <select class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari" required>
                <option value="">-- Pilih Hari --</option>
                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                    <option value="{{ $day }}" {{ old('hari') == $day ? 'selected' : '' }}>{{ $day }}</option>
                @endforeach
            </select>
            @error('hari')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Jam Mulai -->
        <div class="mb-3">
            <label for="jam_mulai" class="form-label">Jam Mulai</label>
            <input type="time"  class="form-control @error('jam_mulai') is-invalid @enderror" id="jam_mulai" name="jam_mulai" value="{{ old('jam_mulai') }}" required>
            @error('jam_mulai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Jam Selesai -->
        <div class="mb-3">
            <label for="jam_selesai" class="form-label">Jam Selesai</label>
            <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" id="jam_selesai" name="jam_selesai" value="{{ old('jam_selesai') }}" required>
            @error('jam_selesai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Isi Berita -->
        <div class="mb-3">
            <label for="naskah_siaran" class="form-label">Naskah Siaran</label>
            <textarea class="form-control @error('naskah_siaran') is-invalid @enderror" id="naskah_siaran" name="naskah_siaran" rows="4" required>{{ old('naskah_siaran') }}</textarea>
            @error('naskah_siaran')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tombol Tambah -->
        <button type="submit" class="btn btn-primary">Tambah Siaran</button>
    </form>
    <script>
        flatpickr("#jam_mulai", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });

        flatpickr("#jam_selesai", {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
    </script>


</div>

@endsection
