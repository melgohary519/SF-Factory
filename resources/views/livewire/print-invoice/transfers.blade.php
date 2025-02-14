<div class="print-invoice position-relative">
    <div class="invoice-content  p-3 mt-5 ">
        <div class="invoice-header d-flex mt-3">
            <div class="invoice-header-right w-50 align-self-center">
                <h1 class="pb-5" style="color: blueviolet">{{$invoiceLabels['invoice_title']}}</h1>
                <table class="w-100 text-center">
                    <thead>
                        <tr>
                            <th>{{$invoiceLabels['number']}}</th>
                            <td>{{ $invoice->id }}</td>
                        </tr>
                        <tr>
                            <th>{{$invoiceLabels['date']}}</th>
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
                        <th class="w-50">{{$invoiceLabels['amount_iqd']}} </th>
                        <td>{{ $invoice->amount }}</td>
                    </tr>
                    <tr>
                        <th class="w-50"> {{$invoiceLabels['amount_usd']}}</th>
                        <td>{{ $invoice->dollar_rate }}</td>
                    </tr>
                    <tr>
                        <th class="text-white" style=" background: #663399">{{$invoiceLabels['usd_value']}}   </th>
                        <td class="text-white" style=" background: #663399">{{ $invoice->dollar_value }}</td>
                    </tr>
                </thead>
            </table>


            <table class="table table-striped mt-5 text-center" style="margin-top: 40px !important">
                <thead>
                    <tr>
                        <th class="w-50">{{ $invoiceLabels['reason'] }}</th>
                        <td>{{ $invoice->reason }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">
                            {{$invoiceLabels['type']}}
                        </th>
                        <td>{{ $invoice->type }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">
                            {{$invoiceLabels['recipient_name']}}
                        </th>
                        <td>{{ $invoice->recipient_name }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">
                            {{$invoiceLabels['recipient_phone']}}
                        </th>
                        <td>{{ $invoice->recipient_phone }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">
                            {{$invoiceLabels['person_name']}}
                        </th>
                        <td>{{ $invoice->person_name }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">
                            {{$invoiceLabels['person_phone']}}
                        </th>
                        <td>{{ $invoice->person_phone }}</td>
                    </tr>
                    <tr>
                        <th class="w-50">
                            {{$invoiceLabels['person_address']}}
                        </th>
                        <td>{{ $invoice->person_address }}</td>
                    </tr>
                    
                </thead>
            </table>

            <div class="float-start ms-5 w-25">
                <img class="img-fluid" src="{{asset('images/signature.png')}}" alt="signature" srcset="">
            </div>


            





        <div class="bookmarks"></div>
    </div>

    <div class="footer sales w-100 position-absolute bottom-0 d-flex justify-content-between mt-5 p-3" >
        <div>
            {{ $invoiceLabels['address'] }}
        </div>
        <div dir="ltr">
            {{ $invoiceLabels['phone'] }}
        </div>
    </div>

    <livewire:components.auto-print-invoice />
</div>
