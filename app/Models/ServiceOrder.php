<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifier',
        'description',
        'execution_value',
        'charging_value',
        'service_status_id',
        'service_category_id',
        'service_prioriy_id',
        'created_by',
        'last_updated_by'
    ];


    public function createdBy() {
        return $this->hasOne(User::class);
    }

    
    public function lastUpdatedBy() {
        return $this->hasOne(User::class);
    }


    public function serviceStatus() {
        return $this->hasOne(ServiceCategory::class);
    }


    public function serviceCategory() {
        return $this->hasOne(ServiceStatus::class);
    }


    public function servicePrioriry() {
        return $this->hasOne(ServicePriority::class);
    }


    public function comments() {
        return $this->belongsToMany(Comment::class);
    }
}
