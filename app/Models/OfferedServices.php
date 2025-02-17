<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferedServices extends Model
{
    use HasFactory;
    protected $table = 'servicesoffered';
    protected $guarded = [];


    public function OfferedServices() {
        return $this->belongsToMany(Service::class, Pivot_ServicesOffered::class );
    }
    
}
