<?php

namespace App\Livewire\PrintInvoice;

use Livewire\Component;

class Purchase extends Component
{
    public $invoice;
    public $invoice_id;
    public $invoiceLabels;


    function mount($invoice, $lang)
    {
        $this->invoice_id = $invoice;
        if ($lang = "ar") {
            $invoiceLabels = [
                "invoice_title" => "فاتورة شراء",
                "number" => "الرقم",
                "date" => "التاريخ",
                "mr" => " السيد :",
                "product_name" => "اسم المادة",
                "ton_price" => "سعر الطن بالدولار",
                "weight" => "الوزن",
                "total" => "اجمالي",
                "total2" => "المجموع :",
                "shipp" => "أجور الشحن : ",
                "total_amount" => "الحساب : ",
                "address" => "العراق - أربيل - برج العدالة - طابق 13 - مكتب 28",
                "phone" => "+964 750 178 7725 - +964 782 387 97696",
            ];
        }

        $this->invoiceLabels = $invoiceLabels;

    }
    public function render()
    {
        session()->flash("page_name", value: "طباعة فاتورة ");
        $this->invoice = \App\Models\PurchaseInvoice::findOrFail($this->invoice_id);
        return view('livewire.print-invoice.purchase');
    }
}
