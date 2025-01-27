<?php

namespace App\Livewire\Users;

use Livewire\Component;

class NavUser extends Component
{
    public $active;
    public function render()
    {
        return view('livewire.users.nav-user');
    }
}
