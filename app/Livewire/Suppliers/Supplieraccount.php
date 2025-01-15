<?php

namespace App\Livewire\Suppliers;

use App\Models\PurchaseInvoice;
use App\Models\Supplier;
use Livewire\Component;

class Supplieraccount extends Component
{
    public $supplier_id;
    public $totalCashDollar = 0;
    public $totalCashIraqy = 0;
    public $totalCreditDollar = 0;
    public $totalCreditIraqy = 0;

    public function mount($supplier_id)
    {
        $this->supplier_id = $supplier_id;
    }
    public function render()
    {
        $supplier = Supplier::findOrFail($this->supplier_id);

        $this->totalCashDollar = $supplier->invoices()->where("payment_type","=","cash")->sum("dollar_value");
        $this->totalCashIraqy = $supplier->invoices()->where("payment_type","=","cash")->sum("purchase_price");

        $this->totalCreditDollar = $supplier->invoices()->where("payment_type","=","credit")->sum("dollar_value");
        $this->totalCreditIraqy = $supplier->invoices()->where("payment_type","=","credit")->sum("purchase_price");

        return view('livewire.suppliers.supplieraccount',[
            "supplier" => $supplier,
            "invoices" => $supplier->invoices()->paginate(10)
        ]);
    }
}
