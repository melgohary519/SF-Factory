<?php

namespace App\Livewire\ProfitsLosses;

use App\Models\Expense;
use App\Models\Item;
use App\Models\PurchaseInvoice;
use App\Models\SalesInvoice;
use Livewire\Component;

class ProfitReportPage extends Component
{
    public $fromDate;
    public $toDate;
    public $itemTypes;
    public $itemType;
    public $partners;

    public $purchasePriceIraqy = 0;
    public $purchasePriceDollary = 0;
    public $salePriceIraqy = 0;
    public $salePriceDollary = 0;
    public $expensesIraqy = 0;
    public $expensesDollary = 0;

    public $restIraqy = 0;
    public $restDollary = 0;

    public $inventoryList;
    public $partnerList;
    public $inventoryName;
    public $partnerName;

    public function render()
    {
        $this->itemTypes = Item::all();
        $this->partners = Item::all();

        $this->inventoryList = Item::select('inventory_name')->groupBy('inventory_name')->get();
        $this->partnerList = Item::select('partner_name')->groupBy('partner_name')->get();

        $this->reloadData();
        

        return view('livewire.profits-losses.profit-report-page');
    }
    function updated() {
        $this->reloadData();
    }
    function reloadData(): void {

        $item = Item::find($this->itemType);
        $itemSearch = "%";
        if ($item != null) {
            $itemSearch = $item->goods_type;
        } 

        $this->purchasePriceIraqy = PurchaseInvoice::whereBetween('purchase_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $itemSearch)
            ->where('partner_name', 'like', $this->partnerName ?? "%")
            ->where('inventory_name', 'like', $this->inventoryName ?? "%")
            ->sum("purchase_price");

        $this->purchasePriceDollary = PurchaseInvoice::whereBetween('purchase_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $itemSearch)
            ->where('partner_name', 'like', $this->partnerName ?? "%")
            ->where('inventory_name', 'like', $this->inventoryName ?? "%")
            ->sum("dollar_value");

        $this->salePriceIraqy = SalesInvoice::whereBetween('sale_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $itemSearch)
            ->where('partner_name', 'like', $this->partnerName ?? "%")
            ->where('inventory_name', 'like', $this->inventoryName ?? "%")
            ->sum("sale_price"); 
        $this->salePriceDollary = SalesInvoice::whereBetween('sale_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $itemSearch)
            ->where('partner_name', 'like', $this->partnerName ?? "%")
            ->where('inventory_name', 'like', $this->inventoryName ?? "%")
            ->sum("dollar_value");

        $this->expensesIraqy = Expense::whereBetween('expense_date', [$this->fromDate, $this->toDate])->sum("purchase_price");
        $this->expensesDollary = Expense::whereBetween('expense_date', [$this->fromDate, $this->toDate])->sum("dollar_value");

        $this->restIraqy = ($this->purchasePriceIraqy + $this->expensesIraqy) - $this->salePriceIraqy;
        $this->restDollary = ($this->purchasePriceDollary + $this->expensesDollary) - $this->salePriceDollary;
    }
}
