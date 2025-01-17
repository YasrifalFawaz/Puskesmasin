@extends('layouts.app_modern', ['title' => 'Tambah Pendaftaran Peserta'])
@section('content')
<div class="card">
    <div class="card-header">
        Tambah Data Pendaftaran
    </div>
    <div class="card-body">
        <form action="/pendaftaran" method="POST">
            @csrf
            <div class="form-group mt-3">
                <label for="user_id">Nama Pasien
                    |<a href="/admin/create" target="blank">Pasien Baru</a>
                </label>
                <select name="user_id" class="form-control select2">
                    <option value="">-- Pilih Pasien --</option>
                    @foreach ($listPasien as $item)
                        <option value="{{ $item->id }}" @selected(old('user_id') == $item->id)>
                        {{ $item->name }}
                        </option>
                    @endforeach
                </select>
                <span class="text-danger">{{ $errors->first('user_id') }}</span>
            </div>
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
                <span class="text-danger">{{ $errors->first('poli') }}</span>
            </div>
            <div class="form-group mt-3">
                <label for="jadwal_pertemuan" class="">Jadwal Konsultasi</label>
                <input type="date" name="jadwal_pertemuan" class="form-control" value="{{ old('jadwal_pertemuan') ?? date('Y-m-d')}}">
                <span class="text-danger">{{ $errors->first('jadwal_pertemuan')}}</span>
            </div>
            <div class="form-group mt-3 mb-3">
                <label for="keluhan">Keluhan</label>           
                <textarea name="keluhan" rows="2" class="form-control">{{ old('keluhan') }}</textarea> <span class="text-danger">{{ $errors->first('keluhan') }}</span>              
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
    
@endsection
