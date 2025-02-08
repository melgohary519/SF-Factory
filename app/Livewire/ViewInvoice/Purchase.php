<?php

namespace App\Livewire\ViewInvoice;

use App\Models\PurchaseInvoice;
use Livewire\Component;

class Purchase extends Component
{
    public $invoice;
    function mount($invoice) {
        $this->invoice = PurchaseInvoice::findOrFail($invoice);
    }
    public function render()
    {
        return view('livewire.view-invoice.purchase');
    }
}
