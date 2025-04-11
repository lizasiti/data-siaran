@extends('layouts.template')
@section('content')

<div class="">

    <h1>jadwal siaran</h1>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Jam Mulai</th>
            <th>Jam Selesai</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @foreach ($jadwal as $data)
            <tr>
                <td>1</td>
                <th>{{ $data->judul }}</th>
                <th>{{ $data->deskripsi }}</th>
                <th>{{ $data->jam_mulai }}</th>
                <th>{{ $data->jam_selesai }}</th>
                <th>{{ $data->gambar }}</th>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action=""></form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection