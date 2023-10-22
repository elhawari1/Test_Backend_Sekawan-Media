<?php

namespace App\Models\Admin;

use App\Models\Admin\KendaraanModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KendaraanModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $fillable = ['kode_kendaraan','type', 'merk'];

    public function countKendaraan()
    {
        return $this->hasMany(KendaraanModel::class, 'id_kendaraan');
    }
}
