<div class="container-fluid itemspage mt-5">

    <div class="tableList p-3 ">
        <h1>
            الفاتورة رقم
            {{ $invoice->id }}
        </h1>
        
        <div class="containerGrroup mt-5">
            <div class="row">
                <div class="col-4">تاريخ اصدار الفاتورة</div>
                <div class="col highlight">{{ $invoice->expense_date }}</div>
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
                <div class="col-4"> تفاصيل الفاتورة </div>
                <div class="col highlight">{{$invoice->details}}</div>
            </div>
           
        </div>

    </div>


</div>
