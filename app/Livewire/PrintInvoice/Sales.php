<?php

namespace App\Livewire\PrintInvoice;

use App\Models\SalesInvoice;
use Livewire\Component;

class Sales extends Component
{
    public $invoice_id;
    public $invoice;

    function mount($invoice) {
        $this->invoice_id = $invoice;
    }

    public function render()
    {
        session()->flash("page_name", "طباعة مبيعات ");
        $this->invoice = SalesInvoice::findOrFail($this->invoice_id);
        return view('livewire.print-invoice.sales');
    }
}
