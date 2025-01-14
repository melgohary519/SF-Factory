<?php

namespace App\Livewire\Items;

use Livewire\Component;

class Nav extends Component
{
    public $active;
    public function render()
    {
        \Log::info($this->active);
        return view('livewire..items.nav');
    }
}
