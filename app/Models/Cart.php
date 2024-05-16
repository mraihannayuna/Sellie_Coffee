<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function product() {
        return $this->hasOne(Coffee::class,'id','product_id');
    }

}
