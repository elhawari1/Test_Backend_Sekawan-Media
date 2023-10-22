<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexManager()
    {
        $user = User::all();
        return view('admin.v_manager', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeManager(Request $request)
    {
        $user = new User([
            'id_role' => '3',
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->nik)
        ]);
        $user->save();
        return redirect()->route('manager')->with('pesan', 'Data Deleted Successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateManager(Request $request, string $id_user)
    {
        $user = User::findOrFail($id_user);
        $user->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->nik)
        ]);
        return redirect()->route('manager')->with('pesan', 'Data Deleted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyManager(string $id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();
        return redirect()->route('manager')->with('pesan', 'Data Deleted Successfully');
    }

    public function indexPegawai()
    {
        $user = User::all();
        return view('admin.v_pegawai', compact('user'));
    }

    public function storePegawai(Request $request)
    {
        $user = new User([
            'id_role' => '4',
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->nik)
        ]);
        $user->save();
        return redirect()->route('pegawai')->with('pesan', 'Data Deleted Successfully');
    }

    public function updatePegawai(Request $request, string $id_user)
    {
        $user = User::findOrFail($id_user);
        $user->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => bcrypt($request->nik)
        ]);
        return redirect()->route('pegawai')->with('pesan', 'Data Deleted Successfully');
    }

    public function destroyPegawai(string $id_user)
    {
        $user = User::findOrFail($id_user);
        $user->delete();
        return redirect()->route('pegawai')->with('pesan', 'Data Deleted Successfully');
    }
}
