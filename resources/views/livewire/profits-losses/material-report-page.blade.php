<div class="container-fluid itemspage mt-5">



    <div class="tableList p-3 ">
        <form class="row g-3 mt-4 ms-3 me-3">

            <div class="col-2">
                <label for="fromDate" class="d-flex align-items-center col form-label p-0">من تاريخ</label>
                <input type="date" wire:model.live="fromDate" class="col form-control p-0 m-2" id="fromDate"
                    placeholder="من تاريخ">
            </div>

            <div class="col-2">
                <label for="toDate" class="d-flex align-items-center col form-label p-0 m-0">الي تاريخ</label>
                <input type="date" wire:model.live="toDate" class="col form-control p-0 m-2" id="toDate"
                    placeholder="الي تاريخ">
            </div>

            <div class="col-2">
                <label for="item" class="d-flex align-items-center col form-label p-0 m-0">نوع البضاعة</label>
                <select wire:model.live="item" class="col form-control p-0 m-2" id="itemType">
                    <option value=""> الجميع</option>
                    @foreach ($items as $type)
                        <option value="{{ $type->id }}">{{ $type->goods_type }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-2">
                <label for="partnerNameInput" class="d-flex align-items-center col form-label p-0">اسم الشريك</label>
                <select class="col form-control p-0 m-2" wire:model.live="partnerName">
                    <option value="%">اختار الشريك</option>
                    @foreach ($partnerList as $item)
                        <option value="{{ $item->partner_name }}">{{ $item->partner_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-2">
                <label for="inventoryNameInput" class="d-flex align-items-center col form-label p-0">اسم المخزن</label>
                <select class="col form-control p-0 m-2" id="inventoryNameSelect" wire:model.live="inventoryName">
                    <option value="%">اختار المخزن</option>
                    @foreach ($inventoryList as $item)
                        <option value="{{ $item->inventory_name }}">{{ $item->inventory_name }}</option>
                    @endforeach
                </select>
            </div>


        </form>

        <div class="containerGrroup mt-5">

            <div class="row">
                <div class="col-4">نوع البضاعة = </div>
                <div class="col highlight">{{ $selectedItemName == "%" ? "الجميع" : $selectedItemName }}</div>
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

        
            <div class="row m-5">
                <div class="d-flex flex-column gap-3 justify-content-center ">
                        <div class="row justify-content-center">
                            @if ($fromDate != null && $toDate != null)  
                                <a href="#" style="background-color: #272E3A !important" class="p-3 rounded bg4 w-25" wire:click="exportData">طباعة كشف</a>   
                            @endif
                        </div>
                </div>
            </div>
    </div>



</div>
