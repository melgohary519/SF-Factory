<?php

namespace App\Livewire\ProfitsLosses;

use App\Models\Item;
use App\Models\PurchaseInvoice;
use App\Models\SalesInvoice;
use Livewire\Component;

class MaterialReportPage extends Component
{
    public $fromDate;
    public $toDate;
    public $items;
    public $item;
    public $selectedItemName;

    public $quantity = 0;
    public $salesQuantity = 0;
    public $purchaseQuantity = 0;
    public $remainingStock = 0;

    public function render()
    {
        $this->items = Item::all();
        $this->reloadData();

        session()->flash("page_name", "كشف المواد");
        return view('livewire.profits-losses.material-report-page');
    }
    function updated() {
        $this->reloadData();
    }
    function reloadData(): void {
        $this->selectedItemName = Item::find($this->item)->goods_type ?? "_";

        $this->purchaseQuantity = PurchaseInvoice::whereBetween('purchase_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $this->selectedItemName ?? "")
            ->sum("weight");

        $this->salesQuantity = SalesInvoice::whereBetween('sale_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $this->selectedItemName ?? "")
            ->sum("weight");

        $this->remainingStock = $this->purchaseQuantity - $this->salesQuantity;

    }
}
