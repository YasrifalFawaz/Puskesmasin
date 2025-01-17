@extends('layouts.app_modern', ['title' => 'Data Pasien'])

@section('content')

<div class="card">
    <h5 class="card-header">Tambah Data Pasien</h5>
    <div class="card-body">
        <form action="/admin" method="POST">
            @csrf
            <div class="form-group mt-1 mb-3">
                <label for="name">Nama Pasien</label>
                <input type="text" 
                       class="form-control @error('name') is-invalid @enderror"
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
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
            <!-- Email -->
            <div class="form-group mt-1 mb-3">
                <label for="email">E-mail</label>
                <input type="email" 
                       class="form-control @error('email') is-invalid @enderror"
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}">
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <!-- Password -->
            <div class="form-group mt-1 mb-3">
                <label for="password">Password</label>
                <input type="password" 
                       class="form-control @error('password') is-invalid @enderror"
                       id="password" 
                       name="password" 
                       value="{{ old('password') }}">
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
</div>

@endsection
