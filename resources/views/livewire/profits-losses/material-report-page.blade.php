<div class="container-fluid itemspage mt-5">



    <div class="tableList p-3 ">
        <form class="row g-3 mt-4 ms-3 me-3">

            <label for="fromDate" class="d-flex align-items-center col form-label p-0">من تاريخ</label>
            <input type="date" wire:model.live="fromDate" class="col form-control p-0 m-2" id="fromDate"
                placeholder="من تاريخ">

            <label for="toDate" class="d-flex align-items-center col form-label p-0 m-0">الي تاريخ</label>
            <input type="date" wire:model.live="toDate" class="col form-control p-0 m-2" id="toDate"
                placeholder="الي تاريخ">

            <label for="item" class="d-flex align-items-center col form-label p-0 m-0">نوع البضاعة</label>
            <select wire:model.live="item" class="col form-control p-0 m-2" id="itemType">
                <option value="">  الجميع</option>
                @foreach($items as $type)
                    <option value="{{ $type->id }}">{{ $type->goods_type }}</option>
                @endforeach
            </select>


        </form>

        <div class="containerGrroup mt-5">
            
            <div class="row">
                <div class="col-4">نوع البضاعة = </div>
                <div class="col highlight">{{ $selectedItemName }}</div>
            </div>
            <div class="row">
                <div class="col-4">الكمية = </div>
                <div class="col highlight">{{ $purchaseQuantity }}</div>
            </div>
            <div class="row">
                <div class="col-4">كمية البضاعة المباعة = </div>
                <div class="col highlight">{{ $salesQuantity }}</div>
            </div>
            <div class="row">
                <div class="col-4">كمية البضاعة المتبقية في المخزن = </div>
                <div class="col highlight">{{ $remainingStock }}</div>
            </div>
        </div>

    </div>


</div>
