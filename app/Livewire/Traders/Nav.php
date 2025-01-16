<?php

namespace App\Livewire\Traders;

use Livewire\Component;

class Nav extends Component
{
    public $active;
    public function render()
    {
        return view('livewire.traders.nav');
    }
}
