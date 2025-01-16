<?php

namespace App\Livewire\Traders;

use App\Models\Trader;
use Livewire\Component;

class TraderAccount extends Component
{
    public $trader_id;
    public $totalCashDollar = 0;
    public $totalCashIraqy = 0;
    public $totalCreditDollar = 0;
    public $totalCreditIraqy = 0;

    public function mount($trader_id)
    {
        $this->trader_id = $trader_id;
    }

    public function render()
    {
        $trader = Trader::findOrFail($this->trader_id);

        $this->totalCashDollar = $trader->invoices()->where("payment_type", "=", "cash")->sum("dollar_value");
        $this->totalCashIraqy = $trader->invoices()->where("payment_type", "=", "cash")->sum("purchase_price");

        $this->totalCreditDollar = $trader->invoices()->where("payment_type", "=", "credit")->sum("dollar_value");
        $this->totalCreditIraqy = $trader->invoices()->where("payment_type", "=", "credit")->sum("purchase_price");

        return view('livewire.traders.trader-account', [
            "trader" => $trader,
            "invoices" => $trader->invoices()->paginate(10)
        ]);
    }
}
