<?php

namespace App\Livewire\PrintInvoice;

use Livewire\Component;

class Purchase extends Component
{
    public $invoice;
    public $invoice_id;
    function mount($invoice)  {
        $this->invoice_id = $invoice;
    }
    public function render()
    {
        session()->flash("page_name", value: "طباعة فاتورة ");
        $this->invoice = \App\Models\PurchaseInvoice::findOrFail($this->invoice_id);
        return view('livewire.print-invoice.purchase');
    }
}
