@extends('layouts.admin')
@section('content')
    <div class="container mt-5">
        {{-- Session --}}
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="mb-4">Jadwal Siaran</h2>
        <div class="d-flex justify-content-end gap-2">
            <a href="{{ route('weekly.index')}}" class="btn btn-info mb-3"><i class="bx bx-calendar me-2"></i> Jadwal Mingguan</a></a>
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah">
                <i class="bx bx-plus me-1"></i>Tambah Jadwal
            </button>
        </div>
        

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Jam Mulai</th>
                        <th>Jam Selesai</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwal as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>{{ $data->deskripsi }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $data->jam_mulai)->format('H:i') }}</td>
                            <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $data->jam_selesai)->format('H:i') }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $data->gambar) }}" alt="Gambar" class="img-thumbnail"
                                    style="max-height: 100px;">
                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $data->id }}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#hapus{{ $data->id }}">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah --}}
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('jadwal-siaran.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="tambahLabel">Tambah Jadwal Siaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('jadwal-siaran.update', $data->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul" name="judul"
                                   required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                                   required>
                            </div>
                            <div class="mb-3">
                                <label for="gambar" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                                

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>

                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit --}}
    @foreach ($jadwal as $data)
        <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" aria-labelledby="editLabel{{ $data->id }}"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('jadwal-siaran.update', $data->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="editLabel{{ $data->id }}">Edit Jadwal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_method" value="PUT">
                            <form action="{{ route('jadwal-siaran.update', $data->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ $data->judul }}">
                                </div>
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $data->deskripsi }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="jam_mulai" class="form-label">Jam Mulai</label>
                                    <input type="time" class="form-control" id="jam_mulai" name="jam_mulai"
                                        value="{{ $data->jam_mulai }}">
                                </div>
                                <div class="mb-3">
                                    <label for="jam_selesai" class="form-label">Jam Selesai</label>
                                    <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                                        value="{{ $data->jam_selesai }}">
                                </div>
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar</label>
                                    <input type="file" class="form-control" id="gambar" name="gambar" value="{{ $data->gambar }}" accept="image/*" >
                                    <img class="img-thumbnail w-25 h-25 mb-3 "
                                        src="{{ asset('storage/' . $data->gambar) }}" alt="">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    @endforeach

    {{-- Modal Hapus --}}
    @foreach ($jadwal as $data)
        <div class="modal fade" id="hapus{{ $data->id }}" tabindex="-1"
            aria-labelledby="hapusLabel{{ $data->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('jadwal-siaran.destroy', $data->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-header">
                            <h5 class="modal-title" id="hapusLabel{{ $data->id }}">Konfirmasi Hapus</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah kamu yakin ingin menghapus jadwal <strong>{{ $data->judul }}</strong>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
