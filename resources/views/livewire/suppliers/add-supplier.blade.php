<div class="container-fluid itemspage mt-5">
    @livewire('suppliers.nav', ['active' => 'add'])
    
    <div class="row">

        <div class="col mb-3 text-center">
            <label for="supplierNameInput" class="form-label">اسم المورد</label>
            <input type="text" class="form-control" id="supplierNameInput" wire:model="supplierName">
            @error('supplierName')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

       

        <div class="col mb-3 text-center">
            <label for="supplierPhoneInput" class="form-label">رقم الهاتف</label>
            <input type="text" class="form-control" id="supplierPhoneInput" wire:model="supplierPhone">
            @error('supplierPhone')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="supplierAddressInput" class="form-label">عنوان المورد</label>
            <input type="text" class="form-control" id="supplierAddressInput" wire:model="supplierAddress">
            @error('supplierAddress')
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
