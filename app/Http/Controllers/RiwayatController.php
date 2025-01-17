<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\App\Http\Controllers\DaftarController;
use App\Models\Daftar;
use Carbon\Carbon;


class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::today(); // Mendapatkan tanggal hari ini
        $daftar = Daftar::where('jadwal_pertemuan', '<', $today)
        ->where('user_id', auth()->id()) // Hanya data milik user yang login
        ->with('poli') // Pastikan relasi poli di-load
        ->paginate(10);
        return view('pasien.riwayat.data_riwayat', compact('daftar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
