@extends('layouts.pasien_index', ['title' => 'Tambah Pendaftaran Peserta'])
@section('content')
<div class="card">
    <div class="card-header">
        Daftar Konsultasi
    </div>
    <div class="card-body">
        <form action="/konsultasi" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="poli_id">Pilih Poli Tujuan</label>
                <select name="poli_id" class="form-control">
                    <option value="">-- Pilih Poli --</option>
                    @foreach ($listPoli as $itemPoli)
                        <option value="{{ $itemPoli->id }}" @selected(old('poli_id') == $itemPoli->id)>
                            {{ $itemPoli->nama_poli }} - {{ $itemPoli->biaya }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('poli_id') }}</span>
            </div>
            <div class="form-group mt-3">
                <label for="dokter_id">Pilih Dokter</label>
                <select name="dokter_id" class="form-control">
                    <option value="">-- Pilih Dokter --</option>
                    @foreach ($listDokter as $itemDokter)
                        <option value="{{ $itemDokter->id }}" @selected(old('dokter_id') == $itemDokter->id)>
                            {{ $itemDokter->nama }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('dokter_id') }}</span>
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="keluhan">Keluhan</label>           
                <textarea name="keluhan" rows="2" class="form-control">{{ old('keluhan') }}</textarea> <span class="text-danger">{{ $errors->first('keluhan') }}</span>              
            </div>
            <div class="form-group mt-3">
                <label for="jadwal_pertemuan" class="">Jadwal Konsultasi</label>
                <input type="date" name="jadwal_pertemuan" class="form-control" value="{{ old('jadwal_pertemuan') ?? date('Y-m-d')}}">
                <span class="text-danger">{{ $errors->first('jadwal_pertemuan')}}</span>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>Simpan Pendaftaran</form>  
        </form>
    </div>
</div>
    
@endsection
