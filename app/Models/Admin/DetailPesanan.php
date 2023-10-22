<?php

namespace App\Models\Admin;

use App\Models\Admin\PesananModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailPesanan extends Model
{
    use HasFactory;

    protected $table = "tbl_detail_pesanan";
    protected $primaryKey = "id_detail_pesanan";
    protected $fillable = ['id_pesanan', 'status_pool', 'status_manager'];

    public function pesanan()
    {
        return $this->belongsTo(PesananModel::class, 'id_pesanan');
    }
}
