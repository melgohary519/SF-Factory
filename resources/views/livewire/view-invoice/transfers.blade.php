<div class="container-fluid itemspage mt-5">

    <div class="tableList p-3 ">
        <h1>
            الفاتورة رقم
            {{ $invoice->id }}
        </h1>
        
        <div class="containerGrroup mt-5">
            <div class="row">
                <div class="col-4">تاريخ اصدار الفاتورة</div>
                <div class="col highlight">{{ $invoice->transfer_date }}</div>
            </div>
            <div class="row">
                <div class="col-4">اسم المورد / التاجر</div>
                <div class="col highlight">{{ $invoice->person_name }}</div>
            </div>
            <div class="row">
                <div class="col-4">سبب الحوالة </div>
                <div class="col highlight">{{ $invoice->reason }}</div>
            </div>
            <div class="row">
                <div class="col-4">نوع الحوالة</div>
                <div class="col highlight">{{ $invoice->type }}</div>
            </div>
            <div class="row">
                <div class="col-4">السعر بالعراقي</div>
                <div class="col highlight">{{ number_format($invoice->amount, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">السعر بالدولار</div>
                <div class="col highlight">{{ number_format($invoice->dollar_value, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4"> اسم المستلم</div>
                <div class="col highlight">{{$invoice->recipient_name}}</div>
            </div>
           
        </div>

    </div>


</div>
