<?php

namespace App\Livewire\Transfers;

use Livewire\Component;

class Nav extends Component
{
    public $active;
    public function render()
    {
        return view('livewire.transfers.nav');
    }
}
