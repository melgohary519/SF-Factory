<div class="container-fluid itemspage mt-5" >
    @livewire("items.nav")
    <div class="row">

        <div class="col mb-3 text-center">
            <label for="purchaseDateInput" class="form-label">تاريخ الشراء</label>
            <input type="date" class="form-control" id="purchaseDateInput" wire:model="purchaseDate">
            @error('purchaseDate') 
            <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col mb-3 text-center">
            <label for="goodsTypeInput" class="form-label">نوع البضاعة</label>
            <input type="text" class="form-control" id="goodsTypeInput" wire:model="goodsType">
            @error('goodsType') 
            <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col mb-3 text-center">
            <label for="weightInput" class="form-label">الوزن</label>
            <div class="input-group">
                <span class="input-group-text rounded-start-0 rounded-end" id="basic-addon2">KG</span>
                <input type="number" class="form-control" id="weightInput" wire:model="weight" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            @error('weight') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row justify-content-center">

        <div class="col mb-3 text-center">
            <label for="InventoryNameInput" class="form-label">اسم المخزن</label>
            <input type="text" class="form-control" id="InventoryNameInput" wire:model="inventoryName">
            @error('inventoryName') 
            <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col mb-3 text-center">
            <label for="supplierNameInput" class="form-label">اسم المورد</label>
            <input type="hidden" wire:model='supplierName'>
            <select class="form-select form-select-lg bg4 text-end bg-transparent color-white" id="supplierNameInput" wire:model.live="supplier">
                <option value="">اختر المورد</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
            @error('supplierName')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="partnerNameInput" class="form-label">اسم الشريك</label>
            <input type="text" class="form-control" id="partnerNameInput" wire:model="partnerName">
            @error('partnerName') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">

        <div class="col mb-3 text-center">
            <label for="tonPriceInput" class="form-label">سعر الطن</label>
            <input type="number" class="form-control" id="tonPriceInput" wire:model.live="tonPrice">
            @error('tonPrice')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col mb-3 text-center">
            <label for="purchasePriceInput" class="form-label">سعر الشراء</label>
            <input type="number" class="form-control" id="purchasePriceInput" wire:model.live="purchasePrice" readonly>
            @error('purchasePrice') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="dollarRateInput" class="form-label">قيمة الدولار</label>
            <input type="number" class="form-control" id="dollarRateInput" wire:model.live="dollarRate">
            @error('dollarRate') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
        <div class="row">
        <div class="col mb-3 text-center">
            <label for="dollarValueInput" class="form-label">سعر الدولار</label>
            <input type="number" class="form-control" readonly id="dollarValueInput" wire:model.live="dollarValue">
            @error('dollarValue') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        
        <div class="col mb-3 text-center">
            <label for="paymentInput" class="form-label">الدفع</label>
            <div class="d-flex justify-content-around">
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="radio" name="paymentType" id="flexRadioDefault2" wire:model="paymentType" value="cash" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        نقدي
                    </label>
                </div>
                <div class="form-check form-check-reverse">
                    <input class="form-check-input" type="radio" name="paymentType" id="flexRadioDefault1" wire:model="paymentType" value="credit">
                    <label class="form-check-label" for="flexRadioDefault1">
                        مؤجل
                    </label>
                </div>
            </div>
            @error('paymentType') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="d-flex gap-3 justify-content-center buttons mt-5">
        <button type="button" class="btn btn-success btn-lg p-4 w-25" wire:click="saveData">تأكيد</button>
        <button type="button" class="btn btn-danger btn-lg p-4 w-25" wire:click="clearForm">افراغ / حذف</button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
