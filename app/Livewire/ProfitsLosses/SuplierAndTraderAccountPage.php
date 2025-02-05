<?php

namespace App\Livewire\ProfitsLosses;

use App\Models\Supplier;
use App\Models\Trader;
use Livewire\Component;

class SuplierAndTraderAccountPage extends Component
{
    public $type;
    public $pageTitle;
    public $select_options;

    public $itemsQuantity = 0;
    public $priceIraqy = 0;
    public $priceDollary = 0;
    public $transferIraqy = 0;
    public $transferDollary = 0;

    function mount($type) {
        $this->type = $type;
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
        return view('livewire.profits-losses.suplier-and-trader-account-page');
    }
}
