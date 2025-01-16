<div class="container-fluid itemspage mt-5">
    @livewire('traders.nav', ['active' => 'list'])

    <div class="tableList p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">رقم</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">رقم الهاتف</th>
                    <th scope="col">العنوان</th>
                    <th scope="col">الصفحة الشخصية</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($traders as $trader)
                <tr>
                    <td>{{ $trader->id }}</td>
                    <td>{{ $trader->name }}</td>
                    <td>{{ $trader->phone }}</td>
                    <td>{{ $trader->address }}</td>
                    <td><a href="{{ route('traders.account', $trader) }}">اضغط هنا</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2 pagniateConainer">
        {{ $traders->links() }}
    </div>
</div>
