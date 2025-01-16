@extends('layouts.app_modern', ['title' => 'Data Pasien'])

@section('content')

<div class="card">
    <h5 class="card-header">Tambah Data Pasien</h5>
    <div class="card-body">
        <form action="/admin" method="POST">
            @csrf
            <div class="form-group mt-1 mb-3">
                <label for="nama">Nama Pasien</label>
                <input type="text" 
                       class="form-control @error('nama') is-invalid @enderror"
                       id="nama" 
                       name="nama" 
                       value="{{ old('nama') }}">
                <span class="text-danger">{{ $errors->first('nama') }}</span>
            </div>
            <!-- Umur -->
            <div class="form-group mt-1 mb-3">
                <label for="umur">Umur</label>
                <input type="number" 
                       class="form-control @error('umur') is-invalid @enderror" 
                       id="umur" 
                       name="umur" 
                       value="{{ old('umur') }}">
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
                           {{ old('jenis_kelamin') === 'laki-laki' ? 'checked' : '' }}>
                    <label class="form-check-label" for="laki_laki">Laki-laki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" 
                           type="radio" 
                           name="jenis_kelamin" 
                           id="perempuan" 
                           value="perempuan" 
                           {{ old('jenis_kelamin') === 'perempuan' ? 'checked' : '' }}>
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
                       value="{{ old('alamat') }}">
                <span class="text-danger">{{ $errors->first('alamat') }}</span>
            </div> 
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
</div>

@endsection
