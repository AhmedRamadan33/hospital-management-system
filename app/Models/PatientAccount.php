<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    use HasFactory;
    protected $table = 'patient_accounts';
    protected $guarded = [];

    public function receiptAccount()
    {
        return $this->belongsTo(ReceiptAccount::class, 'receipt_id');
    }

    public function paymentAccount()
    {
        return $this->belongsTo(PaymentAccount::class, 'payment_id');
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
}
