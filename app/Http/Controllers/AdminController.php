<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $pasien = User::where('role', 'user')->paginate(10);
        return view('admin.pasien.data_pasien', compact('pasien'));
    }

    public function create()
    {
        return view('admin.pasien.pasien_create');
    }

    public function store(Request $request)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable',
            'email' => 'required',
            'password' => 'required',
        ]);

        $pasien = new User;
        $pasien->fill($requestData);
        $pasien->save();
        return back()->with('pesan', 'Data berhasil disimpan');
    }

    public function edit(string $id)
    {
        $pasien = User::findOrFail($id);
        return view('admin.pasien.pasien_edit', compact('pasien'));
        return back()->with('pesan', 'Data berhasil disimpan');
    }

    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'name' => 'required',
            'umur' => 'required|integer',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable|string'
        ]);

        $pasien = User::findOrFail($id);
        $pasien->fill($requestData);
        $pasien->save();

        return redirect('/admin')->with('pesan', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
        $pasien = User::findOrFail($id);

        if ($pasien->daftar->count() >= 1) {
            return back()->with('pesan', 'Oops.. Data tidak bisa dihapus, karena terkait dengan data pendaftaran');
        }

        $pasien->delete();
        return back()->with('pesan', 'Data berhasil dihapus');
    }
}
