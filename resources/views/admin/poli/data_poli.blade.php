@extends('layouts.app_modern', ['title' => 'Data Poli'])
@section('content')
<div class="card">
    <h3 class="card-header">Data Poli</h3>
    <div class="card-body">
        <a href="/poli/create" class="btn btn-primary">Tambah Data</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Nama Poli</th>
                    <th>Biaya</th>
                    <th>Keterangan</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($poli as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->poli }}</td>
                    <td>{{ $item->biaya }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="/poli/{{ $item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <form action="/poli/{{ $item->id }}" method="POST" class="d-inline">
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
        {!! $poli->links()!!}
    </div>
</div>
@endsection