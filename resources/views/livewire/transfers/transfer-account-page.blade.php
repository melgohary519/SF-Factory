<div class="container-fluid itemspage mt-5 ">

    @livewire('transfers.nav', ['active' => 'account'])
    <div>
        <div class="row m-5">
            <div class="d-flex gap-3 justify-content-center buttons mt-5 ">
                <a href="{{route('transfers.account.details','suppliers')}}" class="btn btn-success btn-lg p-4 w-50"  >موردين</a>
                <a href="{{route('transfers.account.details','traders')}}" class="btn btn-danger btn-lg p-4 w-50">تجار </a>
            </div>
        </div>
        <div class="row m-5">
            <a href="{{route('transfers.account.details','total')}}" class="btn btn-success btn-lg p-4 w-100 bg4 border-0"  style="font-size: 250%;" >المجموع</a>
        </div>
    </div>

</div>
