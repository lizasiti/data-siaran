@extends('layouts.template')

@section('content')

<h1>Data Siaran</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<button class="btn btn-primary" onclick="toggleForm()">Tambah Siaran</button>

<div class="form-container" id="form-container" style="display: none;">
    <h3 id="form-title">Tambah Data Siaran</h3>
    <form id="siaran-form" action="{{ route('data_siaran.store') }}" method="POST">
        @csrf
        <input type="hidden" id="siaran-id" name="siaran_id">
        <div class="mb-3">
            <label for="daypart" class="form-label">Daypart</label>
            <select class="form-control" id="daypart" name="daypart" required>
                <option value="" disabled selected>Pilih Daypart</option>
                <option value="SPADA">SPADA</option>
                <option value="SANTAI_SIANG">SANTAI SIANG</option>
                <option value="SORE_CERIA">SORE CERIA</option>
                <option value="JAGA_MALAM">JAGA MALAM</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="penyiar" class="form-label">Penyiar</label>
            <input type="text" class="form-control" id="penyiar" name="penyiar" required>
        </div>
        <div class="mb-3">
            <label for="interaksi_pendengar" class="form-label">Interaksi Pendengar</label>
            <textarea class="form-control" id="interaksi_pendengar" name="interaksi_pendengar" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <button type="button" class="btn btn-secondary" onclick="resetForm()">Batal</button>
    </form>
</div>

<div class="table-responsive mt-4">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Daypart</th>
                <th>Tanggal</th>
                <th>Penyiar</th>
                <th>Interaksi Pendengar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siaran as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->daypart }}</td>
                <td>{{ $data->tanggal }}</td>
                <td>{{ $data->penyiar }}</td>
                <td>{{ $data->interaksi_pendengar }}</td>
                <td>
                    <button class="btn btn-warning btn-sm" onclick="editSiaran('{{ $data->id }}')">Edit</button>
                    <form action="{{ route('data_siaran.destroy', $data->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    function toggleForm() {
        var form = document.getElementById('form-container');
        form.style.display = form.style.display === 'block' ? 'none' : 'block';
    }

    function resetForm() {
        document.getElementById("siaran-form").reset();
        document.getElementById("form-title").innerText = "Tambah Data Siaran";
        document.getElementById("siaran-form").action = "{{ route('data_siaran.store') }}";
        document.getElementById("siaran-id").value = "";
    }

    function editSiaran(id) {
        fetch(`/data-siaran/edit/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById("form-title").innerText = "Edit Data Siaran";
                document.getElementById("siaran-form").action = `/data-siaran/update/${id}`;
                document.getElementById("siaran-id").value = data.id;
                document.getElementById("daypart").value = data.daypart;
                document.getElementById("tanggal").value = data.tanggal;
                document.getElementById("penyiar").value = data.penyiar;
                document.getElementById("interaksi_pendengar").value = data.interaksi_pendengar;
                toggleForm();
            })
            .catch(error => console.error('Error:', error));
    }
</script>

@endsection
