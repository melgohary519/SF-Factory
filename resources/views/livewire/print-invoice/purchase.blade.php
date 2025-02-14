<div class="print-invoice position-relative">
    <div class="invoice-content  p-3 mt-5 ">
        <div class="invoice-header d-flex mt-3">
            <div class="invoice-header-right w-50 align-self-center">
                <h1 class="pb-5">
                    {{$invoiceLabels['invoice_title']}}
                </h1>
                <table class="w-100 text-center">
                    <thead>
                        <tr>
                            <th>{{$invoiceLabels['number']}}</th>
                            <td>{{ $invoice->id }}</td>
                        </tr>
                        <tr>
                            <th>{{$invoiceLabels['date']}}</th>
                            <td>{{ $invoice->purchase_date }}</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="invoice-header-left w-50 d-flex justify-content-center align-items-center">
                <img  src="{{ asset('images/invoice_logo.png') }}" alt="logo"
                    class="img-thumbnail rounded">
            </div>
        </div>
    
    
        <div class="sideName mt-5 p-3 text-center">
            {{$invoiceLabels['mr']}}
            {{ $invoice->supplier_name }}
        </div>
    
        <table class="table table-striped invoice-details mt-5 text-center">
            <thead>
                <tr>
                    <th>SL.</th>
                    <th>{{ $invoiceLabels['product_name'] }}</th>
                    <th>{{ $invoiceLabels['ton_price'] }}</th>
                    <th>{{ $invoiceLabels['weight'] }}</th>
                    <th>{{ $invoiceLabels['total'] }}</th>
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
                <h2 class="me-3 p-4 bg-body">{{ $invoiceLabels['total2'] }}</h2>
                <h2 class="me-3 p-4 bg-body">{{ $invoiceLabels['shipp'] }}</h2>
                <h2 class="me-3 p-4 bg-body">{{ $invoiceLabels['total_amount'] }}</h2>
            </div>
            <div class="d-flex flex-column text-start">
                <h2 class="me-3 p-4">{{ $invoice->dollar_rate }} $</h2>
                <h2 class="me-3 p-4">{{ $invoice->shipping_invoices()->sum('shipping_dollar_rate') }} $</h2>
                <h2 class="me-3 p-4">{{ $invoice->dollar_rate + $invoice->shipping_invoices()->sum('shipping_dollar_rate') }}$</h2>
            </div>
        </div>
        <div class="bookmarks"></div>

        <div class="float-start ms-5 w-25 mt-3">
            <img class="img-fluid" src="{{asset('images/signature.png')}}" alt="signature" srcset="">
        </div>
    </div>

    <div class="footer w-100 position-absolute bottom-0 d-flex justify-content-between mt-5 p-3" >
        <div>
            {{ $invoiceLabels['address'] }}
        </div>
        <div dir="ltr">
            {{ $invoiceLabels['phone'] }}
        </div>
    </div>
    <livewire:components.auto-print-invoice />
</div>
