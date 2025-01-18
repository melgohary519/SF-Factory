<?php

namespace App\Livewire\Transfers;

use Livewire\Component;

class TransferAccountPage extends Component
{
   
    public function render()
    {
        session()->flash("page_name", "حساب الحوالات ");
        return view('livewire.transfers.transfer-account-page');
    }
}
