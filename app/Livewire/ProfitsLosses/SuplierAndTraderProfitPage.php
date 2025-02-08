<?php

namespace App\Livewire\ProfitsLosses;

use App\Models\Supplier;
use App\Models\Trader;
use Livewire\Component;

class SuplierAndTraderProfitPage extends Component
{
    public $data;
    public $type;
    public $pageTitle;
    public $fromDate;
    public $toDate;

    public $total_priceIraqy;
    public $total_priceDollary;
    public $total_transferIraqy;
    public $total_transferDollary;

    function mount($type)
    {
        $this->type = $type;

        if ($type == "supplier") {
            $this->pageTitle = "كشف حساب المورد";

        } elseif ($type == "trader") {
            $this->pageTitle = "كشف حساب التاجر";
        }
    }
    public function render()
    {
        $this->reloadData();
        session()->flash("page_name", $this->pageTitle);
        return view('livewire.profits-losses.suplier-and-trader-profit-page');
    }

    public function updated()
    {
        $this->reloadData();
    }


    public function reloadData()
    {
        $this->data = [];
        $this->total_priceIraqy = 0;
        $this->total_priceDollary = 0;
        $this->total_transferIraqy = 0;
        $this->total_transferDollary = 0;

        if ($this->type == "supplier") {
            foreach (Supplier::all() as $suplier) {
                $item = [
                    "id" => $suplier->id,
                    "name" => $suplier->name,
                    "priceIraqy" => $suplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->sum("purchase_price"),
                    "priceDollary" => $suplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->sum("dollar_value"),
                    "transferIraqy" => $suplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount"),
                    "transferDollary" => $suplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_value"),
                ];
                $this->data[] = $item;
                $this->total_priceIraqy += $item['priceIraqy'];
                $this->total_priceDollary += $item['priceDollary'];
                $this->total_transferIraqy += $item['transferIraqy'];
                $this->total_transferDollary += $item['transferDollary'];
            }
        } elseif ($this->type == "trader") {
            foreach (Trader::all() as $trader) {
            $item = [
                "id" => $trader->id,
                "name" => $trader->name,
                "priceIraqy" => $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("sale_price"),
                "priceDollary" => $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("dollar_value"),
                "transferIraqy" => $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount"),
                "transferDollary" => $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_value"),
            ];
            $this->data[] = $item;
            $this->total_priceIraqy += $item['priceIraqy'];
            $this->total_priceDollary += $item['priceDollary'];
            $this->total_transferIraqy += $item['transferIraqy'];
            $this->total_transferDollary += $item['transferDollary'];
            }
        }
    }

}
