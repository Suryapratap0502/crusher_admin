<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AddedContact extends Model
{
    use HasFactory;
    protected $table = 'added_contact';

    public function get_customer_data() {
        return $this->belongsTo(CustomerModel::class,'added_to_id','customer_id');
    }
}
