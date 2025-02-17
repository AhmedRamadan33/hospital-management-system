<?php

namespace App\Events;

use App\Models\Doctor;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CreateDoctor implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $doctor;
    public $message;
    public $created_at;

    public function __construct($docId)
    {
        $doc = Doctor::find($docId);
        $this->doctor = $doc->name;
        $this->message = "A new doctor has been added to the hospital, his name is ";
        $this->created_at = date('Y-m-d H:i:s');
    }

    public function broadcastOn()
    {
        // return new PrivateChannel('channel-name');
        return ['create-doctor'];

    }
    public function broadcastAs()
    {
        return 'my-event';
    }
}
