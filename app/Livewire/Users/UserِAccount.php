<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserِAccount extends Component
{
    public $user_id;
    function mount($user_id)
    {
        $this->user_id = $user_id;
    }
    public function render()
    {
        session()->flash('page_name', 'صفحة بيانات المستخدم');
        $user = User::findOrFail($this->user_id);
        return view('livewire.users.userِ-account',[
            'user' => $user
        ]);
    }
}
