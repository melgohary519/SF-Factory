<?php

namespace App\Livewire\Transfers;

use App\Models\Supplier;
use App\Models\Trader;
use App\Models\Transfer;
use Livewire\Component;

class AddTransfer extends Component
{
    public $reason;
    public $type;
    public $personType;
    public $transferDate;
    public $amount;
    public $dollarRate;
    public $dollarValue;
    public $personId;
    public $personName;
    public $personAddress;
    public $personPhone;
    public $recipientName;
    public $recipientPhone;

    public function render()
    {
        session()->flash("page_name", "إضافة حوالة");
        return view('livewire.transfers.add-transfer');
    }
    

    public function saveData()
    {
        $this->validate([
            'reason' => 'required|string',
            'type' => 'required|string',
            'personType' => 'required|string',
            'transferDate' => 'required|date',
            'amount' => 'required|numeric',
            'dollarRate' => 'required|numeric',
            'dollarValue' => 'required|numeric',
            'personId' => 'required|numeric',
            'personName' => 'required|string',
            'personAddress' => 'required|string',
            'personPhone' => 'required|string',
            'recipientName' => 'required|string',
            'recipientPhone' => 'required|string',
        ], [
            'reason.required' => 'سبب الحوالة مطلوب',
            'type.required' => 'نوع الحوالة مطلوب',
            'personType.required' => 'نوع الشخص مطلوب',
            'transferDate.required' => 'تاريخ التحويل مطلوب',
            'amount.required' => 'المبلغ مطلوب',
            'dollarRate.required' => 'سعر الدولار مطلوب',
            'dollarValue.required' => 'قيمة الدولار مطلوبة',
            'personId.required' => 'رقم الشخص مطلوب',
            'personName.required' => 'اسم الشخص مطلوب',
            'personAddress.required' => 'عنوان الشخص مطلوب',
            'personPhone.required' => 'رقم هاتف الشخص مطلوب',
            'recipientName.required' => 'اسم المستلم مطلوب',
            'recipientPhone.required' => 'رقم هاتف المستلم مطلوب',
        ]);

        Transfer::create([
            'reason' => $this->reason,
            'type' => $this->type,
            'person_type' => $this->personType,
            'transfer_date' => $this->transferDate,
            'amount' => $this->amount,
            'dollar_rate' => $this->dollarRate,
            'dollar_value' => $this->dollarValue,
            'person_id' => $this->personId,
            'person_name' => $this->personName,
            'person_address' => $this->personAddress,
            'person_phone' => $this->personPhone,
            'recipient_name' => $this->recipientName,
            'recipient_phone' => $this->recipientPhone,
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
        if ($name == 'dollarRate' || $name == 'amount') {
            $this->updateDollarValue();
        }
        if ($name == "personType") {
            $this->personId = "";
            $this->emptyPersonData();
        }

        if ($name == "personId") {
            if ($value == "") {
                $this->emptyPersonData();
            }else{

                $data = "";
                $this->emptyPersonData();
    
                if ($this->personType == "supplier") {
                    $data = Supplier::findOrFail($this->personId);
                }elseif ($this->personType == "trader") {
                    $data = Trader::findOrFail($this->personId);
                }
                $this->personName = $data->name;
                $this->personAddress = $data->address;
                $this->personPhone = $data->phone;
                \Log::info($data);
            }
        }
    }

    function emptyPersonData() {
        $this->personName = "";
        $this->personAddress = "";
        $this->personPhone = "";
    }

    public function updateDollarValue()
    {
        if ($this->amount && $this->dollarRate) {
            $this->dollarValue = round($this->amount / $this->dollarRate, 2);
        } else {
            $this->dollarValue = 0;
        }
    }
}