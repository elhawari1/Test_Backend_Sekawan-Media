<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Admin\PoolModel;
use App\Models\Admin\DriverModel;
use App\Models\Admin\PesananModel;
use App\Models\Admin\DetailPesanan;
use App\Http\Controllers\Controller;
use App\Models\Admin\KendaraanModel;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pool = PoolModel::all();
        $driver = DriverModel::all();
        $kendaraan = KendaraanModel::all();
        $user = User::all();
        $pesanan = PesananModel::all();
        $dpesanan = DetailPesanan::all();
        return view('admin.v_pesanan', compact('kendaraan', 'driver', 'pool', 'user', 'pesanan', 'dpesanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pesanan = new PesananModel([
            'pegawai' => $request->pegawai,
            'id_kendaraan' => $request->id_kendaraan,
            'id_driver' => $request->id_driver,
            'id_pool' => $request->id_pool,
            'manager' => $request->manager,
        ]);
        $pesanan->save();

        $data = [
            'id_pesanan' => $pesanan->id_pesanan,
            'status_pool' => '0',
            'status_manager' => '0',
        ];
        DetailPesanan::create($data);
        return redirect()->route('pesanan')->with('pesan', 'Data Insert Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_pesanan)
    {
        $dpesanan = DetailPesanan::where('id_pesanan', $id_pesanan)->first();
        $kendaraan = KendaraanModel::all();
        $driver = DriverModel::all();
        $pool = PoolModel::all();
        $user = User::all();
        $pesanan = PesananModel::all();
        return view('admin.v_showpesanan', compact('dpesanan', 'kendaraan', 'driver', 'pool', 'user', 'pesanan'));

    }

    public function setujuPool(Request $request, $id_detail_pesanan)
    {
        $dpesan = DetailPesanan::findOrFail($id_detail_pesanan);
        $dpesan->update([
            'status_pool' => '1',
        ]);
        return redirect()->route('pesanan')->with('pesan', 'Data Deleted Successfully');

    }

    public function setujuManager(Request $request, $id_detail_pesanan)
    {
        $dpesan = DetailPesanan::findOrFail($id_detail_pesanan);
        $dpesan->update([
            'status_manager' => '1',
        ]);
        return redirect()->route('pesanan')->with('pesan', 'Data Deleted Successfully');

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pesanan)
    {
        $pesanan = PesananModel::findOrFail($id_pesanan);
        $pesanan->update([
            'pegawai' => $request->pegawai,
            'id_kendaraan' => $request->id_kendaraan,
            'id_driver' => $request->id_driver,
            'id_pool' => $request->id_pool,
            'manager' => $request->manager
        ]);
        return redirect()->route('pesanan')->with('pesan', 'Data Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pesanan)
    {
        $pesanan = PesananModel::findOrFail($id_pesanan);
        $pesanan->delete();
        return redirect()->route('pesanan')->with('pesan', 'Data Deleted Successfully');
    }
}