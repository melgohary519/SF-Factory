<div class="container-fluid itemspage mt-5">
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
            <select class="form-select form-select-lg bg4 text-end bg-transparent color-white" id="goodsTypeInput" wire:model="goodsType">
                <option value="">اختر نوع البضاعة</option>
                @foreach($items as $item)
                    <option value="{{ $item->id }}">{{ $item->goods_type }}</option>
                @endforeach
            </select>
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
            <label for="supplierNameInput" class="form-label">اسم المورد</label>
            <input type="hidden" wire:model='supplierName'>
            <select class="form-select form-select-lg bg4 text-end bg-transparent color-white " id="supplierNameInput" wire:model.live="supplier">
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
            <label for="supplierPhoneInput" class="form-label">رقم هاتف المورد</label>
            <input type="text" class="form-control" id="supplierPhoneInput" wire:model="supplierPhone" readonly>
            @error('supplierPhone')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="supplierAddressInput" class="form-label">عنوان المورد</label>
            <input type="text" class="form-control" id="supplierAddressInput" wire:model="supplierAddress" readonly>
            @error('supplierAddress')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        
    </div>

    <div class="row justify-content-center">
        <div class="col mb-3 text-center">
            <label for="partnerNameInput" class="form-label">اسم الشريك</label>
            <input type="text" class="form-control" id="partnerNameInput" wire:model="partnerName">
            @error('partnerName')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
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

    <div class="row justify-content-center">
        <div class="col mb-3 text-center">
            <label for="shippingFeeInput" class="form-label">تكلفة الشحن</label>
            <input type="number" step="0.01" class="form-control" id="shippingFeeInput" wire:model.live="shipping_fee">
            @error('shipping_fee')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="shippingDollarRateInput" class="form-label">سعر دولار الشحن</label>
            <input type="number" step="0.01" class="form-control" id="shippingDollarRateInput" wire:model.live="shipping_dollar_rate">
            @error('shipping_dollar_rate')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="shippingDollarValueInput" class="form-label">قيمة دولار الشحن</label>
            <input type="number" step="0.01" class="form-control" id="shippingDollarValueInput" wire:model="shipping_dollar_value">
            @error('shipping_dollar_value')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        
    </div>

    <div class="row justify-content-center">
        <div class="col mb-3 text-center">
            <label for="purchasePriceInput" class="form-label">سعر الشراء </label>
            <input type="number" class="form-control" id="purchasePriceInput" wire:model.live="purchasePrice">
            @error('purchasePrice')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="dollarRateInput" class="form-label">قيمة الدولار عند الشراء</label>
            <input type="number" class="form-control" id="dollarRateInput" wire:model.live="dollarRate">
            @error('dollarRate')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col mb-3 text-center">
            <label for="dollarValueInput" class="form-label">سعر الدولار عند الشراء</label>
            <input type="number" class="form-control" readonly id="dollarValueInput" wire:model="dollarValue">
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
