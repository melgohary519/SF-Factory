<?php

namespace App\Livewire\Print;

use Livewire\Component;

class PrintInvoice extends Component
{
    public $type;
    public $id;

    function mount($type,$id) {
        $this->type = $type;
        $this->type = $id;
    }
    public function render()
    {
        return view('livewire.print.print-invoice');
    }
}
