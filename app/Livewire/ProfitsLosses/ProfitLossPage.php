<?php

namespace App\Livewire\ProfitsLosses;

use Livewire\Component;

class ProfitLossPage extends Component
{
    public function render()
    {
        session()->flash("page_name", "حساب الحوالات ");
        return view('livewire.profits-losses.profit-loss-page');
    }
}
