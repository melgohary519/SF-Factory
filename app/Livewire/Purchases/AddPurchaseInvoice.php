<?php

namespace App\Livewire\Purchases;

use App\Models\PurchaseInvoice;
use App\Models\Supplier;
use Livewire\Component;

class AddPurchaseInvoice extends Component
{
    public $weight;
    public $goodsType;
    public $purchaseDate;
    public $partnerName;
    public $supplier;
    public $supplierName;
    public $paymentType;
    public $purchasePrice;
    public $dollarRate;
    public $dollarValue;
    public $shipping_dollar_value;
    public $shipping_dollar_rate;
    public $shipping_fee;
    public $supplierAddress;
    public $supplierPhone;
    public $car_type;
    public $car_owner_name;



    public $suppliers;
    public function render()
    {
        session()->flash("page_name", "فاتورة شراء");
        $this->suppliers = Supplier::all();
        return view('livewire.purchases.add-purchase-invoice');
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
            'shipping_dollar_value' => 'required|numeric',
            'shipping_dollar_rate' => 'required|numeric',
            'shipping_fee' => 'required|numeric',
            'supplierAddress' => 'required|string',
            'supplierPhone' => 'required|string',
            'car_type' => 'required|string',
            'car_owner_name' => 'required|string',
        ], [
            'weight.required' => 'الوزن مطلوب',
            'goodsType.required' => 'نوع البضاعة مطلوب',
            'purchaseDate.required' => 'تاريخ الشراء مطلوب',
            'partnerName.required' => 'اسم الشريك مطلوب',
            'supplierName.required' => 'اسم المورد مطلوب',
            'paymentType.required' => 'نوع الدفع مطلوب',
            'purchasePrice.required' => 'سعر الشراء مطلوب',
            'dollarRate.required' => 'سعر الدولار مطلوب',
            'dollarValue.required' => 'قيمة الدولار مطلوبة',
            'shipping_dollar_value.required' => 'قيمة دولار الشحن مطلوبة',
            'shipping_dollar_rate.required' => 'سعر دولار الشحن مطلوبة',
            'shipping_fee.required' => 'تكلفة الشحن مطلوبة',
            'supplierAddress.required' => 'عنوان المورد مطلوب',
            'supplierPhone.required' => 'رقم هاتف المورد مطلوب',
            'car_type.required' => 'نوع السيارة مطلوب',
            'car_owner_name.required' => 'اسم صاحب السيارة مطلوب',
        ]);

        PurchaseInvoice::create([
            'weight' => $this->weight,
            'goods_type' => $this->goodsType,
            'purchase_date' => $this->purchaseDate,
            'partner_name' => $this->partnerName,
            'supplier_id' => $this->supplier,
            'supplier_name' => $this->supplierName,
            'payment_type' => $this->paymentType,
            'purchase_price' => $this->purchasePrice,
            'dollar_rate' => $this->dollarRate,
            'dollar_value' => $this->dollarValue,
            'shipping_dollar_value' => $this->shipping_dollar_value,
            'shipping_dollar_rate' => $this->shipping_dollar_rate,
            'shipping_fee' => $this->shipping_fee,
            'supplier_address' => $this->supplierAddress,
            'supplier_phone' => $this->supplierPhone,
            'car_type' => $this->car_type,
            'car_owner_name' => $this->car_owner_name,
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
        \Log::info($name);
        if ($name == 'dollarRate' || $name == 'purchasePrice' || $name == 'shipping_fee' || $name == "shipping_dollar_rate") {
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
        if ($this->purchasePrice && $this->dollarRate) {
            $this->dollarValue = round($this->purchasePrice / $this->dollarRate, 2);
        } else {
            $this->dollarValue = 0;
        }

        if ($this->shipping_fee && $this->shipping_dollar_rate) {
            $this->shipping_dollar_value = round($this->shipping_fee / $this->shipping_dollar_rate, 2);
        } else {
            $this->shipping_dollar_value = 0;
        }
    }


}
