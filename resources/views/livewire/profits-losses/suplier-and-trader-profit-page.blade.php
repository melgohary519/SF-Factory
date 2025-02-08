<div class="container-fluid itemspage mt-5">

    <div class="row text-center">
        
    </div>


    <div class="tableList p-3 ">
        <form class="row g-3 mt-4 ms-3 me-3">

            <label for="fromDate" class="d-flex align-items-center col form-label p-0">من تاريخ</label>
            <input type="date" wire:model.live="fromDate" class="col form-control p-0 m-2" id="fromDate"
                placeholder="من تاريخ">

            <label for="toDate" class="d-flex align-items-center col form-label p-0 m-0">الي تاريخ</label>
            <input type="date" wire:model.live="toDate" class="col form-control p-0 m-2" id="toDate"
                placeholder="الي تاريخ">

        </form>        
    </div>

    <div class="tableList table-responsive mt-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>اسم المورد</th>
                    <th>السعر بالعراقي</th>
                    <th>السعر بالدولار</th>
                    <th>التحويل بالعراقي</th>
                    <th>التحويل بالدولار</th>
                    <th>الباقي بالعراقي</th>
                    <th>الباقي بالدولار</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ number_format($item['priceIraqy'], 2, '.', ',') }}</td>
                        <td>{{ number_format($item['priceDollary'], 2, '.', ',') }}</td>
                        <td>{{ number_format($item['transferIraqy'], 2, '.', ',') }}</td>
                        <td>{{ number_format($item['transferDollary'], 2, '.', ',') }}</td>
                        <td>{{ number_format($item['priceIraqy'] - $item['transferIraqy'], 2, '.', ',') }}</td>
                        <td>{{ number_format($item['priceDollary'] - $item['transferDollary'], 2, '.', ',') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="row containerGrroup mt-5">

        <div class="col">
            <div class="row">
                <div class="col-6">مجموع السعر بالعراقي </div>
                <div class="col highlight">{{ number_format($total_priceIraqy, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-6">مجموع السعر بالدولار </div>
                <div class="col highlight">{{ number_format($total_priceDollary, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-6">مجموع التحويل بالعراقي </div>
                <div class="col highlight">{{ number_format($total_transferIraqy, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-6">مجموع التحويل بالدولار </div>
                <div class="col highlight">{{ number_format($total_transferDollary, 2, '.', ',') }}</div>
            </div>
        </div>
        
        <div class="col">
            <div class="row">
                <div class="col-6"> مجموع الباقي بالعراقي </div>
                <div class="col highlight">{{ number_format($total_priceIraqy - $total_transferIraqy, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-6"> مجموع الباقي بالدولار</div>
                <div class="col highlight">{{ number_format($total_priceDollary - $total_transferDollary, 2, '.', ',') }}</div>
            </div>
        </div>
    </div>


</div>
