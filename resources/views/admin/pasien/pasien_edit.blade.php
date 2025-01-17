@extends('layouts.app_modern', ['title' => 'Data Pasien'])

@section('content')

<div class="card">
    <h5 class="card-header">Edit Data Pasien <b>{{ $pasien->nama }}</b></h5>
    <div class="card-body">
        <form action="/admin/{{ $pasien->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group mt-1 mb-3">
                <label for="name">Nama Pasien</label>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror"
                       id="name" 
                       name="name" 
                       value="{{ old('name') ?? $pasien->name }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <!-- Umur -->
            <div class="form-group mt-1 mb-3">
                <label for="umur">Umur</label>
                <input type="number" 
                       class="form-control @error('umur') is-invalid @enderror" 
                       id="umur" 
                       name="umur" 
                       value="{{ old('umur') ?? $pasien->umur }}">
                <span class="text-danger">{{ $errors->first('umur') }}</span>
            </div>
            <!-- Jenis Kelamin -->
            <div class="form-group mt-1 mb-3">
                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="jenis_kelamin" 
                           id="laki_laki" 
                           value="laki-laki" 
                           {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin === 'laki-laki' ? 'checked' : '' }}>
                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="jenis_kelamin" 
                           id="perempuan" 
                           value="perempuan" 
                           {{ old('jenis_kelamin') ?? $pasien->jenis_kelamin === 'perempuan' ? 'checked' : '' }}>
                    <label class="form-check-label" for="perempuan">Perempuan</label>
                </div>
                <span class="text-danger">{{ $errors->first('jenis_kelamin') }}</span>
            </div>

            <!-- Alamat -->
            <div class="form-group mt-1 mb-3">
                <label for="alamat">Alamat</label>
                <input type="text" 
                       class="form-control @error('alamat') is-invalid @enderror" 
                       id="alamat" 
                       name="alamat" 
                       value="{{ old('alamat') ?? $pasien->alamat }}">
                <span class="text-danger">{{ $errors->first('alamat') }}</span>
            </div> 
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
</div>

@endsection
