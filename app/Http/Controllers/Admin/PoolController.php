<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Admin\PoolModel;
use App\Http\Controllers\Controller;

class PoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pool = PoolModel::all();
        return view('admin.v_pool', compact('pool'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pool = new PoolModel([
            'id_role' => '5',
            'user_pool' => $request->user_pool,
            'pool' => $request->pool,
        ]);

        $pool->save();
        return redirect()->route('pool')->with('pesan', 'Data Deleted Successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_pool)
    {
        $pool = PoolModel::findOrFail($id_pool);
        $pool->update([
            'user_pool' => $request->user_pool,
            'pool' => $request->pool
        ]);
        return redirect()->route('pool')->with('pesan', 'Data Deleted Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_pool)
    {
        $pool = PoolModel::findOrFail($id_pool);
        $pool->delete();
        return redirect()->route('pool')->with('pesan', 'Data Deleted Successfully');
    }
}
