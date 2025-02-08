<div class="container-fluid itemspage mt-5">



    <div class="tableList p-3 ">
        <form class="row g-3 mt-4 ms-3 me-3">

            <label for="fromDate" class="d-flex align-items-center col form-label p-0">من تاريخ</label>
            <input type="date" wire:model.live="fromDate" class="col form-control p-0 m-2" id="fromDate"
                placeholder="من تاريخ">

            <label for="toDate" class="d-flex align-items-center col form-label p-0 m-0">الي تاريخ</label>
            <input type="date" wire:model.live="toDate" class="col form-control p-0 m-2" id="toDate"
                placeholder="الي تاريخ">

            <label for="itemType" class="d-flex align-items-center col form-label p-0 m-0">نوع البضاعة</label>
            <select wire:model.live="itemType" class="col form-control p-0 m-2" id="itemType">
                <option value="">  الجميع</option>
                @foreach($itemTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->goods_type }}</option>
                @endforeach
            </select>


        </form>

        <div class="containerGrroup mt-5">
            <div class="row">
                <div class="col-4">سعر الشراء بالعراقي</div>
                <div class="col highlight">{{ number_format($purchasePriceIraqy, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">سعر الشراء بالدولار</div>
                <div class="col highlight">{{ number_format($purchasePriceDollary, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">سعر البيع بالعراقي</div>
                <div class="col highlight">{{ number_format($salePriceIraqy, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">سعر البيع بالدولار</div>
                <div class="col highlight">{{ number_format($salePriceDollary, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">المصاريف بالعراقي</div>
                <div class="col highlight">{{ number_format($expensesIraqy, 2, '.', ',') }}</div>
            </div>
            <div class="row">
                <div class="col-4">المصاريف بالدولار</div>
                <div class="col highlight">{{ number_format($expensesDollary, 2, '.', ',') }}</div>
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

    </div>


</div>
