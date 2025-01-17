@extends('layouts.pasien_index', ['title' => 'Data Pendaftaran'])

@section('content')

<div class="card">
    <h3 class="card-header">Riwayat Konsultasi</h3>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Tanggal Konsultasi</th>
                    <th>Poli</th>
                    <th>Keluhan</th>
                    <th>Diagnosis</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->jadwal_pertemuan }}</td>
                    <td>{{ $item->poli->nama_poli }}</td>
                    <td>{{ $item->keluhan}}</td>
                    <td>{{ $item->diagnosis}}</td>
                    <td>{{ $item->tindakan }}</td>
                    <td>
                    </td>
                </tr>   
                @endforeach
            </tbody>
        </table>
        {!! $daftar->links()!!}
    </div>
</div>

@endsection
