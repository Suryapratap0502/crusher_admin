<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthModel extends Model
{
    use HasFactory;

    protected $table = 'admin';

    public function role_data()
    {
        return $this->belongsTo(RoleModel::class,'role','id');
    }
}
