<?php

namespace App\Livewire\ProfitsLosses;

use App\Models\Item;
use App\Models\PurchaseInvoice;
use App\Models\SalesInvoice;
use Livewire\Component;

class MaterialReportPage extends Component
{
    public $fromDate;
    public $toDate;
    public $items;
    public $item;
    public $selectedItemName;

    public $quantity = 0;
    public $salesQuantity = 0;
    public $purchaseQuantity = 0;
    public $remainingStock = 0;

    public $inventoryList;
    public $partnerList;

    public $inventoryName;
    public $partnerName;

    public function render()
    {
        $this->items = Item::all();
        $this->reloadData();

        $this->inventoryList = Item::select('inventory_name')->groupBy('inventory_name')->get();
        $this->partnerList = Item::select('partner_name')->groupBy('partner_name')->get();

        session()->flash("page_name", "كشف المواد");
        return view('livewire.profits-losses.material-report-page');
    }
    function updated()
    {
        $this->reloadData();
    }
    function reloadData(): void
    {
        $this->selectedItemName = Item::find($this->item)->goods_type ?? "%";

        $this->purchaseQuantity = PurchaseInvoice::whereBetween('purchase_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $this->selectedItemName ?? "%")
            ->where('partner_name', 'like', $this->partnerName ?? "%")
            ->where('inventory_name', 'like', $this->inventoryName ?? "%")
            ->sum("weight");


        $this->salesQuantity = SalesInvoice::whereBetween('sale_date', [$this->fromDate, $this->toDate])
            ->where('goods_type', 'like', $this->selectedItemName ?? "%")
            ->where('partner_name', 'like', $this->partnerName ?? "%")
            ->where('inventory_name', 'like', $this->inventoryName ?? "%")
            ->sum("weight");

        $this->remainingStock = $this->purchaseQuantity - $this->salesQuantity;

    }


    public function exportData()
    {
        $data = [];
        $filename = '';

        function sumArrayIndex($data, $index)
        {

            return array_sum(array_map(function ($item) use ($index) {
                return isset($item[$index]) && !is_string($item[$index]) ? $item[$index] : 0;
            }, $data));
        }


        $data[] = ['كشف  المواد'];
        $data[] = ["الفترة من", $this->fromDate];
        $data[] = ["الي", $this->toDate];
        $data[] = [];
        $data[] = [
            "رقم",
            "نوع البضاعة",
            "الكمية المشتراة",
            "اسم المخزن",
            "اسم الشريك",
            "تاريخ الشراء",
            "كمية المواد المباعة",
            "الكمية المتبقية في المخزن",
        ];


        $invoicesData = PurchaseInvoice::whereBetween('purchase_date', [$this->fromDate, $this->toDate])->get();
        $invoicesDataCount = PurchaseInvoice::whereBetween('purchase_date', [$this->fromDate, $this->toDate])->count();
        for ($i = 0; $i < $invoicesDataCount; $i++) {
            $d = $invoicesData[$i];
            $salesCount = SalesInvoice::whereBetween('sale_date', [$this->fromDate, $this->toDate])
                ->where('goods_type', '=', $d->goods_type)
                ->where('inventory_name', '=', $d->inventory_name)
                ->sum("weight");

            $data[] = [
                $i + 1,
                $d->goods_type,
                $d->weight,
                $d->inventory_name,
                $d->partner_name,
                $d->purchase_date,
                $salesCount,
                $d->weight - $salesCount,
            ];
        }

        $data[] = [];
            $data[] = [];
            $data[] = [];
            $data[] = [];
            $data[] = [
                '',
                '',
                sumArrayIndex($data,2),
                '',
                '',
                '',
                sumArrayIndex($data,6),
                sumArrayIndex($data,7),

                
            ];
            $data[] = [
                '',
                '',
                'مجموع الحقول',
                '',
                '',
                '',
                'مجموع الحقول',
                'مجموع الحقول',
            ];



       

        // $filename = 'users_' . date('Ymd_His') . '.csv';
        $filename = "كشف المواد_" . date('d_m_Y') . '.csv';
        return response()->streamDownload(function () use ($data) {
            $handle = fopen('php://output', 'w');

            foreach ($data as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, $filename);
    }
}
