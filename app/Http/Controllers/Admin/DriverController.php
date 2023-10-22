<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\DriverModel;
use App\Http\Controllers\Controller;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $driver = DriverModel::all();
        return view('admin.v_driver', compact('driver'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $driver = new DriverModel([
            'id_role' => '6',
            'nid' => $request->nid,
            'user_driver' => $request->user_driver,
            'status' => '0',
        ]);

        $driver->save();
        return redirect()->route('driver')->with('pesan', 'Data Deleted Successfully');
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
    public function destroy(string $id_driver)
    {
        $driver = DriverModel::findOrFail($id_driver);
        $driver->delete();
        return redirect()->route('driver')->with('pesan', 'Data Deleted Successfully');
    }
}
