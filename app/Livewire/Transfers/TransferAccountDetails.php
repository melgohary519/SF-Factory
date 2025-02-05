<?php

namespace App\Livewire\Transfers;

use App\Models\PurchaseInvoice;
use App\Models\SalesInvoice;
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

    // total
    public $totalTraderTransferIraqy = 0;
    public $totalTraderTransferDolary = 0;

    public $totalTraderInvoicesIraqy = 0;
    public $totalTraderInvoicesDolary = 0;

    public $totalTraderRestIraqy = 0;
    public $totalTraderResyDolary = 0;

    public $totalSupplierTransferIraqy = 0;
    public $totalSupplierTransferDolary = 0;

    public $totalSupplierInvoicesIraqy = 0;
    public $totalSupplierInvoicesDolary = 0;

    public $totalSupplierRestIraqy = 0;
    public $totalSupplierResyDolary = 0;

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
        $this->reloadData();
    }

    function reloadData()
    {
        if ($this->type == "total") {
            $this->totalTraderTransferIraqy = Transfer::where('person_type', 'trader')->sum("amount");
            $this->totalTraderTransferDolary = Transfer::where('person_type', 'trader')->sum("dollar_value");
            $this->totalSupplierTransferIraqy = Transfer::where('person_type', 'supplier')->sum("amount");
            $this->totalSupplierTransferDolary = Transfer::where('person_type', 'supplier')->sum("dollar_value");

            $this->totalTraderInvoicesIraqy = SalesInvoice::sum("sale_price");
            $this->totalTraderInvoicesDolary =  SalesInvoice::sum("dollar_value");

            $this->totalSupplierInvoicesIraqy = PurchaseInvoice::sum("purchase_price");
            $this->totalSupplierInvoicesDolary =  PurchaseInvoice::sum("dollar_value");

            $this->totalSupplierRestIraqy = $this->totalSupplierInvoicesIraqy - $this->totalSupplierTransferIraqy;
            $this->totalSupplierResyDolary = $this->totalSupplierInvoicesDolary - $this->totalSupplierTransferDolary;

            $this->totalTraderRestIraqy = $this->totalTraderInvoicesIraqy - $this->totalTraderTransferIraqy;
            $this->totalTraderResyDolary = $this->totalTraderInvoicesDolary - $this->totalTraderTransferDolary;

        }

        if (!empty($this->selectedPersonId)) {


            if ($this->type == "suppliers") {
                $supplier = Supplier::find($this->selectedPersonId);
                $this->priceIraqy = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->sum("purchase_price");
                $this->priceDollary = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->transferIraqy = $supplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount");
                $this->transferDollary = $supplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->restIraqy = $this->priceIraqy - $this->transferIraqy;
                $this->restDollary = $this->priceDollary - $this->transferDollary;
            } elseif ($this->type == "traders") {
                $trader = Trader::find($this->selectedPersonId);
                $this->priceIraqy = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("sale_price");
                $this->priceDollary = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->transferIraqy = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount");
                $this->transferDollary = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->restIraqy = $this->priceIraqy - $this->transferIraqy;
                $this->restDollary = $this->priceDollary - $this->transferDollary;
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
