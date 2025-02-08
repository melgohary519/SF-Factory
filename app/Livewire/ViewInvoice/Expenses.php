<?php

namespace App\Livewire\ViewInvoice;

use App\Models\Expense;
use Livewire\Component;

class Expenses extends Component
{
    public $invoice;
    function mount($invoice) {
        $this->invoice = Expense::findOrFail($invoice);
    }
    public function render()
    {
        return view('livewire.view-invoice.expenses');
    }
}
