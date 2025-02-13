<?php

namespace App\Livewire\Expenses;

use App\Models\Expense;
use Livewire\Component;

class AddExpense extends Component
{
    public $expenseDate;
    public $dollarRate;
    public $dollarValue;
    public $purchasePrice;
    public $details;

    protected $rules = [
        'expenseDate' => 'required|date',
        'dollarRate' => 'required|numeric',
        'dollarValue' => 'required|numeric',
        'purchasePrice' => 'required|numeric',
        'details' => 'required|string|max:500',
    ];

    protected $messages = [
        'expenseDate.required' => 'تاريخ الصرف مطلوب',
        'expenseDate.date' => 'تاريخ الصرف يجب أن يكون تاريخ صالح',
        'dollarRate.required' => 'سعر الدولار مطلوب',
        'dollarRate.numeric' => 'سعر الدولار يجب أن يكون رقم',
        'dollarValue.required' => 'قيمة الدولار مطلوبة',
        'dollarValue.numeric' => 'قيمة الدولار يجب أن تكون رقم',
        'purchasePrice.required' => 'سعر الشراء مطلوب',
        'purchasePrice.numeric' => 'سعر الشراء يجب أن يكون رقم',
        'details.required' => 'تفاصيل الشراء مطلوبة',
        'details.string' => 'تفاصيل الشراء يجب أن تكون نص',
        'details.max' => 'تفاصيل الشراء يجب ألا تتجاوز 500 حرف',
    ];

    public function render()
    {
        session()->flash("page_name", value: "الصرفيات");
        return view('livewire.expenses.add-expense');
    }
    public function saveData()
{
    $this->validate($this->rules, $this->messages);

    $e = Expense::create([
        'expense_date' => $this->expenseDate,
        'dollar_rate' => $this->dollarRate,
        'dollar_value' => $this->dollarValue,
        'purchase_price' => $this->purchasePrice,
        'details' => $this->details,
    ]);

    session()->flash('message', 'تم إضافة الصرفية بنجاح');
    $this->reset();
    redirect(route('print.invoices.expenses',[$e->id]));
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
