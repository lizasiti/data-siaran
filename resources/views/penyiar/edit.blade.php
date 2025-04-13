@extends('layouts.admin')
@section('content')

<div class="container">
    <h1>Edit Penyiar</h1>

<form action="{{ route('penyiar.update', $penyiar->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Penyiar</label>
        <input type="text" class="form-control" id="nama" name="nama" value="{{ $penyiar->nama }}" required>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto Saat Ini</label><br>
        <img src="{{ asset('storage/' . $penyiar->foto) }}" width="150">
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Upload Foto Baru</label>
        <input type="file" class="form-control" id="foto" name="foto">
    </div>
    <button type="submit" class="btn btn-primary">Update Penyiar</button>
</form>
</div>

@endsection
