<div class="print-invoice position-relative">
    <div class="invoice-content  p-3 mt-5 ">
        <div class="invoice-header d-flex mt-3">
            <div class="invoice-header-right w-50 align-self-center">
                <h1 class="" style="color: blueviolet">فاتورة بيع</h1>
                <h2 class="pb-5" style="color: rgb(183, 35, 241)">شكرا لتعاونكم</h2>
                <table class="w-100 text-center">
                    <thead>
                        <tr>
                            <th>الرقم</th>
                            <td>{{ $invoice->id }}</td>
                        </tr>
                        <tr>
                            <th>التاريخ</th>
                            <td>{{ $invoice->sale_date }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="invoice-header-left w-50 d-flex justify-content-center align-items-center">
                <img style="background: rebeccapurple;" src="{{ asset('images/LOGO-PNG.png  ') }}" alt="logo"
                    class="img-thumbnail rounded">
            </div>
        </div>
    
    
        <div class="sideName mt-5 p-3 text-center">
            السيد :
            {{ $invoice->trader_name }}
        </div>
    
        <table class="table table-striped invoice-details sales mt-5 text-center">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>اسم المادة</th>
                    <th>سعر الطن بالدولار</th>
                    <th>الوزن</th>
                    <th>اجمالي</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $invoice->goods_type }}</td>
                    <td>$ {{ $invoice->dollar_rate / $invoice->weight }}</td>
                    <td>{{ $invoice->weight }}</td>
                    <td>$ {{ $invoice->dollar_rate }} </td>
                </tr>
            </tbody>
        </table>
        
        <div class="total mt-5 d-flex">
            <div class="d-flex flex-column">
                <h2 class="me-3 p-4 bg-body">المجموع : </h2>
                <h2 class="me-3 p-4 bg-body">أجور الشحن : </h2>
                <h2 class="me-3 p-4 bg-body">الحساب : </h2>
            </div>
            <div class="d-flex flex-column text-start">
                <h2 class="me-3 p-4">{{ $invoice->dollar_rate }} $</h2>
                <h2 class="me-3 p-4">{{ $invoice->shipping_invoices()->sum('shipping_dollar_rate') }} $</h2>
                <h2 class="me-3 p-4">{{ $invoice->dollar_rate + $invoice->shipping_invoices()->sum('shipping_dollar_rate') }} $</h2>
            </div>
        </div>
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
