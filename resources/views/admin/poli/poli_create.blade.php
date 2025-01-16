@extends('layouts.app_modern', ['title' => 'Tambah Data Poli'])

@section('content')

<div class="card">
    <h5 class="card-header">Tambah Data Poli</h5>
    <div class="card-body">
        <form action="/poli" method="POST">
            @csrf
            <div class="form-group mt-1 mb-3">
                <label for="poli">Nama Poli</label>
                <input type="text" 
                       class="form-control @error('poli') is-invalid @enderror"
                       id="poli" 
                       name="poli" 
                       value="{{ old('poli') }}">
                <span class="text-danger">{{ $errors->first('poli') }}</span>
            </div>
            <!-- Biaya -->
            <div class="form-group mt-1 mb-3">
                <label for="biaya">Biaya</label>
                <input type="number" 
                       class="form-control @error('biaya') is-invalid @enderror" 
                       id="biaya" 
                       name="biaya" 
                       value="{{ old('biaya') }}">
                <span class="text-danger">{{ $errors->first('biaya') }}</span>
            </div>
            <!-- Keterangan -->
            <div class="form-group mt-1 mb-3">
                <label for="keterangan">Keterangan</label>
                <input type="text" 
                       class="form-control @error('keterangan') is-invalid @enderror"
                       id="keterangan" 
                       name="keterangan" 
                       value="{{ old('keterangan') }}">
                <span class="text-danger">{{ $errors->first('keterangan') }}</span>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
</div>

@endsection
