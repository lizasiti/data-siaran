@extends('layouts.admin')

@section('content')

<div class="container">
    <h1>Tambah Penyiar</h1>

    <form action="{{ route('penyiar.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Penyiar</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Penyiar</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penyiar.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@endsection
