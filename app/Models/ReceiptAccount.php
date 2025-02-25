<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceiptAccount extends Model
{
    use HasFactory;
    protected $table = 'receipt_accounts';
    protected $guarded = [];

    public function patient()
    {
        return $this->belongsTo(Patient::class ,'patient_id');
    }
}
