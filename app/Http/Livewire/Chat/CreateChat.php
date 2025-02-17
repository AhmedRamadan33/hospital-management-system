<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Doctor;
use App\Models\Message;
use App\Models\Patient;
use Livewire\Component;

class CreateChat extends Component
{
    public $users = [];
    public $authUser;

    public function mount()
    {
        $this->authUser = auth()->user()->email;
    }
    
    public function render()
    {
        if (auth()->guard('doctor')->check()) {
            $this->users = Patient::all();
        } else {
            $this->users = Doctor::all();
        }
        return view('livewire.chat.create-chat')->extends('Dashboard.layouts.master');
    }

    public function CreateConversation($receiver_email) {
        $conversation = Conversation::where('sender_email', $this->authUser)
            ->where('receiver_email', $receiver_email)
            ->orWhere('sender_email', $receiver_email)
            ->where('receiver_email', $this->authUser)
            ->first();
        if ($conversation) {
            return redirect()->to('user/chat');
        }
        $conversation = Conversation::create([
            'sender_email' => $this->authUser,
            'receiver_email' => $receiver_email,
        ]);
        Message::create([
            'conversation_id' => $conversation->id,
            'sender_email' => $this->authUser,
            'receiver_email' => $receiver_email,
            'body' => 'Hello',
        ]);
        return redirect()->to('user/chat');
    }
}
