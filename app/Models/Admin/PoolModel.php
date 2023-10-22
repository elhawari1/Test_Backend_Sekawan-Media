<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoolModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_pool';
    protected $primaryKey = 'id_pool';
    protected $fillable = ['id_role', 'user_pool', 'pool'];
}
