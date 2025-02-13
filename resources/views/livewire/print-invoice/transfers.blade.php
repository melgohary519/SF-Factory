<div class="print-invoice position-relative">
    <div class="invoice-content  p-3 mt-5 ">
        <div class="invoice-header d-flex mt-3">
            <div class="invoice-header-right w-50 align-self-center">
                <h1 class="pb-5" style="color: blueviolet">فاتورة حوالات</h1>
                <table class="w-100 text-center">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <td>{{ $invoice->id }}</td>
                        </tr>
                        <tr>
                            <th>التاريخ</th>
                            <td>{{ $invoice->transfer_date }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="invoice-header-left w-50 d-flex justify-content-center align-items-center">
                <img src="{{ asset('images/invoice_logo.png  ') }}" alt="logo"
                    class="img-thumbnail rounded">
            </div>
        </div>

            <table class="table table-striped mt-5 text-center" style="margin-top: 90px !important">
                <thead>
                    <tr>
                        <th class="w-50">المبلغ بالعراقي: </th>
                        <td>{{ $invoice->amount }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">المبلغ بالدولار</th>
                        <td>{{ $invoice->dollar_rate }}</td>
                    </tr>
                    <tr>
                        <th class="text-white" style=" background: #663399">قيمة الدولار الواحد </th>
                        <td class="text-white" style=" background: #663399">{{ $invoice->dollar_value }}</td>
                    </tr>
                </thead>
            </table>


            <table class="table table-striped mt-5 text-center" style="margin-top: 40px !important">
                <thead>
                    <tr>
                        <th class="w-50">سبب الحوالة:</th>
                        <td>{{ $invoice->reason }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">نوع الحوالة:</th>
                        <td>{{ $invoice->type }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">اسم المستلم:</th>
                        <td>{{ $invoice->recipient_name }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">رقم هاتف المستلم:</th>
                        <td>{{ $invoice->recipient_phone }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">اسم المستفيد:</th>
                        <td>{{ $invoice->person_name }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">رقم هاتف المستفيد:</th>
                        <td>{{ $invoice->person_phone }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">عنوان المستفيد:</th>
                        <td>{{ $invoice->person_address }}</td>
                    </tr>
                    
                </thead>
            </table>


            





        <div class="bookmarks"></div>
    </div>

    <div class="footer sales w-100 position-absolute bottom-0 d-flex justify-content-between mt-5 p-3" >
        <div>
            العراق - أربيل - برج العدالة - طابق 13 - مكتب 28
        </div>
        <div dir="ltr">
            +964 750 178 7725 - +964 782 387 97696
        </div>
    </div>
</div>
