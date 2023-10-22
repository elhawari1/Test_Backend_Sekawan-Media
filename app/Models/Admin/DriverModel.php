<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_driver';
    protected $primaryKey = 'id_driver';
    protected $fillable = ['id_role', 'nid', 'user_driver', 'status'];
}
