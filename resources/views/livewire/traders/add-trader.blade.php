<div class="container-fluid itemspage mt-5">
    @livewire('traders.nav', ['active' => 'add'])
    <div class="row">
        <div class="col mb-3 text-center">
            <label for="traderNameInput" class="form-label">اسم التاجر</label>
            <input type="text" class="form-control" id="traderNameInput" wire:model="traderName">
            @error('traderName')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col mb-3 text-center">
            <label for="traderPhoneInput" class="form-label">رقم الهاتف</label>
            <input type="text" class="form-control" id="traderPhoneInput" wire:model="traderPhone">
            @error('traderPhone')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="traderAddressInput" class="form-label">عنوان التاجر</label>
            <input type="text" class="form-control" id="traderAddressInput" wire:model="traderAddress">
            @error('traderAddress')
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
