<div class="container-fluid itemspage mt-5">


    @if ($type != "total")

    <div class="row text-center">
        <select wire:model.live="selectedPersonId"
            class="text-center col align-content-center bg6 form-select form-select-lg border-0 text-end color-white">
            <option value="">اختر الاسم</option>
            @foreach ($select_options as $item)
            <option value="{{ $item->id }}">
                {{ $item->name }}
            </option>
            @endforeach
        </select>
    </div>

    @endif

    <div class="tableList p-3 ">
        <form class="row g-3 mt-4 ms-3 me-3">

            <label for="fromDate" class="col form-label p-0 m-0">من تاريخ</label>
            <input type="date" wire:model.live="fromDate" class="col form-control p-0 m-0" id="fromDate"
                placeholder="من تاريخ">

            <label for="toDate" class="col form-label p-0 m-0">الي تاريخ</label>
            <input type="date" wire:model.live="toDate" class="col form-control p-0 m-0" id="toDate"
                placeholder="الي تاريخ">
        </form>
        <table class="table mt-5">
            @if ($type == "total")
                <thead>
                    <tr>
                        <th scope="col">النوع</th>
                        <th scope="col">الحوالة - عراقي</th>
                        <th scope="col"> الحوالة - دولار  </th>
                        <th scope="col">الباقي - عراقي</th>
                        <th scope="col"> الباقي - دولار  </th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <th>موردين</th>
                        <td style="background-color: #530C7F !important;">{{ number_format($totalSupplierTransferIraqy,2,'.',',') }}</td>
                        <td style="background-color: #530C7F !important;">$ {{ number_format($totalSupplierTransferDolary,2,'.',',') }}</td>
                        <td style="background-color: #530C7F !important;">{{ number_format($totalSupplierRestIraqy,2,'.',',') }}</td>
                        <td style="background-color: #530C7F !important;">$ {{ number_format($totalSupplierResyDolary,2,'.',',') }}</td>
                    </tr>
                    <tr>
                        <th>تجار </th>
                        <td style="background-color: #530C7F !important;">{{ number_format($totalTraderTransferIraqy,2,'.',',') }}</td>
                        <td style="background-color: #530C7F !important;">$ {{ number_format($totalTraderTransferDolary,2,'.',',') }}</td>
                        <td style="background-color: #530C7F !important;">{{ number_format($totalTraderRestIraqy,2,'.',',') }}</td>
                        <td style="background-color: #530C7F !important;">$ {{ number_format($totalTraderResyDolary,2,'.',',') }}</td>
                    </tr>
                </tbody>
            @else
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">عراقي</th>
                    <th scope="col">دولار</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <th>السعر</th>
                    <td style="background-color: #530C7F !important;">{{number_format($priceIraqy,2,'.',',') }}</td>
                    <td style="background-color: #530C7F !important;">$ {{number_format($priceDollary,2,'.',',') }}</td>
                </tr>
                <tr>
                    <th>المبلغ المحول</th>
                    <td style="background-color: #530C7F !important;">{{number_format($transferIraqy,2,'.',',') }}</td>
                    <td style="background-color: #530C7F !important;">$ {{number_format($transferDollary,2,'.',',') }}</td>
                </tr>
                <tr>
                    <th>الباقي</th>
                    <td style="background-color: #530C7F !important;">{{number_format($restIraqy,2,'.',',')  }}</td>
                    <td style="background-color: #530C7F !important;">$ {{number_format($restDollary,2,'.',',')  }}</td>
                </tr>

            </tbody>
            @endif
        </table>


        <div class="row m-5">
            <div class="d-flex flex-column gap-3 justify-content-center ">
                @if ($type == "suppliers")
                <div class="row justify-content-center">
                    <a style="background-color: #272E3A !important"
                    href="{{route('transfers.account.details','suppliers')}}" class="p-3 rounded bg4 w-25">عرض فواتير
                    الشراء</a>
                <a style="background-color: #272E3A !important" href="{{route('transfers.account.details','traders')}}"
                    class="p-3 rounded bg4 w-25">عرض فواتير الحوالات </a>
                </div>
                @endif

                @if ($type == "traders")
                <div class="row justify-content-center">
                    <a style="background-color: #272E3A !important"
                    href="{{route('transfers.account.details','suppliers')}}" class="p-3 rounded bg4 w-25">عرض فواتير
                    البيع</a>
                <a style="background-color: #272E3A !important" href="{{route('transfers.account.details','traders')}}"
                    class="p-3 rounded bg4 w-25">عرض فواتير الحوالات </a>
                </div>
                @endif
                @if ($type == "total")
                <div class="row justify-content-center" >
                    <a style="background-color: #272E3A !important"
                        href="{{route('transfers.account.details','suppliers')}}" class="p-3 rounded bg4 w-25">
                        عرض فواتير الشراء من الموردين
                        </a>
                    <a style="background-color: #272E3A !important"
                        href="{{route('transfers.account.details','traders')}}" class="p-3 rounded bg4 w-25">
                        عرض فواتير حوالات الموردين
                     </a>
                </div>
                <div class="row justify-content-center">
                    <a style="background-color: #272E3A !important"
                        href="{{route('transfers.account.details','suppliers')}}" class="p-3 rounded bg4 w-25">
                        عرض فواتير البيع للتجار
                    </a>
                    <a style="background-color: #272E3A !important"
                        href="{{route('transfers.account.details','traders')}}" class="p-3 rounded bg4 w-25">
                        عرض فواتير حوالات التجار
                     </a>
                </div>

                @endif
            </div>
        </div>
    </div>


</div>
