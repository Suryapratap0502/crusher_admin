<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RoleModel extends Model
{
    use HasFactory;
    protected $table = 'role';

    public static function action_data($table,$id,$data) {
        return DB::table($table)->where('id',$id)->update($data);
    }
}
