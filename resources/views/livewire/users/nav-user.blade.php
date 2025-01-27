<div class="mb-4">
    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
            <a class="nav-link {{$active == "list"  || $active == "" ? 'active' : ''}}" href="{{route('users.list')}}">جميع المستخدمين</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{$active == "add" ? 'active' : ''}}" aria-current="page" href="{{route('users.add')}}">اضافة مستخدم</a>
        </li>
    </ul>
</div>