<?php

namespace App\Livewire\ProfitsLosses;

use App\Exports\SupplierAccountExport;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Trader;
use Livewire\Component;
use Maatwebsite\Excel\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
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
        $filename = '';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $currentRowIndex = 0;
        if ($this->type == "supplier") {
            $supplier = Supplier::find($this->selectedPersonId);            
            $filename = "كشف حساب المورد (" . $supplier->name . ").xlsx";

            // العناوين
            $sheet->setCellValue('A1', 'كشف حساب المورد');
            $sheet->setCellValue('B1', $supplier->name);
            $sheet->setCellValue('A2', 'الفترة من');
            $sheet->setCellValue('B2', $this->fromDate);
            $sheet->setCellValue('A3', 'إلى');
            $sheet->setCellValue('B3', $this->toDate);
            
             // إضافة عناوين الأعمدة
            $headers = [
                "رقم", "رقم فاتورة الشراء", "نوع البضاعة", "الكمية المشتراة", 
                "مبلغ الشراء بالدولار", "حالة الدفع", "مبلغ الشراء بالعراقي", 
                "تاريخ الشراء", "مبلغ الحوالة دولار", "مبلغ الحوالة عراقي", 
                "باقي حساب عراقي", "باقي حساب دولار"
            ];

            $sheet->fromArray($headers, null, 'A5');

            $dataValues = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->get();
            $dataValuesCount = $supplier->invoices()->whereBetween('purchase_date', [$this->fromDate, $this->toDate])->count();
            $rowIndex = 6;
            $startRowIndexDataValues = $rowIndex;
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


                $sheet->fromArray($row, null, "A$rowIndex");
                $rowIndex++;
            }

            $currentRowIndex = $rowIndex +2 ;
            $sheet->setCellValue("D$currentRowIndex", "=SUM(D$startRowIndexDataValues:D$rowIndex)");
            $sheet->setCellValue("E$currentRowIndex", "=SUM(E$startRowIndexDataValues:E$rowIndex)");
            $sheet->setCellValue("G$currentRowIndex", "=SUM(G$startRowIndexDataValues:G$rowIndex)");
            $sheet->setCellValue("I$currentRowIndex", "=SUM(I$startRowIndexDataValues:I$rowIndex)");
            $sheet->setCellValue("K$currentRowIndex", "=SUM(K$startRowIndexDataValues:K$rowIndex)");
            $sheet->setCellValue("L$currentRowIndex", "=SUM(L$startRowIndexDataValues:L$rowIndex)");

            $currentRowIndex = $currentRowIndex + 1;
            $text = "مجموع الحقول";
            $sheet->setCellValue("D$currentRowIndex", $text);
            $sheet->setCellValue("E$currentRowIndex", $text);
            $sheet->setCellValue("G$currentRowIndex", $text);
            $sheet->setCellValue("I$currentRowIndex", $text);
            $sheet->setCellValue("K$currentRowIndex", $text);
            $sheet->setCellValue("L$currentRowIndex", $text);

        
        } elseif ($this->type == "trader") {

            $trader = Trader::find($this->selectedPersonId);
            $filename = "كشف حساب التاجر (" . $trader->name . ").xlsx";

            // العناوين
            $sheet->setCellValue('A1', 'كشف حساب التاجر');
            $sheet->setCellValue('B1', $trader->name);
            $sheet->setCellValue('A2', 'الفترة من');
            $sheet->setCellValue('B2', $this->fromDate);
            $sheet->setCellValue('A3', 'إلى');
            $sheet->setCellValue('B3', $this->toDate);
            
             // إضافة عناوين الأعمدة
            $headers = [
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

            $sheet->fromArray($headers, null, 'A5');

            $dataValues = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->get();
            $dataValuesCount = $trader->invoices()->whereBetween('sale_date', [$this->fromDate, $this->toDate])->count();
            $rowIndex = 6;
            $startRowIndexDataValues = $rowIndex;

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


                $sheet->fromArray($row, null, "A$rowIndex");
                $rowIndex++;
            }

            $currentRowIndex = $rowIndex + 2;
            $sheet->setCellValue("D$currentRowIndex", "=SUM(D$startRowIndexDataValues:D$rowIndex)");
            $sheet->setCellValue("E$currentRowIndex", "=SUM(E$startRowIndexDataValues:E$rowIndex)");
            $sheet->setCellValue("G$currentRowIndex", "=SUM(G$startRowIndexDataValues:G$rowIndex)");
            $sheet->setCellValue("I$currentRowIndex", "=SUM(I$startRowIndexDataValues:I$rowIndex)");
            $sheet->setCellValue("K$currentRowIndex", "=SUM(K$startRowIndexDataValues:K$rowIndex)");
            $sheet->setCellValue("L$currentRowIndex", "=SUM(L$startRowIndexDataValues:L$rowIndex)");

            $currentRowIndex = $currentRowIndex + 1;
            $text = "مجموع الحقول";
            $sheet->setCellValue("D$currentRowIndex", $text);
            $sheet->setCellValue("E$currentRowIndex", $text);
            $sheet->setCellValue("G$currentRowIndex", $text);
            $sheet->setCellValue("I$currentRowIndex", $text);
            $sheet->setCellValue("K$currentRowIndex", $text);
            $sheet->setCellValue("L$currentRowIndex", $text);

        }
        $sheet->getStyle("A1:L$currentRowIndex")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("A1:L$currentRowIndex")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }


        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path("app/public/$filename");
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
