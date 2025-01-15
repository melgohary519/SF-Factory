<div class="container-fluid itemspage mt-5">

    <div class="card bg1 mb-3">
        <div class="card-body">
            <div class="row text-center">
                <span class="align-content-center color-white"> {{ $supplier->name }}</span>
            </div>
        </div>
    </div>

    <div class="tableList p-3 ">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">طباعة </th>
                    <th scope="col">عرض الفاتورة</th>
                    <th scope="col">المبلغ بالدولار</th>
                    <th scope="col">المبلغ بالعراقي</th>
                    <th scope="col">التاريخ</th>
                    <th scope="col"> الكمية</th>
                    <th scope="col"> نوع البضاعة</th>
                    <th scope="col"> رقم</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                <tr>
                    <td> <a href="#">click here</a> </td>
                    <td> <a href="#">click here</a> </td>
                    <td>{{ $invoice->dollar_value }} $</td>
                    <td>{{ $invoice->purchase_price }}</td>
                    <td>{{ $invoice->created_at->format("Y-m-d") }}</td>
                    <td>{{ $invoice->weight }}</td>
                    <td>{{ $invoice->goods_type }}</td>
                    <td>{{ $invoice->id }}</td>
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


    <div class="tableList p-3 ">
        <table class="table table-striped totals">
            <thead>
                <tr>

                    <th scope="col"> باقي الحساب دولار</th>
                    <th scope="col"> باقي الحساب عرقي</th>
                    <th scope="col"> مجموع الحوالات دولار </th>
                    <th scope="col"> مجموع الحوالات عراقي</th>
                    <th scope="col"> مجموع السعر دولار </th>
                    <th scope="col"> مجموع السعر عراقي</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{ $totalCashDollar }}</td>
                    <td>{{ $totalCashIraqy }}</td>
                </tr>

            </tbody>
        </table>



    </div>

    {{--  <div class="table-footer d-flex align-items-center justify-content-center mt-4" dir="rtl">

        <div style=" background-color: #0d8b0d !important;" class="me-3 text-center rounded">
            <span>مجموع السعر العراقي</span>
            <br>
            <span class="fw-light"> 0 </span>
        </div>

        <div style=" background-color: #0d8b0d !important;" class="me-3 text-center rounded">
            <span>مجموع السعر بالدولار</span>
            <br>
            <span class="fw-light"> {{ $totalDollar }} </span>
        </div>


        <div style=" background-color: #fd1f1f !important;" class="me-3 text-center rounded ">
            <span>مجموع الحوالات</span>
            <br>
            <span class="fw-light">0</span>
        </div>
        <div class="bg1 text-center rounded me-3">
            <span>باقي الحساب</span>
            <br>
            <span class="fw-light">0</span>
        </div>

    </div>  --}}


    {{--  <div class=" mb-3 mt-5">
        <div class="row text-center mb-1">
            <div class="col text-end bg1">{{ $selectedItem }}</div>
            <span class="col-3 align-content-center color-white bg4">نوع البضاعة</span>
        </div>

        <div class="row text-center mb-1">
            <div class="col text-end bg1">{{ $totalWeight }}</div>
            <span class="col-3 align-content-center color-white bg4"> الكمية</span>
        </div>

        <div class="row text-center">
            <div class="col text-end bg1">{{ $totalPurchasePrice }}</div>
            <span class="col-3 align-content-center color-white bg4">  السعر العراقي</span>
        </div>

        <div class="row text-center">
            <div class="col text-end bg1">{{ $totalDollarRate }} $</div>
            <span class="col-3 align-content-center color-white bg4">  السعر بالدولار</span>
        </div>
    </div>  --}}


</div>
