<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;

class AdminController extends Controller
{
    public function index()
    {
        $data['pasien'] = Pasien::latest()->paginate(10);
        return view('pasien.data_pasien', $data);
    }

    public function create()
    {
        return view('pasien.pasien_create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string'
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'umur.required' => 'Umur wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib diisi.',
            'jenis_kelamin.in' => 'Jenis kelamin hanya boleh L atau P.'
        ]);

        try {
            $pasien = new Pasien;
            $pasien->fill($requestData);
            $pasien->save();
            return back()->with('pesan', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return back()->with('pesan', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function edit(string $id)
    {
        $data['pasien'] = Pasien::findOrFail($id);
        return view('pasien.pasien_edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string'
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->fill($requestData);
        $pasien->save();

        return redirect('/admin')->with('pesan', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $pasien = Pasien::findOrFail($id);

        if ($pasien->daftar->count() >= 1) {
            return back()->with('pesan', 'Oops.. Data tidak bisa dihapus, karena terkait dengan data pendaftaran');
        }

        $pasien->delete();
        return back()->with('pesan', 'Data berhasil dihapus');
    }
}
