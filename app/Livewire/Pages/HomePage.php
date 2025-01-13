<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class HomePage extends Component
{
    public function render()
    {
        session()->flash("page_name","الصفحة الرئيسية");
        return view('livewire.pages.home-page');
    }
}
