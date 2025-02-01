<div class="container-fluid itemspage mt-5">
    <div class="row">

        <div class="col mb-3 text-center">
            <label for="expenseDateInput" class="form-label">تاريخ الصرف</label>
            <input type="date" class="form-control" id="expenseDateInput" wire:model="expenseDate">
            @error('expenseDate')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="purchasePriceInput" class="form-label">سعر الشراء</label>
            <input type="number" class="form-control" id="purchasePriceInput" wire:model.live="purchasePrice" >
            @error('purchasePrice')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col mb-3 text-center">
            <label for="dollarRateInput" class="form-label">قيمة الدولار</label>
            <input type="number" class="form-control" id="dollarRateInput" wire:model.live="dollarRate" >
            @error('dollarRate')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col mb-3 text-center">
            <label for="dollarValueInput" class="form-label">سعر الدولار</label>
            <input type="number" class="form-control" id="dollarValueInput" wire:model="dollarValue" readonly>
            @error('dollarValue')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        

        
    </div>

    <div class="row">
        <div class="col mb-3 text-center ">
            <label for="detailsInput" class="form-label bg1">تفاصيل الشراء</label>
            <textarea class="form-control bg-transparent text-center color-white col" id="detailsInput" rows="3" wire:model="details"></textarea>
            @error('details')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="d-flex gap-3 justify-content-center buttons mt-5">
        <button type="button" class="btn btn-danger btn-lg p-4 w-25" wire:click="clearForm">افراغ / حذف</button>
        <button type="button" class="btn btn-success btn-lg p-4 w-25" wire:click="saveData">تأكيد</button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>
