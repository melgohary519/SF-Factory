<div class="homepage mt-5 text-center">
    <div class="row mb-3 g-3">

        <div class="col">
            <a style="all:inherit;cursor: pointer;" href="{{ route('expenses.add') }}">
                <img src="{{ asset('images/icons/3.png') }}" class="img-thumbnail" alt="...">
                <span>الصرفيات</span>
            </a>
        </div>

        <div class="col">
            <a style="all:inherit;cursor: pointer;" href="{{ route('shipping.add') }}">
                <img src="{{ asset('images/icons/1.png') }}" class="img-thumbnail" alt="...">
                <span>فواتير الشحن</span>
            </a>
        </div>
        <div class="col">
            <a style="all:inherit;cursor: pointer;" href="{{ route('sales.invoice.add') }}">
                <img src="{{ asset('images/icons/6.png') }}" class="img-thumbnail" alt="...">
                <span>فواتير البيع</span>
            </a>
        </div>
        <div class="col p-3">
            <a style="all:inherit;cursor: pointer;" href="{{ route('purchase.invoice.add') }}">
                <img src="{{ asset('images/icons/9.png') }}" class="img-thumbnail" alt="...">
                <span>فواتير الشراء</span>
            </a>
        </div>
        
    </div>

    <div class="row mb-3">
        <div class="col">
            <a style="all:inherit;cursor: pointer;" href="{{ route('transfers.list') }}">
                <img src="{{ asset('images/icons/7.png') }}" class="img-thumbnail" alt="...">
                <span>الحوالات</span>
            </a>
        </div>
        <div class="col">
            <a style="all:inherit;cursor: pointer;" href="{{ route('profitlosses.page') }}">
                <img src="{{ asset('images/icons/5.png') }}" class="img-thumbnail" alt="...">
                <span>الارباح</span>
            </a>
        </div>
    </div>

    <div class="row mb-3">
        
        <div class="col">
            <a style="all:inherit;cursor: pointer;" href="{{ route('items.list') }}">
                <img src="{{ asset('images/icons/2.png') }}" class="img-thumbnail" alt="...">
                <span>المواد</span>
            </a>
        </div>
        <div class="col">
            <a style="all:inherit;cursor: pointer;" href="{{ route('traders.add') }}">
                <img src="{{ asset('images/icons/4.png') }}" class="img-thumbnail" alt="...">
                <span>التجار</span>
            </a>
        </div>
        <div class="col">
            <a style="all:inherit;cursor: pointer;" href="{{ route('suppliers.list') }}">
                <img src="{{ asset('images/icons/8.png') }}" class="img-thumbnail" alt="...">
                <span>الموردين</span>
            </a>
        </div>
        
    </div>
</div>