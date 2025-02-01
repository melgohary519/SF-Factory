<?php

namespace App\Livewire\Sales;

use App\Models\Item;
use App\Models\SalesInvoice;
use App\Models\Trader;
use App\Models\Transfer;
use Exception;
use Livewire\Component;

class AddSalesInvoice extends Component
{
    public $weight;
    public $goodsType;
    public $saleDate;
    public $partnerName;
    public $trader;
    public $traderName;
    public $paymentType;
    public $salePrice;
    public $dollarRate;
    public $dollarValue;
    public $shipping_dollar_value;
    public $shipping_dollar_rate;
    public $shipping_fee;
    public $traderAddress;
    public $traderPhone;
    public $car_type;
    public $car_owner_name;
    public $tonPrice;

    public $traders;
    public $items;
    public function render()
    {
        session()->flash("page_name", "فاتورة بيع");
        $this->traders = Trader::all();
        $this->items = Item::all();
        return view('livewire.sales.add-sales-invoice');
    }

    public function saveData()
    {
        $this->validate([
            'weight' => 'required|numeric',
            'goodsType' => 'required|string',
            'saleDate' => 'required|date',
            'partnerName' => 'required|string',
            'traderName' => 'required|string',
            'paymentType' => 'required|string',
            'salePrice' => 'required|numeric',
            'dollarRate' => 'required|numeric',
            'dollarValue' => 'required|numeric',
            'shipping_dollar_value' => 'required|numeric',
            'shipping_dollar_rate' => 'required|numeric',
            'shipping_fee' => 'required|numeric',
            'traderAddress' => 'required|string',
            'traderPhone' => 'required|string',
            'car_type' => 'required|string',
            'car_owner_name' => 'required|string',
            'tonPrice' => 'required|numeric',
        ], [
            'weight.required' => 'الوزن مطلوب',
            'goodsType.required' => 'نوع البضاعة مطلوب',
            'saleDate.required' => 'تاريخ البيع مطلوب',
            'saleDate.date' => 'تاريخ البيع غير صالح',
            'partnerName.required' => 'اسم الشريك مطلوب',
            'partnerName.string' => 'اسم الشريك يجب أن يكون نص',
            'traderName.required' => 'اسم التاجر مطلوب',
            'traderName.string' => 'اسم التاجر يجب أن يكون نص',
            'paymentType.required' => 'نوع الدفع مطلوب',
            'salePrice.required' => 'سعر البيع مطلوب',
            'salePrice.numeric' => 'سعر البيع يجب أن يكون رقم',
            'dollarRate.required' => 'سعر الدولار مطلوب',
            'dollarRate.numeric' => 'سعر الدولار يجب أن يكون رقم',
            'dollarValue.required' => 'قيمة الدولار مطلوبة',
            'dollarValue.numeric' => 'قيمة الدولار يجب أن تكون رقم',
            'shipping_dollar_value.required' => 'قيمة دولار الشحن مطلوبة',
            'shipping_dollar_rate.required' => 'سعر دولار الشحن مطلوب',
            'shipping_fee.required' => 'تكلفة الشحن مطلوبة',
            'traderAddress.required' => 'عنوان التاجر مطلوب',
            'traderPhone.required' => 'رقم هاتف التاجر مطلوب',
            'car_type.required' => 'نوع السيارة مطلوب',
            'car_owner_name.required' => 'اسم صاحب السيارة مطلوب',
            'tonPrice.required' => 'سعر الطن مطلوب',
        ]);


        try {
            $goodsType = Item::findOrFail($this->goodsType);
        SalesInvoice::create([
            'weight' => $this->weight,
            'goods_type' =>  $goodsType->goods_type,
            'sale_date' => $this->saleDate,
            'partner_name' => $this->partnerName,
            'trader_id' => $this->trader,
            'trader_name' => $this->traderName,
            'payment_type' => $this->paymentType,
            'sale_price' => $this->salePrice,
            'dollar_rate' => $this->dollarRate,
            'dollar_value' => $this->dollarValue,
            'shipping_dollar_value' => $this->shipping_dollar_value,
            'shipping_dollar_rate' => $this->shipping_dollar_rate,
            'shipping_fee' => $this->shipping_fee,
            'trader_address' => $this->traderAddress,
            'trader_phone' => $this->traderPhone,
            'car_type' => $this->car_type,
            'car_owner_name' => $this->car_owner_name,
            'ton_price' => $this->tonPrice,
        ]);
        if ($this->paymentType == "cash") {
            Transfer::create([
                'reason' => "دفعة عن بضاعة",
                'type' => "نقدي مباشر",
                'person_type' => "trader",
                'transfer_date' => $this->saleDate,
                'amount' => $this->salePrice,
                'dollar_rate' => $this->dollarRate,
                'dollar_value' => $this->dollarValue,
                'person_id' => $this->trader,
                'person_name' => $this->traderName,
                'person_address' => $this->traderAddress,
                'person_phone' => $this->traderPhone,
                'recipient_name' => "",
                'recipient_phone' => "",
            ]);
        }

        session()->flash('message', 'تم حفظ البيانات بنجاح!');
        $this->reset();
    } catch (Exception $e) {
        \Log::error('Error creating sales invoice: ' . $e->getMessage());
    }
    }

    public function clearForm()
    {
        $this->reset();
    }

    public function updated($name, $value)
    {
        if ($name == 'tonPrice' || $name == 'weight' || $name == 'dollarRate' || $name == 'salePrice' || $name == 'shipping_fee' || $name == "shipping_dollar_rate") {
            $this->updateDollarValue();
        }
        if($name == "trader"){
            $data = Trader::find($value);
            if ($data) {
                $this->traderName = $data->name;
                $this->traderPhone = $data->phone;
                $this->traderAddress = $data->address;
            }else{
                $this->traderName = "";
                $this->traderPhone = "";
                $this->traderAddress = "";
            }
        }
    }

    public function updateDollarValue()
    {
        if ($this->weight && $this->tonPrice) {
            $this->salePrice = round($this->weight / 1000 * $this->tonPrice, 2);
        }

        if ($this->salePrice && $this->dollarRate) {
            $this->dollarValue = round($this->salePrice / $this->dollarRate, 2);
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
