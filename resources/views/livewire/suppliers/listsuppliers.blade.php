<div class="container-fluid itemspage mt-5">
    @livewire('suppliers.nav', ['active' => 'list'])


    <div class="tableList p-3 ">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> الصفحة الشخصية </th>
                    <th scope="col"> العنوان </th>
                    <th scope="col"> رقم الهاتف</th>
                    <th scope="col"> الاسم</th>
                    <th scope="col"> رقم</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                    <td><a href="{{ route('suppliers.account',$supplier) }}">click here</a></td>
                    <td>{{ $supplier->address }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->id }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <div class="mt-2 pagniateConainer">
        {{ $suppliers->links() }}
    </div>




</div>
