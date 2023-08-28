<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_id', 'service_order_id'];


    public function user() {
        return $this->hasOne(User::class);
    }


    public function serviceOrder() {
        return $this->hasOne(ServiceOrder::class);
    }
}

