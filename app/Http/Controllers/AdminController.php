<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pasien'] = \App\Models\Pasien::latest()->paginate(10); 
        return view('admin_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pasien_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable'
        ]);
        $pasien = new \App\Models\Pasien;
        $pasien->fill($requestData);
        $pasien->save();
        return back()->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['pasien'] = \App\Models\Pasien::findOrFail($id);
        return view('pasien_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable'
        ]);
        $pasien = \App\Models\Pasien::findOrfail($id);
        $pasien->fill($requestData);
        $pasien->save();
        return redirect('/admin')->with('pesan', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pasien = \App\Models\Pasien::findOrFail($id);

        if ($pasien->daftar->count() >= 1) {
            return back()->with('pesan', 'Oops.. Data tidak bisa dihapus, karena terkait dengan data pendaftaran');
        }

        $pasien->delete();
        return back()->with('pesan', 'Data berhasil dihapus');
    }
}
