@extends('layouts.admin')
@section('content')

    <div class="banner">Selamat datang di RRI Pro 2 Sumenep 94.6 FM</div>

    <div class="container" id="schedule-pro2">
        <h1>Pro2 Today</h1>
        <div class="grid">
            @foreach ($programsPro2Today as $program)
                <div class="card">
                    <h2>{{ $program['nama_program'] }}</h2>
                    <p><strong>{{ $program['waktu'] }}</strong></p>
                    <p>{{ $program['deskripsi'] }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Form Tambah Program Baru -->
    <div class="container">
        <h2>Tambah Program Baru</h2>
        <div class="form-container">
            <form action="{{ route('programs.store') }}" method="POST">
                @csrf
                <input type="text" name="nama_program" placeholder="Nama Program" required>
                <input type="text" name="waktu" placeholder="Waktu" required>
                <input type="text" name="description" placeholder="Deskripsi" required>
                <button type="submit">Tambah Program</button>
            </form>
        </div>
    </div>
    @endsection
