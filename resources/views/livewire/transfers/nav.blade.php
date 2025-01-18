<div class="mb-4">
    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
            <a class="nav-link {{$active == "list"  || $active == "" ? 'active' : ''}}" href="{{route('transfers.list')}}">جميع الحوالات</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{$active == "add" ? 'active' : ''}}" aria-current="page" href="{{route('transfers.add')}}">اضافة حوالة</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{$active == "account" ? 'active' : ''}}" aria-current="page" href="{{route('transfers.account')}}"> حساب الحوالات</a>
        </li>
    </ul>
</div>