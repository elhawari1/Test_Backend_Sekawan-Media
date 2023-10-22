<?php

namespace App\Models\Admin;

use App\Models\User;
use App\Models\Admin\PoolModel;
use App\Models\Admin\DriverModel;
use App\Models\Admin\PesananModel;
use App\Models\Admin\DetailPesanan;
use App\Models\Admin\KendaraanModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesananModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_pesanan';
    protected $primaryKey = 'id_pesanan';
    protected $fillable = ['pegawai', 'id_kendaraan', 'id_driver', 'id_pool', 'manager'];

    public function kendaraan()
    {
        return $this->belongsTo(KendaraanModel::class, 'id_kendaraan');
    }

    public function driver()
    {
        return $this->belongsTo(DriverModel::class, 'id_driver');
    }

    public function pool()
    {
        return $this->belongsTo(PoolModel::class, 'id_pool');
    }

    public function upegawai()
    {
        return $this->belongsTo(User::class, 'pegawai', 'id_user');
    }

    public function umanager()
    {
        return $this->belongsTo(User::class, 'manager', 'id_user');
    }

    public function dpesanan()
    {
        return $this->hasOne(DetailPesanan::class, 'id_pesanan');
    }
    public function countPesanan()
    {
        return $this->hasMany(PesananModel::class, 'id_pesanan');
    }
}