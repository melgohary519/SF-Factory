<?php

namespace App\Livewire\Traders;

use Livewire\Component;

class AddTrader extends Component
{
    public $traderName;
    public $traderAddress;
    public $traderPhone;

    public function render()
    {
        session()->flash("page_name", "التجار");
        return view('livewire.traders.add-trader');
    }

    public function saveData()
    {
        $this->validate([
            'traderName' => 'required|string',
            'traderAddress' => 'required|string',
            'traderPhone' => 'required|numeric',
        ], [
            'traderName.required' => 'اسم التاجر مطلوب',
            'traderName.string' => 'اسم التاجر يجب أن يكون نص',
            'traderAddress.required' => 'عنوان التاجر مطلوب',
            'traderAddress.string' => 'عنوان التاجر يجب أن يكون نص',
            'traderPhone.required' => 'رقم الهاتف مطلوب',
            'traderPhone.numeric' => 'رقم الهاتف يجب أن يكون رقم',
        ]);

        \App\Models\Trader::create([
            'name' => $this->traderName,
            'phone' => $this->traderPhone,
            'address' => $this->traderAddress,
        ]);

        session()->flash('message', 'تم حفظ البيانات بنجاح!');
        $this->reset();
    }

    public function clearForm()
    {
        $this->reset();
    }
}
