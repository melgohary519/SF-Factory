<?php

namespace App\Livewire\Suppliers;

use App\Models\Supplier;
use Livewire\Component;
use Livewire\WithPagination;

class Listsuppliers extends Component
{

    use WithPagination;
    protected $paginationTheme = "bootstrap";
        public function render()
    {
        session()->flash("page_name", value: "الموردين ");
        return view('livewire.suppliers.listsuppliers',[
            'suppliers' => Supplier::paginate(10)
        ]);
    }
}
