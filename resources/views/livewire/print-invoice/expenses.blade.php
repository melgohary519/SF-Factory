<div class="print-invoice position-relative">
    <div class="invoice-content  p-3 mt-5 ">
        <div class="invoice-header d-flex mt-3">
            <div class="invoice-header-right w-50 align-self-center">
                <h1 class="pb-5"> {{$invoiceLabels['invoice_title']}}</h1>
                <table class="w-100 text-center">
                    <thead>
                        <tr>
                            <th>{{$invoiceLabels['number']}}</th>
                            <td>{{ $invoice->id }}</td>
                        </tr>
                        <tr>
                            <th>{{$invoiceLabels['date']}}</th>
                            <td>{{ $invoice->expense_date }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="invoice-header-left w-50 d-flex justify-content-center align-items-center">
                <img  src="{{ asset('images/invoice_logo.png  ') }}" alt="logo"
                    class="img-thumbnail rounded">
            </div>
        </div>

            <table class="table table-striped mt-5 text-center" style="margin-top: 90px !important">
                <thead>
                    <tr>
                        <th class="w-50">{{$invoiceLabels['amount_iqd']}} </th>
                        <td>{{ $invoice->purchase_price }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">{{$invoiceLabels['amount_usd']}} </th>
                        <td>{{ $invoice->dollar_rate }}</td>
                    </tr>
                    <tr>
                        <th class="text-white" style=" background: #663399">{{$invoiceLabels['usd_value']}}   </th>
                        <td class="text-white" style=" background: #663399">{{ $invoice->dollar_value }}</td>
                    </tr>
                </thead>
            </table>


            <div class="expense-reson-container position-relative" style="margin-top: 90px !important">>
                <span class="header p-2 pe-5 position-absolute ps-5"> {{$invoiceLabels['expense_reason']}}</span>
                <p class="p-4 text-center">{{$invoice->details}}</p>
            </div>

            <div class="float-start ms-5 w-25 mt-3">
                <img class="img-fluid" src="{{asset('images/signature.png')}}" alt="signature" srcset="">
            </div>





        <div class="bookmarks"></div>
    </div>

    <div class="expense-footer w-100 position-absolute bottom-0 ms-5">
        <hr style="color: black" class="ms-5 me-5">
        <div class="d-flex justify-content-between ms-5 me-5">
            <div>
                {{$invoiceLabels['address1']}}
                <br>
                {{$invoiceLabels['address2']}}
            </div>
            <div dir="ltr">
                {{$invoiceLabels['phone1']}}
                <br>
                {{$invoiceLabels['phone2']}}
            </div>
        </div>
    </div>
    <livewire:components.auto-print-invoice />
</div>
