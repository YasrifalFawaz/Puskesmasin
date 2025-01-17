<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['poli'] = \App\Models\Poli::latest()->paginate(10); 
        return view('admin.poli.data_poli', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.poli.poli_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'poli' => 'required',
            'biaya' => 'required|numeric',
            'keterangan' => 'required'
        ]);
        $poli = new \App\Models\Poli();
        $poli->fill($requestData);
        $poli->save();
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
        $data['poli'] = \App\Models\Poli::findOrFail($id);
        return view('admin.poli.poli_edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $requestData = $request->validate([
        'nama_poli' => 'required',
        'biaya' => 'required|numeric',
        'keterangan' => 'required',
    ]);
    $poli = \App\Models\poli::findOrfail($id);
    $poli->fill($requestData);
    $poli->save();
    return redirect('/poli')->with('pesan', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $poli= \App\Models\poli::findOrFail($id);

        if ($poli->daftar->count() >= 1) {
            return back()->with('pesan', 'Oops.. Data tidak bisa dihapus, karena terkait dengan data pendaftaran');
        }

        $poli->delete();
        return back()->with('pesan', 'Data berhasil dihapus');
    }
}
