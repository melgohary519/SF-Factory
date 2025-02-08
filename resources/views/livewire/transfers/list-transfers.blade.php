<div class="container-fluid itemspage mt-5">
    @livewire('transfers.nav', ['active' => 'list'])

    <div class="card bg1 mb-3">
        <div class="card-body">
            <div class="row text-center">
                <span class="align-content-center color-white"> قائمة الحوالات </span>
            </div>
        </div>
    </div>

    <div class="tableList p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                   <th scope="col">رقم</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">نوعه</th>
                    <th scope="col">التاريخ</th>
                    <th scope="col">المبلغ بالعراقي</th>
                    <th scope="col">المبلغ بالدولار</th>
                    <th scope="col">عرض</th>
                    <th scope="col"> طباعة</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transfers as $transfer)
                <tr>
                    <td>{{ $transfer->id }}</td>
                    <td>{{ $transfer->person_name }}</td>
                    <td>{{ $transfer->person_type == "supplier" ? "مورد" : "تاجر" }}</td>
                    <td>{{ $transfer->transfer_date }}</td>
                    <td>{{ number_format($transfer->amount,2,'.',',')  }}</td>
                    <td>{{  number_format($transfer->dollar_value,2,'.',',')  }} $</td>
                    <td> <a href="{{route('view.invoices.transfer',[$transfer->id])}}">click here</a> </td>
                    <td> <a href="#">click here</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2 pagniateConainer">
        {{ $transfers->links() }}
    </div>

    <div class="table-footer d-flex align-items-center justify-content-center m-4" dir="rtl">
        <div class="me-3 text-center rounded totals">
            <span> الاجماليات </span>
        </div>
    </div>

    <div class="tableList p-3">
        <table class="table table-striped totals">
            <thead>
                <tr>
                    <th scope="col"> مجموع حوالات الموردين - عراقي</th>
                    <th scope="col"> مجموع حوالات الموردين - دولاري</th>
                    <th scope="col"> مجموع حوالات التجار - عراقي</th>
                    <th scope="col"> مجموع حوالات التجار - دولاري</th>
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{number_format($totalSupplierIraqi,2,'.',',')  }}</td>
                    <td>{{number_format($totalSupplierDollar,2,'.',',')  }}</td>
                    <td>{{number_format($totalTraderIraqi,2,'.',',')  }}</td>
                    <td>{{number_format($totalTraderDollar,2,'.',',')  }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>