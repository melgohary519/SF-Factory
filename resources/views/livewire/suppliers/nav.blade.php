<div class="mb-4">
    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
          <a class="nav-link {{$active == "add" ? 'active' : ''}}" aria-current="page" href="{{route('suppliers.add')}}">اضافة مورد</a>
        </li>

        <li class="nav-item">
          <a class="nav-link {{$active == "list"  || $active == "" ? 'active' : ''}}" href="{{route('suppliers.list')}}">جميع الموردين</a>
        </li>
      </ul>
</div>
