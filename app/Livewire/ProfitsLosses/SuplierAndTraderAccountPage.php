<?php

namespace App\Livewire\ProfitsLosses;

use App\Models\Item;
use App\Models\Supplier;
use App\Models\Trader;
use Livewire\Component;

class SuplierAndTraderAccountPage extends Component
{
    public $type;
    public $pageTitle;
    public $select_options;
    // public $items;
    public $fromDate;
    public $toDate;
    public $selectedProduct;


    public $selectedPersonId;

    public $itemsQuantity = 0;
    public $priceIraqy = 0;
    public $priceDollary = 0;
    public $transferIraqy = 0;
    public $transferDollary = 0;
    public $restIraqy = 0;
    public $restDollary = 0;

    function mount($type)
    {
        $this->type = $type;

        $this->items = Item::all();

        if ($type == "supplier") {
            $this->pageTitle = "حساب  المورد";
            $this->select_options = Supplier::all();

        } elseif ($type == "trader") {
            $this->pageTitle = "حساب التاجر";
            $this->select_options = Trader::all();
        }
    }
    public function render()
    {
        session()->flash("page_name", $this->pageTitle);
        return view('livewire.profits-losses.suplier-and-trader-account-page');
    }

    public function updated()
    {
        $this->reloadData();
    }

    public function reloadData()
    {
        
        if ($this->type == "supplier") {

        } elseif ($this->type == "trader") {
            $trader = Trader::find($this->selectedPersonId);
            if ($trader) {
                $this->priceIraqy = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("sale_price");
                $this->priceDollary = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->transferIraqy = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount");
                $this->transferDollary = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->restIraqy = $this->priceIraqy - $this->transferIraqy;
                $this->restDollary = $this->priceDollary - $this->transferDollary;
            }else{
                $this->priceIraqy = 0;
                $this->priceDollary = 0;
                $this->transferIraqy = 0;
                $this->transferDollary = 0;
                $this->restIraqy = 0;
                $this->restDollary = 0;
            }


        }
    }
}
