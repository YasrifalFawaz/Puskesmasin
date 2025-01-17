@extends('layouts.pasien_index', ['title' => 'Data Pendaftaran'])

@section('content')

<div class="card">
    <h3 class="card-header">Konsultasi</h3>
    <div class="card-body">
        <a href="/konsultasi/create" class="btn btn-primary">Tambah Data </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                    <th>Keluhan</th>
                    <th>Tanggal Daftar</th>
                    <th>Jadwal Pertemuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->poli->nama_poli }}</td>
                    <td>{{ $item->dokter->nama }}</td>
                    <td>{{ $item->keluhan }}</td>
                    <td>{{ $item->tanggal_daftar }}</td>
                    <td>{{ $item->jadwal_pertemuan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $daftar->links()!!}
    </div>
</div>

@endsection
