@extends('layouts.template')
@section('content')

<h1>Daftar Penyiar</h1>

<!-- Tombol Tambah Penyiar -->
<a href="{{ route('penyiar.create') }}" class="btn btn-primary mb-3">Tambah Penyiar</a>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nama Penyiar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penyiar as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>
                    <img src="{{ asset('storage/' . $p->foto) }}" alt="{{ $p->nama }}" class="penyiar-foto">
                </td>
                <td>{{ $p->nama }}</td>
                <td>
                    <a href="{{ route('penyiar.edit', $p->id) }}" class="btn btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .penyiar-foto {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 70%;
    }
</style>

@endsection
