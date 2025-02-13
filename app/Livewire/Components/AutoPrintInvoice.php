<?php

namespace App\Livewire\Components;

use Livewire\Component;

class AutoPrintInvoice extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div>
            <script>
                ll = document.querySelector(".print-invoice").outerHTML;
                document.body.innerHTML = ll;
                window.print();
                window.addEventListener('afterprint', function() {
                        window.history.back();
                    });
            </script>
        </div>
        HTML;
    }
}
