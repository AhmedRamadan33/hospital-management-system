<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $guarded = [];


    // One To One get section of Doctor
    public function section()
    {
        return $this->belongsTo(Section::class, 'sectionId');
    }


    
}
