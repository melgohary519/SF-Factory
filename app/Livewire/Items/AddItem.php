<?php

namespace App\Livewire\Items;

use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class AddItem extends Component
{
    public $weight;
    public $goodsType;
    public $purchaseDate;
    public $partnerName;
    public $supplierName;
    public $paymentType;
    public $purchasePrice;
    public $dollarRate;
    public $dollarValue;

    public function render()
    {

        session()->flash("page_name", value: "المواد");
        return view('livewire.items.add-item');
    }

    public function saveData()
    {
        $this->validate([
            'weight' => 'required|numeric',
            'goodsType' => 'required|string',
            'purchaseDate' => 'required|date',
            'partnerName' => 'required|string',
            'supplierName' => 'required|string',
            'paymentType' => 'required|string',
            'purchasePrice' => 'required|numeric',
            'dollarRate' => 'required|numeric',
            'dollarValue' => 'required|numeric',
        ], [
                'weight.required' => 'الوزن مطلوب',
                'weight.numeric' => 'الوزن يجب أن يكون رقم',
                'goodsType.required' => 'نوع البضاعة مطلوب',
                'goodsType.string' => 'نوع البضاعة يجب أن يكون نص',
                'purchaseDate.required' => 'تاريخ الشراء مطلوب',
                'purchaseDate.date' => 'تاريخ الشراء غير صالح',
                'partnerName.required' => 'اسم الشريك مطلوب',
                'partnerName.string' => 'اسم الشريك يجب أن يكون نص',
                'supplierName.required' => 'اسم المورد مطلوب',
                'supplierName.string' => 'اسم المورد يجب أن يكون نص',
                'paymentType.required' => 'نوع الدفع مطلوب',
                'purchasePrice.required' => 'سعر الشراء مطلوب',
                'purchasePrice.numeric' => 'سعر الشراء يجب أن يكون رقم',
                'dollarRate.required' => 'سعر الدولار مطلوب',
                'dollarRate.numeric' => 'سعر الدولار يجب أن يكون رقم',
                'dollarValue.required' => 'قيمة الدولار مطلوبة',
                'dollarValue.numeric' => 'قيمة الدولار يجب أن تكون رقم',
            ]);

            \App\Models\Item::create([
                'weight' => $this->weight,
                'goods_type' => $this->goodsType,
                'purchase_date' => $this->purchaseDate,
                'partner_name' => $this->partnerName,
                'supplier_name' => $this->supplierName,
                'payment_type' => $this->paymentType,
                'purchase_price' => $this->purchasePrice,
                'dollar_rate' => $this->dollarRate,
                'dollar_value' => $this->dollarValue,
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
        if ($name == 'dollarRate' || $name == 'purchasePrice') {
            $this->updateDollarValue();
        }
    }

    public function updateDollarValue()
    {
        if ($this->purchasePrice && $this->dollarRate) {
            $this->dollarValue = round($this->purchasePrice / $this->dollarRate,2);
        } else {
            $this->dollarValue = 0;
        }
    }

}
