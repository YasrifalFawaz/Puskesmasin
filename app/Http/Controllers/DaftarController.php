<?php

namespace App\Http\Controllers;

use App\Models\Daftar;
use App\Models\User;
use App\Http\Requests\StoreDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['daftar'] = \App\Models\Daftar::latest()->paginate(10); 
        return view('admin.pendaftaran.data_pendaftaran', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listPasien'] = User::where('role', '=', 'user')->get();
        $data['listDokter'] = \App\Models\Dokter::orderBy('nama','asc')->get(); 
        $data['listPoli'] =  \App\Models\Poli::orderBy('nama_poli','asc')->get();

        // dd($data['listPasien']);
        return view('admin.pendaftaran.pendaftaran_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'user_id' => 'nullable',
            'poli_id' => 'required',
            'dokter_id' => 'required',
            'jadwal_pertemuan' => 'required',
            'keluhan' => 'required'
        ]);
        $requestData['tanggal_daftar'] = now()->format('Y-m-d');
        $requestData['user_id'] = auth()->id();
        $daftar = new Daftar;
        $daftar->fill($requestData);
        $daftar->save();

        return back()->with('pesan', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $daftar = Daftar::with('user')->findOrFail($id);
        return view('admin.pendaftaran.pendaftaran_show', compact('daftar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Daftar $daftar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->validate([
            'diagnosis' => 'required',
            'tindakan' => 'required'
        ]);
        $daftar = Daftar::findOrFail($id);
        $daftar->fill($requestData);
        $daftar->save();
        return redirect()->route('pendaftaran.index');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $daftar = Daftar::findOrFail($id);
        $daftar->delete();
        return back()->with('pesan', 'Data berhasil dihapus');
    }
}
