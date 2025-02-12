<?php

namespace App\Livewire\Purchases;

use App\Models\Item;
use App\Models\PurchaseInvoice;
use App\Models\Supplier;
use App\Models\Transfer;
use Livewire\Component;

class AddPurchaseInvoice extends Component
{
    public $weight;
    public $goodsType;
    public $purchaseDate;
    public $partnerName;
    public $inventoryName;
    public $supplier;
    public $supplierName;
    public $paymentType;
    public $purchasePrice;
    public $dollarRate;
    public $dollarValue;
    public $supplierAddress;
    public $supplierPhone;
    public $tonPrice;



    public $suppliers;
    public $items;
    public function render()
    {
        session()->flash("page_name", "فاتورة شراء");
        $this->suppliers = Supplier::all();
        $this->items = Item::all();
        return view('livewire.purchases.add-purchase-invoice');
    }

    public function saveData()
    {
        $this->validate([
            'weight' => 'required|numeric',
            'goodsType' => 'required|string',
            'purchaseDate' => 'required|date',
            'partnerName' => 'required|string',
            'inventoryName' => 'required|string',
            'supplierName' => 'required|string',
            'paymentType' => 'required|string',
            'purchasePrice' => 'required|numeric',
            'dollarRate' => 'required|numeric',
            'dollarValue' => 'required|numeric',
            'supplierAddress' => 'required|string',
            'supplierPhone' => 'required|string',
            'tonPrice' => 'required|numeric',

        ], [
            'weight.required' => 'الوزن مطلوب',
            'goodsType.required' => 'نوع البضاعة مطلوب',
            'purchaseDate.required' => 'تاريخ الشراء مطلوب',
            'partnerName.required' => 'اسم الشريك مطلوب',
            'inventoryName.required' => 'اسم المخزن مطلوب',
            'inventoryName.string' => 'اسم المخزن يجب أن يكون نص',
            'supplierName.required' => 'اسم المورد مطلوب',
            'paymentType.required' => 'نوع الدفع مطلوب',
            'purchasePrice.required' => 'سعر الشراء مطلوب',
            'dollarRate.required' => 'سعر الدولار مطلوب',
            'dollarValue.required' => 'قيمة الدولار مطلوبة',
            'supplierAddress.required' => 'عنوان المورد مطلوب',
            'supplierPhone.required' => 'رقم هاتف المورد مطلوب',
            'tonPrice.required' => 'سعر الطن مطلوب',
        ]);

        $goodsType = Item::findOrFail($this->goodsType);
        PurchaseInvoice::create([
            'weight' => $this->weight,
            'goods_type' => $goodsType->goods_type,
            'purchase_date' => $this->purchaseDate,
            'partner_name' => $this->partnerName,
            'inventory_name' => $this->inventoryName,
            'supplier_id' => $this->supplier,
            'supplier_name' => $this->supplierName,
            'payment_type' => $this->paymentType,
            'purchase_price' => $this->purchasePrice,
            'dollar_rate' => $this->dollarRate,
            'dollar_value' => $this->dollarValue,
            'supplier_address' => $this->supplierAddress,
            'supplier_phone' => $this->supplierPhone,
            'ton_price' => $this->tonPrice,
        ]);

        if ($this->paymentType == "cash") {
            Transfer::create([
                'reason' => "دفعة عن بضاعة",
                'type' => "نقدي مباشر",
                'person_type' => "supplier",
                'transfer_date' => $this->purchaseDate,
                'amount' => $this->purchasePrice,
                'dollar_rate' => $this->dollarRate,
                'dollar_value' => $this->dollarValue,
                'person_id' => $this->supplier,
                'person_name' => $this->supplierName,
                'person_address' => $this->supplierAddress,
                'person_phone' => $this->supplierPhone,
                'recipient_name' => "",
                'recipient_phone' => "",
            ]);
        }

        session()->flash('message', 'تم حفظ البيانات بنجاح!');
        $this->reset();
    }

    public function clearForm()
    {
        $this->reset();
    }

    public function updated($name, $value)
    {
        \Log::info($name);
        if ($name == 'tonPrice' || $name == 'weight' || $name == 'dollarRate' || $name == 'purchasePrice' ) {
            $this->updateDollarValue();
        }
        if($name == "supplier"){
            $data = Supplier::find($value);
            if ($data) {
                $this->supplierName = $data->name;
                $this->supplierPhone = $data->phone;
                $this->supplierAddress = $data->address;
            }else{
                $this->supplierName = "";
                $this->supplierPhone = "";
                $this->supplierAddress = "";
            }
        }
}

    public function updateDollarValue()
    {
        if ($this->weight && $this->tonPrice) {
            $this->purchasePrice = round($this->weight / 1000 * $this->tonPrice, 2);
        }

        if ($this->purchasePrice && $this->dollarRate) {
            $this->dollarValue = round($this->purchasePrice / $this->dollarRate, 2);
        } else {
            $this->dollarValue = 0;
        }
    }


}
