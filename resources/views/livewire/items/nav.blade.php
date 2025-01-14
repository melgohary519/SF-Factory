<div class="mb-4">
    <ul class="nav nav-pills nav-justified">
        <li class="nav-item">
          <a class="nav-link {{$active == "" ? 'active' : ''}}" aria-current="page" href="{{route('items.add')}}">اضافة فاتورة مواد</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link {{$active == "list" ? 'active' : ''}}" href="{{route('items.list')}}">جميع المواد</a>
        </li>
      </ul>
</div>
