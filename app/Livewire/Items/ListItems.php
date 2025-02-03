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
            ->selectRaw('goods_type, MAX(id) as id')
            ->groupBy('goods_type')
            ->orderBy('goods_type', 'asc')
            ->get();

            if ($this->selectedItem == "") {
            $firstOption = $select_options->first();
            if ($firstOption) {
                $this->selectedItem = $firstOption->goods_type;
            }
        }

        $items = Item::where("goods_type","=",$this->selectedItem);
        $totalPurchasePrice = $items->sum("purchase_price");
        $totalWeight = $items->sum("weight");
        $totalDollarValue = $items->sum("dollar_value");


        return view('livewire.items.list-items',[
            'items' => $items->paginate(10),
            "select_options" => $select_options,
            "totalPurchasePrice" => $totalPurchasePrice,
            "totalWeight" => $totalWeight,
            "totalDollarValue" => $totalDollarValue,
        ]);
    }

}
