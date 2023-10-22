<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\KendaraanModel;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = KendaraanModel::all();
        return view('admin.v_kendaraan', compact('kendaraan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kendaraan = new KendaraanModel([
            'kode_kendaraan' => $request->kode_kendaraan,
            'type' => $request->type,
            'merk' => $request->merk
        ]);
        $kendaraan->save();
        return redirect()->route('kendaraan')->with('pesan', 'Data Deleted Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_kendaraan)
    {
        $kendaraan = KendaraanModel::findOrFail($id_kendaraan);
        $kendaraan->update([
            'type' => $request->type,
            'merk' => $request->merk
        ]);
        return redirect()->route('kendaraan')->with('pesan', 'Data Deleted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_kendaraan)
    {
        $kendaraan = KendaraanModel::findOrFail($id_kendaraan);
        $kendaraan->delete();
        return redirect()->route('kendaraan')->with('pesan', 'Data Deleted Successfully');
    }
}
