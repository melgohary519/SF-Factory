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
    public $inventoryName;
    public $trader;
    public $traderName;
    public $paymentType;
    public $salePrice;
    public $dollarRate;
    public $dollarValue;
    public $traderAddress;
    public $traderPhone;
    public $tonPrice;

    public $traders;
    public $items;

    public $inventoryList;
    public $partnerList;
    public function render()
    {
        session()->flash("page_name", "فاتورة بيع");
        $this->traders = Trader::all();
        $this->items = Item::all();
        $this->inventoryList = Item::select('inventory_name')->groupBy('inventory_name')->get();
        $this->partnerList = Item::select('partner_name')->groupBy('partner_name')->get();
        return view('livewire.sales.add-sales-invoice');
    }

    public function saveData()
    {
        $this->validate([
            'weight' => 'required|numeric',
            'goodsType' => 'required|string',
            'saleDate' => 'required|date',
            'partnerName' => 'required|string',
            'inventoryName' => 'required|string',
            'traderName' => 'required|string',
            'paymentType' => 'required|string',
            'salePrice' => 'required|numeric',
            'dollarRate' => 'required|numeric',
            'dollarValue' => 'required|numeric',
            'traderAddress' => 'required|string',
            'traderPhone' => 'required|string',
            'tonPrice' => 'required|numeric',
        ], [
            'weight.required' => 'الوزن مطلوب',
            'goodsType.required' => 'نوع البضاعة مطلوب',
            'saleDate.required' => 'تاريخ البيع مطلوب',
            'saleDate.date' => 'تاريخ البيع غير صالح',
            'partnerName.required' => 'اسم الشريك مطلوب',
            'partnerName.string' => 'اسم الشريك يجب أن يكون نص',
            'inventoryName.required' => 'اسم المخزن مطلوب',
            'inventoryName.string' => 'اسم المخزن يجب أن يكون نص',
            'traderName.required' => 'اسم التاجر مطلوب',
            'traderName.string' => 'اسم التاجر يجب أن يكون نص',
            'paymentType.required' => 'نوع الدفع مطلوب',
            'salePrice.required' => 'سعر البيع مطلوب',
            'salePrice.numeric' => 'سعر البيع يجب أن يكون رقم',
            'dollarRate.required' => 'سعر الدولار مطلوب',
            'dollarRate.numeric' => 'سعر الدولار يجب أن يكون رقم',
            'dollarValue.required' => 'قيمة الدولار مطلوبة',
            'dollarValue.numeric' => 'قيمة الدولار يجب أن تكون رقم',
            'traderAddress.required' => 'عنوان التاجر مطلوب',
            'traderPhone.required' => 'رقم هاتف التاجر مطلوب',
            'tonPrice.required' => 'سعر الطن مطلوب',
        ]);


        try {
            $goodsType = Item::findOrFail($this->goodsType);
        SalesInvoice::create([
            'weight' => $this->weight,
            'goods_type' =>  $goodsType->goods_type,
            'sale_date' => $this->saleDate,
            'partner_name' => $this->partnerName,
            'inventory_name' => $this->inventoryName,
            'trader_id' => $this->trader,
            'trader_name' => $this->traderName,
            'payment_type' => $this->paymentType,
            'sale_price' => $this->salePrice,
            'dollar_rate' => $this->dollarRate,
            'dollar_value' => $this->dollarValue,
            'trader_address' => $this->traderAddress,
            'trader_phone' => $this->traderPhone,
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
        if ($name == 'tonPrice' || $name == 'weight' || $name == 'dollarRate' || $name == 'salePrice' ) {
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

        
    }
}
