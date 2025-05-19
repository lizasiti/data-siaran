@extends('layouts.admin')
@section('content')

<div class="container">
<h1>Daftar Penyiar</h1>

<!-- Tombol Tambah Penyiar -->
<a href="{{ route('penyiar.create') }}" class="btn btn-primary mb-3">Tambah Penyiar</a>


<div class="table-responsive">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ route('penyiar.destroy', $p->id) }}')">
                        Hapus
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <!-- Modal Konfirmasi Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus penyiar ini?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <style>
    .penyiar-foto {
        width: 200px;
        height: 200px;
        object-fit: cover;
        border-radius: 70%;
    }
</style>
</div>
<script>
    function confirmDelete(url) {
        const form = document.getElementById('deleteForm');
        form.action = url;
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    }
</script>


@endsection
