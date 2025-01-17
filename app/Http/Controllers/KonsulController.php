<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DaftarController;
use App\Models\Daftar;
use App\Http\Requests\StoreDaftarRequest;
use App\Http\Requests\UpdateDaftarRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KonsulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $daftar = Daftar::where('user_id', Auth::id())->with('user', 'poli')->latest()->paginate(10);
        return view('pasien.konsultasi.data_konsultasi', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['listDokter'] = \App\Models\Dokter::orderBy('nama', 'asc')->get();
        $data['listPoli'] =  \App\Models\Poli::orderBy('nama_poli','asc')->get();
        return view('pasien.konsultasi.konsultasi_create', $data);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            'poli_id' => 'required',
            'dokter_id' => 'required',
            'keluhan' => 'required',
            'jadwal_pertemuan' => 'required'
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
