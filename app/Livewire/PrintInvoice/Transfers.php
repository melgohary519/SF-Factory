<?php

namespace App\Livewire\PrintInvoice;

use App\Models\Transfer;
use Livewire\Component;

class Transfers extends Component
{
    public $invoice;
    public $invoice_id;

    function mount($invoice) {
        $this->invoice_id = $invoice;
    }
    public function render()
    {
        session()->flash("page_name", "طباعة تحويلات ");
        $this->invoice = Transfer::findOrFail($this->invoice_id);
        return view('livewire.print-invoice.transfers');
    }
}
