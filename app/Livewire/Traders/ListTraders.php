<?php

namespace App\Livewire\Traders;

use App\Models\Trader;
use Livewire\Component;
use Livewire\WithPagination;

class ListTraders extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        session()->flash("page_name", "التجار");
        return view('livewire.traders.list-traders', [
            'traders' => Trader::paginate(10)
        ]);
    }
}
