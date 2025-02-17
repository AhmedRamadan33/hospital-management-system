<?php

namespace App\Http\Livewire\Chat;

use App\Events\DoctorMessage;
use App\Events\PatientMessage;
use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Broadcast;
use Livewire\Component;

class SendMessage extends Component
{
    public $message;
    public $authUser;
    public $conversation;
    public $receiver;
    public $sender;
    public $createMessage;
    protected $listeners = ['chatPatientOpend', 'chatDoctorOpend', 'dispatchMessage'];

    public function mount()
    {
        $this->authUser = Auth::user();
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }

    public function chatDoctorOpend(Conversation $conversation, Doctor $receiver)
    {
        $this->conversation = $conversation;
        $this->receiver = $receiver;
    }

    public function chatPatientOpend(Conversation $conversation, Patient $receiver)
    {
        $this->conversation = $conversation;
        $this->receiver = $receiver;
    }


    public function sendMessage()
    {
        $this->validate([
            'message' => 'required'
        ]);

        $this->createMessage = Message::create([
            'conversation_id' => $this->conversation->id,
            'sender_email' => $this->authUser->email,
            'receiver_email' => $this->receiver->email,
            'body' => $this->message
        ]);

        Conversation::where('id', $this->conversation->id)->update([
            'last_time_message' => $this->createMessage->created_at,
        ]);

        $this->message = '';
        $this->emitTo('chat.chat-box', 'pushMessage', $this->createMessage->id);
        $this->emitTo('chat.chat-list', 'refresh');
        $this->emitSelf('dispatchMessage');
    }

    public function dispatchMessage()
    {
        if (Auth::guard('doctor')->check()) {
            broadcast(new DoctorMessage(
                $this->authUser,
                $this->receiver,
                $this->createMessage,
                $this->conversation,
            ));
        }
        else{
            broadcast(new PatientMessage(
                $this->authUser,
                $this->receiver,
                $this->createMessage,
                $this->conversation,
            ));
        }

    }
}
