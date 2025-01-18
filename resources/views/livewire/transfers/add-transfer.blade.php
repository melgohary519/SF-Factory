<div class="container-fluid itemspage mt-5">
    @livewire('transfers.nav', ['active' => 'add'])
    <div class="row">
        <div class="col mb-3 text-center">
            <label for="transferDateInput" class="form-label">تاريخ التحويل</label>
            <input type="date" class="form-control" id="transferDateInput" wire:model="transferDate">
            @error('transferDate') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="reasonInput" class="form-label">سبب الحوالة</label>
            <input type="text" class="form-control" id="reasonInput" wire:model="reason">
            @error('reason') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="transferTypeInput" class="form-label">نوع الحوالة</label>
            <input type="text" class="form-control" id="transferTypeInput" wire:model="type">
            @error('type') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="personTypeInput" class="form-label">نوع الشخص</label>
            <select class="form-select form-select-lg bg4 text-end bg-transparent color-white " id="persontypeInput" wire:model.live="personType">
                <option value="">اختر نوع الشخص</option>
                <option value="supplier">مورد</option>
                <option value="trader">تاجر</option>
            </select>
            @error('personType') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row">
        <div class="col mb-3 text-center">
            <label for="amountInput" class="form-label">المبلغ</label>
            <input type="number" class="form-control" id="amountInput" wire:model="amount">
            @error('amount') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="dollarRateInput" class="form-label">سعر الدولار</label>
            <input type="number" class="form-control" id="dollarRateInput" wire:model.live="dollarRate">
            @error('dollarRate') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="dollarValueInput" class="form-label">قيمة الدولار</label>
            <input type="number" class="form-control" readonly id="dollarValueInput" wire:model.live="dollarValue">
            @error('dollarValue') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col mb-3 text-center">
            <label for="personNameInput" class="form-label bg1">الاسم </label>
            <input type="hidden" wire:model='personName' readonly>
            <select class="form-select form-select-lg bg4 text-end bg-transparent color-white " id="personNameInput" wire:model.live="personId">
                @if ($personType == "supplier")
                    <option value="">اختر المورد</option>
                    @foreach(\App\Models\Supplier::all() as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach     
                @endif
                @if ($personType == "trader")
                    <option value="">اختر التاجر</option>
                    @foreach(\App\Models\Trader::all() as $trader)
                        <option value="{{ $trader->id }}">{{ $trader->name }}</option>
                    @endforeach     
                @endif
            </select>

            @error('personName') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="personAddressInput" class="form-label bg1">العنوان</label>
            <input type="text" class="form-control" id="personAddressInput" wire:model="personAddress" readonly>
            @error('personAddress') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="personPhoneInput" class="form-label bg1">رقم الهاتف </label>
            <input type="text" class="form-control" id="personPhoneInput" wire:model="personPhone" readonly>
            @error('personPhone') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col mb-3 text-center">
            <label for="recipientNameInput" class="form-label">اسم المستلم</label>
            <input type="text" class="form-control" id="recipientNameInput" wire:model="recipientName">
            @error('recipientName') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="recipientPhoneInput" class="form-label">رقم هاتف المستلم</label>
            <input type="text" class="form-control" id="recipientPhoneInput" wire:model="recipientPhone">
            @error('recipientPhone') 
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