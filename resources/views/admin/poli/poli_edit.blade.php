@extends('layouts.app_modern', ['title' => 'Data Pasien'])

@section('content')

<div class="card">
    <h5 class="card-header">Edit Data Poli <b>{{ $poli->poli }}</b></h5>
    <div class="card-body">
        <form action="/poli/{{ $poli->id }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group mt-1 mb-3">
                <label for="poli_id">Nama Poli</label>
                <input type="text" 
                       class="form-control @error('poli_id') is-invalid @enderror"
                       id="poli_id" 
                       name="poli_id" 
                       value="{{ old('poli_id') ?? $poli->nama_poli }}">
                <span class="text-danger">{{ $errors->first('poli_id') }}</span>
            </div>
            <!-- biaya -->
            <div class="form-group mt-1 mb-3">
                <label for="biaya">biaya</label>
                <input type="number" 
                       class="form-control @error('biaya') is-invalid @enderror" 
                       id="biaya" 
                       name="biaya" 
                       value="{{ old('biaya') ?? $poli->biaya }}">
                <span class="text-danger">{{ $errors->first('biaya') }}</span>
            </div>
            <!-- Jenis Kelamin -->
            <div class="form-group mt-1 mb-3">
                <label for="keterangan">keterangan</label>
                <input type="text" 
                       class="form-control @error('keterangan') is-invalid @enderror"
                       id="keterangan" 
                       name="keterangan" 
                       value="{{ old('keterangan') ?? $poli->keterangan }}">
                <span class="text-danger">{{ $errors->first('keterangan') }}</span>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
</div>

@endsection
