<?php

namespace App\Livewire\Items;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ListItems extends Component
{
    use WithPagination;
    

    public function render()
    {
        
        return view('livewire.items.list-items',[
            'items' => Item::paginate(10),
        ]);
    }
}
