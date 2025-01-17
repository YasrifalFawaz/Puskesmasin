@extends('layouts.pasien_index', ['title' => 'Data Pendaftaran'])

@section('content')

<div class="card">
    <h3 class="card-header">Riwayat Konsultasi</h3>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Daftar</th>
                    <th>Poli</th>
                    <th>Keluhan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pasien->nama }}</td>
                    <td>{{ $item->pasien->jenis_kelamin }}</td>
                    <td>{{ $item->tanggal_daftar }}</td>
                    <td>{{ $item->poli }}</td>
                    <td>{{ $item->keluhan }}</td>
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
