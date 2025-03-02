<?php

namespace App\Livewire\ProfitsLosses;

use App\Exports\SupplierAccountExport;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Trader;
use Livewire\Component;
use Maatwebsite\Excel\Excel;
use Response;

class SuplierAndTraderAccountPage extends Component
{
    public $type;
    public $pageTitle;
    public $select_options;
    // public $items;
    public $fromDate;
    public $toDate;
    public $selectedProduct;


    public $selectedPersonId;

    public $itemsQuantity = 0;
    public $priceIraqy = 0;
    public $priceDollary = 0;
    public $transferIraqy = 0;
    public $transferDollary = 0;
    public $restIraqy = 0;
    public $restDollary = 0;

    function mount($type)
    {
        $this->type = $type;

        $this->items = Item::all();

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
        session()->flash("page_name", $this->pageTitle);
        return view('livewire.profits-losses.suplier-and-trader-account-page');
    }

    public function updated()
    {
        $this->reloadData();
    }

    public function reloadData()
    {

        if ($this->type == "supplier") {
            $supplier = Supplier::find($this->selectedPersonId);
            if ($supplier) {
                $this->itemsQuantity = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->sum("weight");
                $this->priceIraqy = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->sum("purchase_price");
                $this->priceDollary = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->transferIraqy = $supplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount");
                $this->transferDollary = $supplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->restIraqy = $this->priceIraqy - $this->transferIraqy;
                $this->restDollary = $this->priceDollary - $this->transferDollary;
            } else {
                $this->priceIraqy = 0;
                $this->priceDollary = 0;
                $this->transferIraqy = 0;
                $this->transferDollary = 0;
                $this->restIraqy = 0;
                $this->restDollary = 0;
            }
        } elseif ($this->type == "trader") {
            $trader = Trader::find($this->selectedPersonId);
            if ($trader) {
                $this->itemsQuantity = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("weight");
                $this->priceIraqy = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("sale_price");
                $this->priceDollary = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->transferIraqy = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount");
                $this->transferDollary = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                $this->restIraqy = $this->priceIraqy - $this->transferIraqy;
                $this->restDollary = $this->priceDollary - $this->transferDollary;
            } else {
                $this->priceIraqy = 0;
                $this->priceDollary = 0;
                $this->transferIraqy = 0;
                $this->transferDollary = 0;
                $this->restIraqy = 0;
                $this->restDollary = 0;
            }
        }
    }


