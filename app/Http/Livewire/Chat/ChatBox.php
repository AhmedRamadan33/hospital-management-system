<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatBox extends Component
{
    // protected $listeners = ['chatPatientOpend','chatDoctorOpend','pushMessage'];
    public $chatSelected;
    public $receiver;
    public $messages;
    public $authUser;
    public $event_name;
    public $chat_page;

    public function mount()
    {
        $this->authUser = auth()->user();
    }

    public function chatPatientOpend(Conversation $conversation, Patient $receiver)
    {
        $this->chatSelected = $conversation;
        $this->receiver = $receiver;
        $messages = Message::where('conversation_id', $conversation->id)->get();
        $this->messages = $messages;
    }

    public function chatDoctorOpend(Conversation $conversation, Doctor $receiver)
    {
        $this->chatSelected = $conversation;
        $this->receiver = $receiver;
        $messages = Message::where('conversation_id', $conversation->id)->get();
        $this->messages = $messages;
    }


    public function getListeners()
    {
        if (Auth::guard('doctor')->check()) {
            return [
                "echo-private:patientChat.{$this->authUser->id},PatientMessage" => 'broadcastMassage',
                'chatPatientOpend',
                'chatDoctorOpend',
                'pushMessage',
            ];
        } else {
            return [
                "echo-private:doctorChat.{$this->authUser->id},DoctorMessage" => 'broadcastMassage',
                'chatPatientOpend',
                'chatDoctorOpend',
                'pushMessage',
            ];
        }
    }


    public function broadcastMassage($event)
    {
        $broadcastMessage = Message::find($event['message']);
        if ($this->chatSelected) {
            $broadcastMessage->read = 1;
            $broadcastMessage->save();
            $this->pushMessage($broadcastMessage->id);
        }
        $this->emitTo('chat.chat-list', 'refresh');
    }



    public function pushMessage($messageId)
    {
        $newMessage = Message::find($messageId);
        $this->messages->push($newMessage);
    }


    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
