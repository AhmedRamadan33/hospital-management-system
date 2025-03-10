<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $guarded = [];

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class ,'conversation_id');
    }
}
