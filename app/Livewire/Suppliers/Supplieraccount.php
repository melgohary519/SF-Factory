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
    public $totalTransferDollar = 0;
    public $totalTransferIraqy = 0;
    public $totalRestIraqy = 0;
    public $totalRestDollary = 0;

    public function mount($supplier_id)
    {
        $this->supplier_id = $supplier_id;
    }
    public function render()
    {
        $supplier = Supplier::findOrFail($this->supplier_id);

        $this->totalCashDollar = $supplier->invoices()->sum("dollar_rate");
        $this->totalCashIraqy = $supplier->invoices()->sum("purchase_price");

        $this->totalTransferDollar = $supplier->transfers()->sum("dollar_rate");
        $this->totalTransferIraqy = $supplier->transfers()->sum("amount");

        $this->totalRestDollary = $this->totalCashDollar - $this->totalTransferDollar;
        $this->totalRestIraqy = $this->totalCashIraqy - $this->totalTransferIraqy;


        return view('livewire.suppliers.supplieraccount',[
            "supplier" => $supplier,
            "invoices" => $supplier->invoices()->paginate(10)
        ]);
    }
}
