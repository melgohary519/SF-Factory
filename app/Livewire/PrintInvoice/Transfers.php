<?php

namespace App\Livewire\PrintInvoice;

use App\Models\Transfer;
use Livewire\Component;

class Transfers extends Component
{
    public $invoice;
    public $invoice_id;
    public $invoiceLabels;

    function mount($invoice,$lang) {
        $this->invoice_id = $invoice;

        if ($lang = "ar") {
            $invoiceLabels = [
                "invoice_title" => "فاتورة حوالات",
                "number" => "الرقم",
                "date" => "التاريخ",
                "amount_iqd" => "المبلغ بالعراقي:",
                "amount_usd" => "المبلغ بالدولار",
                "usd_value" => "قيمة الدولار الواحد",
                "reason" => "سبب الحوالة:",
                'type' => 'نوع الحوالة',
                'recipient_name' => 'اسم المستلم',
                'recipient_phone' => 'رقم هاتف المستلم',
                'person_name' => 'اسم المستفيد',
                'person_phone' => 'رقم هاتف المستفيد',
                'person_address' => 'عنوان المستفيد',
                "address" => "العراق - أربيل - برج العدالة - طابق 13 - مكتب 28",
                "phone" => "+964 750 178 7725 - +964 782 387 97696",
            ];
        }

        $this->invoiceLabels = $invoiceLabels;

    }
    public function render()
    {
        session()->flash("page_name", "طباعة تحويلات ");
        $this->invoice = Transfer::findOrFail($this->invoice_id);
        return view('livewire.print-invoice.transfers');
    }
}
