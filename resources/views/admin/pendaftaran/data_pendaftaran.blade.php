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
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Daftar</th>
                    <th>Poli</th>
                    <th>Keluhan</th>
                    <th>AKSI</th>
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
                        <a href="/pendaftaran/{{ $item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
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
