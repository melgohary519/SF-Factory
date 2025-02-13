<?php

namespace App\Livewire\PrintInvoice;

use Livewire\Component;
use App\Models\Expense;

class Expenses extends Component
{
    public $invoice_id;
    public $invoice;

    function mount($invoice) {
        $this->invoice_id = $invoice;
    }

    public function render()
    {
        session()->flash("page_name", "طباعة مصروفات ");
        $this->invoice = Expense::findOrFail($this->invoice_id);
        return view('livewire.print-invoice.expenses');
    }
}