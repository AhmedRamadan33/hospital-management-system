<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table =  'reservations';
    protected $guarded = [];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class ,'doctor_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class ,'section_id');
    }
}
