<?php

namespace App\Livewire\Suppliers;

use Livewire\Component;

class AddSupplier extends Component
{
    public $supplierName;
    public $supplierAddress;
    public $supplierPhone;

    public function render()
    {
        session()->flash("page_name", value: "الموردين");
        return view('livewire.suppliers.add-supplier');
    }

    public function saveData()
    {
        $this->validate([
            'supplierName' => 'required|string',
            'supplierAddress' => 'required|string',
            'supplierPhone' => 'required|numeric',
        ], [
            'supplierName.required' => 'اسم المورد مطلوب',
            'supplierName.string' => 'اسم المورد يجب أن يكون نص',
            'supplierAddress.required' => 'عنوان المورد مطلوب',
            'supplierAddress.string' => 'عنوان المورد يجب أن يكون نص',
            'supplierPhone.required' => 'رقم الهاتف مطلوب',
            'supplierPhone.numeric' => 'رقم الهاتف يجب أن يكون رقم',
        ]);

        \App\Models\Supplier::create([
            'name' => $this->supplierName,
            'phone' => $this->supplierPhone,
            'address' => $this->supplierAddress,
        ]);

        session()->flash('message', 'تم حفظ البيانات بنجاح!');
        $this->reset();
    }

    public function clearForm()
    {
        $this->reset();
    }
}
