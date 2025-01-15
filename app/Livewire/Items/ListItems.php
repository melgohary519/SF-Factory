<?php

namespace App\Livewire\Items;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ListItems extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $selectedItem;

    public function render()
    {
        session()->flash("page_name", value: "جميع المواد");

        $select_options = Item::query()
            ->groupBy('goods_type')
            ->orderBy('goods_type', 'asc')
            ->get();

            if ($this->selectedItem == "") {
            $this->selectedItem = $select_options->first()->goods_type;
        }

        $items = Item::where("goods_type","=",$this->selectedItem);
        $totalPurchasePrice = $items->sum("purchase_price");
        $totalWeight = $items->sum("weight");
        $totalDollarRate = $items->sum("dollar_rate");


        return view('livewire.items.list-items',[
            'items' => $items->paginate(10),
            "select_options" => $select_options,
            "totalPurchasePrice" => $totalPurchasePrice,
            "totalWeight" => $totalWeight,
            "totalDollarRate" => $totalDollarRate,
        ]);
    }

}
