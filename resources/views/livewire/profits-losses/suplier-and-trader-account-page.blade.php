<div class="container-fluid itemspage mt-5">

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


    <div class="tableList p-3 ">
        <form class="row g-3 mt-4 ms-3 me-3">

            <label for="fromDate" class="d-flex align-items-center col form-label p-0">من تاريخ</label>
            <input type="date" wire:model.live="fromDate" class="col form-control p-0 m-2" id="fromDate"
                placeholder="من تاريخ">

            <label for="toDate" class="d-flex align-items-center col form-label p-0 m-0">الي تاريخ</label>
            <input type="date" wire:model.live="toDate" class="col form-control p-0 m-2" id="toDate"
                placeholder="الي تاريخ">

        </form>

        <div class="containerGrroup mt-5">
            <div class="row">
                <div class="col-4">كمية المواد</div>
                <div class="col highlight">{{$itemsQuantity}}</div>
            </div>
            <div class="row">
                <div class="col-4">سعر عراقي</div>
                <div class="col highlight">{{ number_format($priceIraqy, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">سعر دولار</div>
                <div class="col highlight">{{ number_format($priceDollary, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">حوالة عراقي</div>
                <div class="col highlight">{{ number_format($transferIraqy, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">حوالة دولار</div>
                <div class="col highlight">{{ number_format($priceDollary, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col-4">الباقي بالعراقي</div>
                <div class="col highlight">{{ number_format($restIraqy, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">الباقي بالدولار</div>
                <div class="col highlight">{{ number_format($restDollary, 2, '.', ',') }}</div>
            </div>
        </div>


        <div class="row m-5">
            <div class="d-flex flex-column gap-3 justify-content-center ">
                @if ($type == 'supplier')
                    <div class="row justify-content-center">
                        <a style="background-color: #272E3A !important"
                            href="{{ route('transfers.account.details', 'suppliers') }}"
                            class="p-3 rounded bg4 w-25">عرض
                            فواتير
                            الشراء</a>
                        <a style="background-color: #272E3A !important"
                            href="{{ route('transfers.account.details', 'traders') }}" class="p-3 rounded bg4 w-25">عرض
                            فواتير
                            الحوالات </a>

                            @if ($selectedPersonId != null && $fromDate != null && $toDate != null)  
                                <a href="#" style="background-color: #272E3A !important" class="p-3 rounded bg4 w-25" wire:click="exportData">طباعة كشف</a>   
                            @endif
                    </div>
                @endif

                @if ($type == 'trader')
                    <div class="row justify-content-center">
                        <a style="background-color: #272E3A !important"
                            href="{{ route('transfers.account.details', 'suppliers') }}"
                            class="p-3 rounded bg4 w-25">عرض
                            فواتير
                            بيع الي تجار</a>
                        <a style="background-color: #272E3A !important"
                            href="{{ route('transfers.account.details', 'traders') }}" class="p-3 rounded bg4 w-25">عرض
                            فواتير
                            الحوالات  من التجار</a>

                            <a href="#" style="background-color: #272E3A !important" class="p-3 rounded bg4 w-25" wire:click="exportData">طباعة كشف</a>  
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

            </div>
        </div>
        
    </div>

    

</div>
