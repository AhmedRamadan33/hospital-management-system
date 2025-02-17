<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $table =  'lab';
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function employee()
    {
        return $this->belongsTo(LabEmployees::class, 'employee_id');
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
