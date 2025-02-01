<?php

namespace App\Livewire\Items;

use App\Models\Supplier;
use Barryvdh\Debugbar\Facades\Debugbar;
use Livewire\Component;

class AddItem extends Component
{
    public $suppliers;
    public $weight;
    public $goodsType;
    public $inventoryName;
    public $purchaseDate;
    public $supplier;
    public $partnerName;
    public $supplierName;
    public $paymentType;
    public $purchasePrice;
    public $dollarRate;
    public $dollarValue;
    public $tonPrice;

    public function render()
    {

        session()->flash("page_name", value: "المواد");
        $this->suppliers = Supplier::all();
        return view('livewire.items.add-item');
    }

    public function saveData()
    {
        $this->validate([
            'weight' => 'required|numeric',
            'goodsType' => 'required|string',
            'inventoryName' => 'required|string',
            'purchaseDate' => 'required|date',
            'partnerName' => 'required|string',
            'supplierName' => 'required|string',
            'paymentType' => 'required|string',
            'purchasePrice' => 'required|numeric',
            'dollarRate' => 'required|numeric',
            'dollarValue' => 'required|numeric',
            'tonPrice' => 'required|numeric',
        ], [
                'weight.required' => 'الوزن مطلوب',
                'weight.numeric' => 'الوزن يجب أن يكون رقم',
                'goodsType.required' => 'نوع البضاعة مطلوب',
                'inventoryName.required' => 'اسم المخزن مطلوب',
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
                'tonPrice.required' => 'سعر الطن مطلوب',
            ]);

            \App\Models\Item::create([
                'weight' => $this->weight,
                'goods_type' => $this->goodsType,
                "inventory_name" => $this->inventoryName,
                'purchase_date' => $this->purchaseDate,
                'partner_name' => $this->partnerName,
                'supplier_name' => $this->supplierName,
                'payment_type' => $this->paymentType,
                'purchase_price' => $this->purchasePrice,
                'dollar_rate' => $this->dollarRate,
                'dollar_value' => $this->dollarValue,
                'ton_price' => $this->tonPrice,
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
        if ($name == 'tonPrice' || $name == 'weight' ||  $name == 'dollarRate' || $name == 'purchasePrice') {
            $this->updateDollarValue();
        }
        if($name == "supplier"){
            $data = Supplier::find($value);
            if ($data) {
                $this->supplierName = $data->name;
            }else{
                $this->supplierName = "";
            }
        }
    }

    

    public function updateDollarValue()
    {
        if ($this->weight && $this->tonPrice) {
            $this->purchasePrice = round($this->weight / 1000 * $this->tonPrice, 2);
        }
        if ($this->purchasePrice && $this->dollarRate) {
            $this->dollarValue = round($this->purchasePrice / $this->dollarRate,2);
        } else {
            $this->dollarValue = 0;
        }
    }

}
