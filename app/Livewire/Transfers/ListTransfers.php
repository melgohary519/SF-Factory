<?php

namespace App\Livewire\Transfers;

use App\Models\Transfer;
use Livewire\Component;
use Livewire\WithPagination;

class ListTransfers extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        session()->flash("page_name", "الحوالات");

        $totalSupplierIraqi = Transfer::where('person_type', 'supplier')->sum('amount');
        $totalSupplierDollar = Transfer::where('person_type', 'supplier')->sum('dollar_rate');
        $totalTraderIraqi = Transfer::where('person_type', 'trader')->sum('amount');
        $totalTraderDollar = Transfer::where('person_type', 'trader')->sum('dollar_rate');

        return view('livewire.transfers.list-transfers', [
            'transfers' => Transfer::paginate(10),
            'totalSupplierIraqi' => $totalSupplierIraqi,
            'totalSupplierDollar' => $totalSupplierDollar,
            'totalTraderIraqi' => $totalTraderIraqi,
            'totalTraderDollar' => $totalTraderDollar,
        ]);
    }
}