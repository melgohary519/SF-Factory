<?php

namespace App\Livewire\ProfitsLosses;

use App\Models\Item;
use App\Models\PurchaseInvoice;
use App\Models\SalesInvoice;
use Livewire\Component;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $currentRowIndex = 0;

        // headers
        $sheet->setCellValue('A1', 'كشف المواد');
        $sheet->setCellValue('A2', 'الفترة من');
        $sheet->setCellValue('B2', $this->fromDate);
        $sheet->setCellValue('A3', 'إلى');
        $sheet->setCellValue('B3', $this->toDate);


        $headers = [
            "رقم",
            "نوع البضاعة",
            "الكمية المشتراة",
            "اسم المخزن",
            "اسم الشريك",
            "تاريخ الشراء",
            "كمية المواد المباعة",
            "الكمية المتبقية في المخزن",
        ];

        $sheet->fromArray($headers, null, 'A5');
        
        $invoicesData = PurchaseInvoice::whereBetween('purchase_date', [$this->fromDate, $this->toDate])->get();
        $invoicesDataCount = PurchaseInvoice::whereBetween('purchase_date', [$this->fromDate, $this->toDate])->count();
        $rowIndex = 6;
        $startRowIndexDataValues = $rowIndex;

        for ($i = 0; $i < $invoicesDataCount; $i++) {
            $d = $invoicesData[$i];
            $salesCount = SalesInvoice::whereBetween('sale_date', [$this->fromDate, $this->toDate])
                ->where('goods_type', '=', $d->goods_type)
                ->where('inventory_name', '=', $d->inventory_name)
                ->sum("weight");

            $row = [
                $i + 1,
                $d->goods_type,
                $d->weight,
                $d->inventory_name,
                $d->partner_name,
                $d->purchase_date,
                $salesCount,
                $d->weight - $salesCount,
            ];
            $sheet->fromArray($row, null, "A$rowIndex");
            $rowIndex++;
        }

        $currentRowIndex = $rowIndex +2 ;
        $sheet->setCellValue("C$currentRowIndex", "=SUM(C$startRowIndexDataValues:C$rowIndex)");
        $sheet->setCellValue("G$currentRowIndex", "=SUM(G$startRowIndexDataValues:G$rowIndex)");
        $sheet->setCellValue("H$currentRowIndex", "=SUM(H$startRowIndexDataValues:H$rowIndex)");

        $currentRowIndex = $currentRowIndex + 1;
        $text = "مجموع الحقول";
        $sheet->setCellValue("C$currentRowIndex", $text);
        $sheet->setCellValue("G$currentRowIndex", $text);
        $sheet->setCellValue("H$currentRowIndex", $text);

        $sheet->getStyle("A1:L$currentRowIndex")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle("A1:L$currentRowIndex")->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);


        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }


        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path("app/public/كشف المواد.xlsx");
        $writer->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}
