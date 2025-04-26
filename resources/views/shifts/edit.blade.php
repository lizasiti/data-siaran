@extends('layouts.admin')
@section('content')

    <div class="container">
        <h3>Edit Data Siaran</h3>
        <form action="{{ route('shift_penyiaran.update', $shift->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Metode untuk update data --}}

            {{--        sessison error--}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label for="penyiar_id" class="form-label">Nama Penyiar</label>
                <select class="form-control" id="penyiar_id" name="penyiar_id" required>
                    @foreach ($penyiars as $penyiar)
                        <option
                            value="{{ $penyiar->id }}" {{ $shift->penyiar_id == $penyiar->id ? 'selected' : '' }}>{{ $penyiar->nama }}</option>
                    @endforeach
                </select>
                {{--            error--}}
                @error('penyiar_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <select class="form-control" id="hari" name="hari" required>
                    <option value="Senin" {{ $shift->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                    <option value="Selasa" {{ $shift->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                    <option value="Rabu" {{ $shift->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                    <option value="Kamis" {{ $shift->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                    <option value="Jumat" {{ $shift->hari == 'Jumat' ? 'selected' : '' }}>Jumat</option>
                    <option value="Sabtu" {{ $shift->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                    <option value="Minggu" {{ $shift->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="jam_mulai" class="form-label">Jam Mulai</label>
                <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $shift->jam_mulai }}"
                       required>
            </div>

            <div class="mb-3">
                <label for="jam_selesai" class="form-label">Jam Selesai</label>
                <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"
                       value="{{ $shift->jam_selesai }}" required>
            </div>
            <div class="mb-3">
                <label for="naskah_siaran" class="form-label">Naskah Siaran</label>
                <input type="text" class="form-control" id="naskah_siaran" name="naskah_siaran"
                       value="{{ $shift->naskah_siaran }}" required>
            </div>

            <button type="submit" class="btn btn-success">Update Siaran</button>
        </form>
    </div>

@endsection
