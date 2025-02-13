<?php

namespace App\Livewire\PrintInvoice;

use App\Models\Transfer;
use Livewire\Component;

class Transfers extends Component
{
    public $transfer;
    public $transfer_id;

    function mount($transfer) {
        $this->transfer_id = $transfer;
    }
    public function render()
    {
        session()->flash("page_name", "طباعة تحويلات ");
        $this->transfer = Transfer::findOrFail($this->transfer_id);
        return view('livewire.print-invoice.transfers');
    }
}
