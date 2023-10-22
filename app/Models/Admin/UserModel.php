<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_user';
    protected $primaryKey = 'id_user';
    protected $fillable = ['id_role', 'nik', 'nama', 'username', 'password'];
}