    public function exportData()
    {
        $data = [];
        $filename = '';

        function sumArrayIndex($data, $index)    {
            return array_sum(array_map(function ($item) use ($index) {
                return isset($item[$index]) && !is_string($item[$index]) ? $item[$index] : 0;
            }, $data));
        }

        if ($this->type == "supplier") {
            $supplier = Supplier::find($this->selectedPersonId);
            $filename = "كشف حساب المورد (" . $supplier->name . ") ";
            $data[] = ['كشف حساب المورد', $supplier->name];
            $data[] = ["الفترة من", $this->fromDate];
            $data[] = ["الي", $this->toDate];
            $data[] = [];
            $data[] = [
                "رقم",
                "رقم فاتورة الشراء",
                "نوع البضاعة",
                "الكمية المشتراة",
                "مبلغ الشراء بالدولار",
                "حالة الدفع",
                "مبلغ الشراء بالعراقي",
                "تاريخ الشراء",
                "مبلغ الحوالة دولار",
                "مبلغ الحوالة عراقي",
                "باقي حساب عراقي",
                "باقي حساب دولار",
            ];
            $dataValues = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->get();
            $dataValuesCount = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->count();
            for ($i = 0; $i < $dataValuesCount; $i++) {
                $row = [
                    $i + 1,
                    $dataValues[$i]->id,
                    $dataValues[$i]->goods_type,
                    $dataValues[$i]->weight,
                    $dataValues[$i]->dollar_value,
                    $dataValues[$i]->payment_type == "cash" ? "نقدي" : "مؤجل",
                    $dataValues[$i]->purchase_price,
                    $dataValues[$i]->purchase_date,
                ];
                if ($i == 0) {
                    $transferIraqy = $supplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount");
                    $transferDollary = $supplier->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                    $row[] = $transferDollary;
                    $row[] = $transferIraqy;
                    $row[] = $this->restIraqy;
                    $row[] = $this->restDollary;
                }


                $data[] = $row;
            }
            $data[] = [];
            $data[] = [];
            $data[] = [];
            $data[] = [];
            $data[] = [
                '',
                '',
                '',
                sumArrayIndex($data,3),
                sumArrayIndex($data,4),
                '',
                sumArrayIndex($data,6),
                '',
                sumArrayIndex($data,8),
                '',
                sumArrayIndex($data,10),
                sumArrayIndex($data,11),
            ];
            $data[] = [
                '',
                '',
                '',
                'مجموع الحقول',
                'مجموع الحقول',
                '',
                'مجموع الحقول',
                '',
                'مجموع الحقول',
                '',
                'مجموع الحقول',
                'مجموع الحقول',
            ];

        
        } elseif ($this->type == "trader") {
            $trader = Trader::find($this->selectedPersonId);
            $filename = "كشف حساب التاجر (" . $trader->name . ") ";
            $data[] = ['كشف حساب المورد', $trader->name];
            $data[] = ["الفترة التاجر", $this->fromDate];
            $data[] = ["الي", $this->toDate];
            $data[] = [];
            $data[] = [
                "رقم",
                "رقم فاتورة البيع",
                "نوع البضاعة",
                "الكمية المباعه",
                "مبلغ البيع بالدولار",
                "حالة الدفع",
                "مبلغ البيع بالعراقي",
                "تاريخ البيع",
                "مبلغ الحوالة دولار",
                "مبلغ الحوالة عراقي",
                "باقي حساب عراقي",
                "باقي حساب دولار",
            ];
            $dataValues = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->get();
            $dataValuesCount = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->count();
            for ($i = 0; $i < $dataValuesCount; $i++) {
                $row = [
                    $i + 1,
                    $dataValues[$i]->id,
                    $dataValues[$i]->goods_type,
                    $dataValues[$i]->weight,
                    $dataValues[$i]->dollar_value,
                    $dataValues[$i]->payment_type == "cash" ? "نقدي" : "مؤجل",
                    $dataValues[$i]->sale_price,
                    $dataValues[$i]->sale_date,
                ];
                if ($i == 0) {
                    $transferIraqy = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("amount");
                    $transferDollary = $trader->transfers()->whereBetween('transfer_date', [$this->fromDate, $this->toDate])->sum("dollar_value");
                    $row[] = $transferDollary;
                    $row[] = $transferIraqy;
                    $row[] = $this->restIraqy;
                    $row[] = $this->restDollary;
                }


                $data[] = $row;
            }
            $data[] = [];
            $data[] = [];
            $data[] = [];
            $data[] = [];
            $data[] = [
                '',
                '',
                '',
                sumArrayIndex($data,3),
                sumArrayIndex($data,4),
                '',
                sumArrayIndex($data,6),
                '',
                sumArrayIndex($data,8),
                '',
                sumArrayIndex($data,10),
                sumArrayIndex($data,11),
            ];
            $data[] = [
                '',
                '',
                '',
                'مجموع الحقول',
                'مجموع الحقول',
                '',
                'مجموع الحقول',
                '',
                'مجموع الحقول',
                '',
                'مجموع الحقول',
                'مجموع الحقول',
            ];
            
        }






        // $filename = 'users_' . date('Ymd_His') . '.csv';
        $filename = $filename . "_" . date('d_m_Y') . '.csv';
        return response()->streamDownload(function () use ($data) {
            $handle = fopen('php://output', 'w');

            foreach ($data as $row) {
                fputcsv($handle, $row);
            }

            fclose($handle);
        }, $filename);
    }
}
