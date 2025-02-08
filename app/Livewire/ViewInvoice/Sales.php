<?php

namespace App\Livewire\ViewInvoice;

use App\Models\SalesInvoice;
use Livewire\Component;

class Sales extends Component
{
    public $invoice;
    function mount($invoice) {
        $this->invoice = SalesInvoice::findOrFail($invoice);
    }
    public function render()
    {
        session()->flash("page_name", "فواتير البيع");
        return view('livewire.view-invoice.sales');
    }
}
