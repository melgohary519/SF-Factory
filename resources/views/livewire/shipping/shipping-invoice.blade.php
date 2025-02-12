<div class="container-fluid itemspage mt-5">

        <div class="row">

            <div class="col mb-3 text-center">
                <label for="invoiceTypeSelect" class="form-label">نوع الفاتورة</label>
                <select class="form-select form-select-lg bg4 text-end bg-transparent color-white" id="invoiceTypeSelect"
                    wire:model="type">
                    <option value="">اختر نوع الفاتورة</option>
                    <option value="sales">بيع</option>
                    <option value="purchase">شراء</option>
                </select>
                @error('type')
                    <div class="bg-warning p-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col mb-3 text-center">
                <label for="invoiceNumberInput" class="form-label">رقم الفاتورة</label>
                <input type="number" class="form-control" id="invoiceNumberInput" wire:model="invoice_number">
                @error('invoice_number')
                    <div class="bg-warning p-2 text-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="row">
            <div class="col mb-3 text-center">
                <label for="shippingFeeInput" class="form-label">تكلفة الشحن</label>
                <input type="number" class="form-control" id="shippingFeeInput" wire:model.live="shipping_fee">
                @error('shipping_fee')
                    <div class="bg-warning p-2 text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3 text-center">
                <label for="shippingDollarRateInput" class="form-label">قيمة دولار الشحن</label>
                <input type="number" class="form-control" id="shippingDollarRateInput"
                    wire:model.live="shipping_dollar_rate">
                @error('shipping_dollar_rate')
                    <div class="bg-warning p-2 text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col mb-3 text-center">
                <label for="shippingDollarValueInput" class="form-label">سعر دولار الشحن</label>
                <input type="number" class="form-control" readonly id="shippingDollarValueInput"
                    wire:model="shipping_dollar_value">
                @error('shipping_dollar_value')
                    <div class="bg-warning p-2 text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="col mb-3 text-center">
                <label for="carOwnerNameInput" class="form-label">اسم صاحب السيارة</label>
                <input type="text" class="form-control" id="carOwnerNameInput" wire:model="car_owner_name">
                @error('car_owner_name')
                    <div class="bg-warning p-2 text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="col mb-3 text-center">
                <label for="carTypeInput" class="form-label">نوع السيارة</label>
                <input type="text" class="form-control" id="carTypeInput" wire:model="car_type">
                @error('car_type')
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
