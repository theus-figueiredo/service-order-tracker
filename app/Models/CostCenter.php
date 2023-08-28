<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CostCenter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'manager', 'contact', 'manager_contact'];

    public function serviceOrders() {
        return $this->belongsToMany(ServiceOrder::class);
    }


    public function users() {
        return $this->hasMany(User::class, 'user_costcenter');
    }
}
