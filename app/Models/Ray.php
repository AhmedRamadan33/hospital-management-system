<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ray extends Model
{
    use HasFactory;
    protected $table =  'rays';
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function employee()
    {
        return $this->belongsTo(RayEmployees::class, 'employee_id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    // Get the Ray's image.
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
