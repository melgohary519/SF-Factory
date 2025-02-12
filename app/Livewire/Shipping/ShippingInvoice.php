<?php

namespace App\Livewire\Shipping;

use Livewire\Component;

class ShippingInvoice extends Component
{
    public $type;
    public $invoice_number;
    public $shipping_fee;
    public $shipping_dollar_rate;
    public $shipping_dollar_value;
    public $car_owner_name;
    public $car_type;

    public function render()
    {
        session()->flash("page_name", "فاتورة شحن");
        return view('livewire.shipping.shipping-invoice');
    }


    public function saveData()
    {
        

        $this->validate([
            'type' => 'required|string|in:sales,purchase',
            'invoice_number' => 'required|numeric',
            'shipping_dollar_value' => 'required|numeric',
            'shipping_dollar_rate' => 'required|numeric',
            'shipping_fee' => 'required|numeric',
            'car_type' => 'required|string',
            'car_owner_name' => 'required|string',
        ], [
            'type.required' => 'حقل النوع مطلوب.',
            'type.in' => 'نوع الفاتورة يجب أن يكون "بيع" أو "شراء".',
            'invoice_number.required' => 'رقم الفاتورة مطلوب.',
            'shipping_dollar_value.required' => 'قيمة دولار الشحن مطلوبة',
            'shipping_dollar_rate.required' => 'سعر دولار الشحن مطلوبة',
            'shipping_fee.required' => 'تكلفة الشحن مطلوبة',
            'car_type.required' => 'نوع السيارة مطلوب',
            'car_owner_name.required' => 'اسم صاحب السيارة مطلوب',
        ]);

        $existsInSales = \App\Models\SalesInvoice::where('id', $this->invoice_number)->exists();
        $existsInPurchase = \App\Models\PurchaseInvoice::where('id', $this->invoice_number)->exists();
        if (!$existsInSales && !$existsInPurchase) {
            $this->addError('invoice_number', 'رقم الفاتورة يجب أن يكون موجودًا في فواتير الشراء أو البيع.');
            return;
        }


        \App\Models\ShippingInvoice::create([
            'type' => $this->type,
            'invoice_number' => $this->invoice_number,
            'shipping_fee' => $this->shipping_fee,
            'shipping_dollar_rate' => $this->shipping_dollar_rate,
            'shipping_dollar_value' => $this->shipping_dollar_value,
            'car_owner_name' => $this->car_owner_name,
            'car_type' => $this->car_type,
        ]);

        session()->flash('message', 'تم حفظ البيانات بنجاح!');
        $this->reset();
    }


    public function clearForm()
    {
        $this->reset();
    }

    public function updated($name, $value)
    {
        if ($name == 'shipping_fee' || $name == "shipping_dollar_rate") {
            if ($this->shipping_fee && $this->shipping_dollar_rate) {
                $this->shipping_dollar_value = round($this->shipping_fee / $this->shipping_dollar_rate, 2);
            } else {
                $this->shipping_dollar_value = 0;
            }
        }
    }



}