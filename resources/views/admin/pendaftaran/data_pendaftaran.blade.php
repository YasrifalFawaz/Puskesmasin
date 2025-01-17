@extends('layouts.app_modern', ['title' => 'Data Pendaftaran'])

@section('content')

<div class="card">
    <h3 class="card-header">Data Pendaftaran</h3>
    <div class="card-body">
        <a href="/pendaftaran/create" class="btn btn-primary">Tambah Data </a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                    <th>Tanggal Daftar</th>
                    <th>Tanggal Konsultasi</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->name }}</td>
                    <td>{{ $item->poli->nama_poli }}</td>
                    <td>{{ $item->dokter->nama }}</td>
                    <td>{{ $item->tanggal_daftar }}</td>
                    <td>{{ $item->jadwal_pertemuan }}</td>
                    <td>
                        <a href="/pendaftaran/{{ $item->id}}" class="btn btn-info btn-sm">Detail</a>
                        <form action="/pendaftaran/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {!! $daftar->links()!!}
    </div>
</div>

@endsection
