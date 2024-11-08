<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdpartyModel extends Model
{
    use HasFactory;
    protected $table = 'thirdparty_setup';
}
