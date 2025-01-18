<?php

namespace App\Livewire\Transfers;

use App\Models\PurchaseInvoice;
use App\Models\Supplier;
use App\Models\Trader;
use App\Models\Transfer;
use Livewire\Component;
use Carbon\Carbon;

class TransferAccountDetails extends Component
{
    public $type;
    public $selectedPersonId;
    public $fromDate;
    public $toDate;

    public $pageTitle = "";
    public $select_options;

    public $priceIraqy = 0;
    public $priceDollary = 0;
    public $transferIraqy = 0;
    public $transferDollary = 0;
    public $restIraqy = 0;
    public $restDollary = 0;


    public function mount($type)
    {
        $this->type = $type;
        if ($type == "suppliers") {
            $this->pageTitle = "حساب حوالات الموردين";
            $this->select_options = Supplier::all();
        } elseif ($type == "traders") {
            $this->pageTitle = "حساب حوالات التجار";
            $this->select_options = Trader::all();

        } elseif ($type == "total") {
            $this->pageTitle = "مجموع حسابات الحوالات";
        }
    }
    public function render()
    {
        session()->flash("page_name", $this->pageTitle);
        return view('livewire.transfers.transfer-account-details');
    }

    function updated($name, $value)
    {
        \Log::info($name);
        $this->reloadData();
    }

    function reloadData()
    {
        if (!empty($this->selectedPersonId)) {


            if ($this->type == "suppliers") {
                $supplier = Supplier::find($this->selectedPersonId);
                $this->priceIraqy = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->sum("purchase_price");
                $this->priceDollary = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->sum("dollar_rate");
                $this->transferIraqy = $supplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount");
                $this->transferDollary = $supplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_rate");
                $this->restIraqy = $this->priceIraqy - $this->transferIraqy;
                $this->restDollary = $this->priceDollary - $this->transferDollary;
            } elseif ($this->type == "traders") {
                $trader = Trader::find($this->selectedPersonId);
                $this->priceIraqy = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("sale_price");
                $this->priceDollary = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("dollar_rate");
                $this->transferIraqy = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount");
                $this->transferDollary = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_rate");
                $this->restIraqy = $this->priceIraqy - $this->transferIraqy;
                $this->restDollary = $this->priceDollary - $this->transferDollary;
            } elseif ($this->type == "total") {
            }
        } else {
            $this->priceIraqy = 0;
            $this->priceDollary = 0;
            $this->transferIraqy = 0;
            $this->transferDollary = 0;
            $this->restIraqy = 0;
            $this->restDollary = 0;
        }
    }

}
