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
        <div class="row">
            <div class="col-md-1">كيمة المواد</div>
            <div class="col-md-1">سعر عراقي</div>
            <div class="col-md-1">سعر دولار</div>
            <div class="col-md-1">حوالة عراقي</div>
            <div class="col-md-1">حوالة دولار</div>
            <div class="col-md-1"></div>
            <div class="col-md-1">الباقي بالعراقي</div>
            <div class="col-md-1">الباقي بالدولار</div>
        </div>
        <div class="row">
            <div class="col-md-1">10 </div>
            <div class="col-md-1" style="background-color: #530C7F !important;">{{
                number_format($priceIraqy,2,'.',',') }}</div>
            <div class="col-md-1" style="background-color: #530C7F !important;">$ {{
                number_format($priceDollary,2,'.',',') }}</div>
            <div class="col-md-1" style="background-color: #530C7F !important;">{{
                number_format($transferIraqy,2,'.',',')
                }}</div>
            <div class="col-md-1" style="background-color: #530C7F !important;">$ {{
                number_format($priceDollary,2,'.',',') }}</div>
            <div class="col-md-1"></div>
            <div class="col-md-1" style="background-color: #530C7F !important;">$ {{
                number_format($priceDollary,2,'.',',') }}</div>
            <div class="col-md-1" style="background-color: #530C7F !important;">
            </div>
        </div>
        <table class="table mt-5">
            <thead>
                <tr>
                    <th scope="col">كيمة المواد</th>
                    <th scope="col">سعر عراقي</th>
                    <th scope="col">سعر دولار</th>
                    <th scope="col">حوالة عراقي</th>
                    <th scope="col">حوالة دولار</th>
                    <th scope="col"></th>
                    <th scope="col">الباقي بالعراقي</th>
                    <th scope="col">الباقي بالدولار</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>10 </td>
                    <td style="background-color: #530C7F !important;">{{
                        number_format($priceIraqy,2,'.',',') }}</td>

                    <td style="background-color: #530C7F !important;">$ {{
                        number_format($priceDollary,2,'.',',') }}</td>

                    <td style="background-color: #530C7F !important;">{{ number_format($transferIraqy,2,'.',',')
                        }}</td>

                    <td style="background-color: #530C7F !important;">$ {{
                        number_format($priceDollary,2,'.',',') }}</td>


                    <td></td>


                    <td style="background-color: #530C7F !important;">$ {{
                        number_format($priceDollary,2,'.',',') }}</td>
                    <td style="background-color: #530C7F !important;">$ {{
                        number_format($priceDollary,2,'.',',') }}</td>
                </tr>
            </tbody>
        </table>


        <div class="row m-5">
            <div class="d-flex flex-column gap-3 justify-content-center ">
                @if ($type == "suppliers")
                <div class="row justify-content-center">
                    <a style="background-color: #272E3A !important"
                        href="{{route('transfers.account.details','suppliers')}}" class="p-3 rounded bg4 w-25">عرض
                        فواتير
                        الشراء</a>
                    <a style="background-color: #272E3A !important"
                        href="{{route('transfers.account.details','traders')}}" class="p-3 rounded bg4 w-25">عرض
                        فواتير
                        الحوالات </a>
                </div>
                @endif

                @if ($type == "traders")
                <div class="row justify-content-center">
                    <a style="background-color: #272E3A !important"
                        href="{{route('transfers.account.details','suppliers')}}" class="p-3 rounded bg4 w-25">عرض
                        فواتير
                        البيع</a>
                    <a style="background-color: #272E3A !important"
                        href="{{route('transfers.account.details','traders')}}" class="p-3 rounded bg4 w-25">عرض
                        فواتير
                        الحوالات </a>
                </div>
                @endif

            </div>
        </div>
    </div>


</div>