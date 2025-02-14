<?php

namespace App\Livewire\PrintInvoice;

use Livewire\Component;
use App\Models\Expense;

class Expenses extends Component
{
    public $invoice_id;
    public $invoice;

    public $invoiceLabels;

    function mount($invoice, $lang)
    {
        $this->invoice_id = $invoice;

        if ($lang = "ar") {
            $invoiceLabels = [
                "invoice_title" => "فاتورة صرف",
                "number" => "الرقم",
                "date" => "التاريخ",
                "amount_iqd" => "المبلغ بالعراقي:",
                "amount_usd" => "المبلغ بالدولار",
                "usd_value" => "قيمة الدولار الواحد",
                "expense_reason" => "سبب الصرف",
                "address1" => " العنوان : العراق - أربيل - شارع 100",
                "address2" => "برج العدالة - طابق 13 - مكتب 28",
                "phone1" => "0750 178 7725",
                "phone2" => "0782 387 9769",
            ];
        }

        $this->invoiceLabels = $invoiceLabels;


    }

    public function render()
    {
        session()->flash("page_name", "طباعة مصروفات ");
        $this->invoice = Expense::findOrFail($this->invoice_id);
        return view('livewire.print-invoice.expenses');
    }
}