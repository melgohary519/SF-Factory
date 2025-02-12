<div class="container-fluid itemspage mt-5">
    <div class="row">

        <div class="col mb-3 text-center">
            <label for="saleDateInput" class="form-label">تاريخ البيع</label>
            <input type="date" class="form-control" id="saleDateInput" wire:model="saleDate">
            @error('saleDate') 
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
                <input type="text" class="form-control" id="weightInput" wire:model="weight" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
            @error('weight') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col mb-3 text-center">
            <label for="traderNameInput" class="form-label">اسم التاجر</label>
            <input type="hidden" wire:model='traderName'>
            <select class="form-select form-select-lg bg4 text-end bg-transparent color-white" id="traderNameInput" wire:model.live="trader">
                <option value="">اختر التاجر</option>
                @foreach($traders as $trader)
                    <option value="{{ $trader->id }}">{{ $trader->name }}</option>
                @endforeach
            </select>
            @error('traderName')
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
        <div class="col mb-3 text-center">
            <label for="traderPhoneInput" class="form-label">رقم هاتف التاجر</label>
            <input type="text" class="form-control" id="traderPhoneInput" wire:model="traderPhone">
            @error('traderPhone') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        
    </div>



    <div class="row">

        <div class="col mb-3 text-center">
            <label for="partnerNameInput" class="form-label">اسم الشريك</label>
            <input type="text" class="form-control" id="partnerNameInput" wire:model="partnerName">
            @error('partnerName') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="col mb-3 text-center">
            <label for="tonPriceInput" class="form-label">سعر الطن</label>
            <input type="number" class="form-control" id="tonPriceInput" wire:model.live="tonPrice">
            @error('tonPrice')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="col mb-3 text-center">
            <label for="salePriceInput" class="form-label">سعر البيع  </label>
            <input type="number" class="form-control" id="salePriceInput" wire:model.live="salePrice" readonly>
            @error('salePrice') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        
    </div>
    <div class="row">
        <div class="col mb-3 text-center">
            <label for="dollarRateInput" class="form-label">قيمة الدولار عند البيع</label>
            <input type="number" class="form-control" id="dollarRateInput" wire:model.live="dollarRate">
            @error('dollarRate') 
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
        
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