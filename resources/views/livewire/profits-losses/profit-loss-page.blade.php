<div class="container-fluid itemspage mt-5 ">
    <div>
        <div class="row m-5">
            <div class="d-flex gap-3 justify-content-center buttons mt-5 ">
                <a href="{{ route('profitlosses.material.report') }}" class="btn btn-success btn-lg bg4 p-4 w-50 border-0">كشف المخازن والمواد</a>
                <a href="{{ route('profitlosses.supplierandtrader.account',['trader']) }}" class="btn btn-danger btn-lg p-4 bg4 w-50 border-0">كشف حساب التجار</a>
                <a href="{{ route('profitlosses.supplierandtrader.account',['supplier']) }}" class="btn btn-danger btn-lg p-4 bg4 w-50 border-0">كشف حساب الموردين</a>
            </div>
        </div>

        <div class="row m-5">
            <div class="d-flex gap-3 justify-content-center buttons">
                <a href="{{ route('profitlosses.supplierandtrader.profit',['trader']) }}" class="p-5 btn btn-success btn-lg w-100 bg4 border-0" style="font-size: 250%;"> حساب التاجر</a>
                <a href="{{ route('profitlosses.supplierandtrader.profit',['supplier']) }}" class="p-5 btn btn-success btn-lg w-100 bg4 border-0" style="font-size: 250%;"> حساب المورد</a>
            </div>
        </div>
        
        <div class="row m-5">
            <a href="{{ route('profitlosses.profit.report') }}" class="p-5 btn btn-success btn-lg w-100 bg4 border-0" style="font-size: 250%;"> الارباح</a>
        </div>
    </div>
</div>