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

    public $inventoryList;
    public $partnerList;

    public $inventoryName;
    public $partnerName;

    public function render()
    {
        $this->items = Item::all();
        $this->reloadData();

        $this->inventoryList = Item::select('inventory_name')->groupBy('inventory_name')->get();
        $this->partnerList = Item::select('partner_name')->groupBy('partner_name')->get();

        session()->flash("page_name", "كشف المواد");
        return view('livewire.profits-losses.material-report-page');
    }
    function updated() {
        $this->reloadData();
    }
    function reloadData(): void {
        $this->selectedItemName = Item::find($this->item)->goods_type ?? "%";

        $this->purchaseQuantity = PurchaseInvoice::whereBetween('purchase_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $this->selectedItemName ?? "%")
            ->where('partner_name', 'like', $this->partnerName ?? "%")
            ->where('inventory_name', 'like', $this->inventoryName ?? "%")
            ->sum("weight");


        $this->salesQuantity = SalesInvoice::whereBetween('sale_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $this->selectedItemName ?? "%")
            ->where('partner_name', 'like', $this->partnerName ?? "%")
            ->where('inventory_name', 'like', $this->inventoryName ?? "%")
            ->sum("weight");

        $this->remainingStock = $this->purchaseQuantity - $this->salesQuantity;

    }
}
