<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices';
    protected $guarded = [];


    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }
    public function group()
    {
        return $this->belongsTo(OfferedServices::class, 'group_id');
    }


}
