<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Livewire\Component;

class ChatList extends Component
{
    protected $listeners = ['refresh'=>'$refresh'];
    public $conversations;
    public $authUser;

    public function mount()
    {
        $this->authUser = auth()->user()->email;
    }

    public function render()
    {
        $this->conversations = Conversation::where('sender_email', $this->authUser)->orWhere('receiver_email', $this->authUser)
        ->OrderBy('created_at','DESC')->get();
        return view('livewire.chat.chat-list');
    }

    public function getReceiver($conversation)
    {
        if ($conversation->sender_email === $this->authUser) {
            if (auth()->guard('doctor')->check()) {
                return Patient::where('email', $conversation->receiver_email)->firstOrFail();
            } else {
                return Doctor::where('email', $conversation->receiver_email)->firstOrFail();
            }

        } else {
            if (auth()->guard('doctor')->check()) {
                return Patient::where('email', $conversation->sender_email)->firstOrFail();
            } else {
                return Doctor::where('email', $conversation->sender_email)->firstOrFail();
            }
        }
    }

    public function openChat($conversation , $receiver)
    {

        if (auth()->guard('doctor')->check()) {
            $receiver = Patient::where('id', $receiver)->firstOrFail();
            $this->emitTo('chat.chat-box','chatPatientOpend', $conversation, $receiver);
            $this->emitTo('chat.send-message', 'chatPatientOpend', $conversation, $receiver);

        } else {
            $receiver = Doctor::where('id', $receiver)->firstOrFail();
            $this->emitTo('chat.chat-box','chatDoctorOpend', $conversation, $receiver);
            $this->emitTo('chat.send-message', 'chatDoctorOpend', $conversation, $receiver);


        }
    }

}
