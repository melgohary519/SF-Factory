<?php

namespace App\Livewire\ViewInvoice;

use App\Models\Transfer;
use Livewire\Component;

class Transfers extends Component
{
    public $invoice;
    function mount($invoice) {
        $this->invoice = Transfer::findOrFail($invoice);
    }
    public function render()
    {
        return view('livewire.view-invoice.transfers');
    }
}
