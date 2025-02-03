<div class="container-fluid itemspage mt-5">

    <div class="card bg1 mb-3">
        <div class="card-body">
            <div class="row text-center">
                <span class="align-content-center color-white"> {{ $trader->name }}</span>
            </div>
        </div>
    </div>

    <div class="tableList p-3 ">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> رقم</th>
                    <th scope="col"> نوع البضاعة</th>
                    <th scope="col"> الكمية</th>
                    <th scope="col"> التاريخ</th>
                    <th scope="col">المبلغ بالعراقي</th>
                    <th scope="col">المبلغ بالدولار</th>
                    <th scope="col">عرض الفاتورة</th>
                    <th scope="col">طباعة </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->goods_type }}</td>
                    <td>{{ $invoice->weight }}</td>
                    <td>{{ $invoice->sale_date }}</td>
                    <td>{{ number_format($invoice->sale_price,2,'.',',')  }}</td>
                    <td>{{ number_format($invoice->dollar_value,2,'.',',')  }} $</td>
                    <td> <a href="#">click here</a> </td>
                    <td> <a href="#">click here</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2 pagniateConainer">
        {{ $invoices->links() }}
    </div>

    <div class="table-footer d-flex align-items-center justify-content-center m-4" dir="rtl">
        <div class="me-3 text-center rounded totals">
            <span> الاجماليات </span>
        </div>
    </div>
</div>
