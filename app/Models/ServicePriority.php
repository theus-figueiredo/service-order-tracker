<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePriority extends Model
{
    use HasFactory;

    protected $fillable = ['priority'];

    
    public function serviceOrders()
    {
        return $this->belongsToMany(ServiceOrder::class);
    }
}
