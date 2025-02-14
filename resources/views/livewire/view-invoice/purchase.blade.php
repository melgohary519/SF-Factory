<div class="container-fluid itemspage mt-5">

    <div class="tableList p-3 ">
        <h1>
            الفاتورة رقم
            {{ $invoice->id }}
        </h1>
        
        <div class="containerGrroup mt-5">
            <div class="row">
                <div class="col-4">تاريخ اصدار الفاتورة</div>
                <div class="col highlight">{{ $invoice->purchase_date }}</div>
            </div>
            <div class="row">
                <div class="col-4">اسم المورد</div>
                <div class="col highlight">{{ $invoice->supplier_name }}</div>
            </div>
            <div class="row">
                <div class="col-4">نوع البضاعة</div>
                <div class="col highlight">{{ $invoice->goods_type }}</div>
            </div>
            <div class="row">
                <div class="col-4">الكمية</div>
                <div class="col highlight">{{ $invoice->weight }}</div>
            </div>
            <div class="row">
                <div class="col-4">اسم الشريك</div>
                <div class="col highlight">{{ $invoice->partner_name }}</div>
            </div>
            <div class="row">
                <div class="col-4">السعر بالعراقي</div>
                <div class="col highlight">{{ number_format($invoice->purchase_price, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">السعر بالدولار</div>
                <div class="col highlight">{{ number_format($invoice->dollar_value, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">حالة الدفع</div>
                <div class="col highlight">{{ $invoice->payment_type == "cash" ? "نقدي": "مؤجل" }}</div>
            </div>
           
        </div>

        <h2 class="mt-5">
            <a class="btn btn-success" href="{{route('print.invoices.purchase',[$invoice->id,'ar'])}}"> طباعة عربي</a>
        </h2>

    </div>


</div>
