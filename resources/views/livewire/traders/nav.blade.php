<div class="mb-4">
    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
            <a class="nav-link {{$active == "list"  || $active == "" ? 'active' : ''}}" href="{{route('traders.list')}}">جميع التجار</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{$active == "add" ? 'active' : ''}}" aria-current="page" href="{{route('traders.add')}}">اضافة تاجر</a>
        </li>
    </ul>
</div>
