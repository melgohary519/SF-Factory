<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;

class Nav extends Component
{
    public $active;
    public function render()
    {
        return view('livewire.suppliers.nav');
    }
}
