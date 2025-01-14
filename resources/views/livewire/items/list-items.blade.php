<div class="container-fluid itemspage mt-5">
    @livewire('items.nav', ['active' => 'list'])


    <div class="tableList p-3 ">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">المبلغ بالدولار</th>
                    <th scope="col">المبلغ بالعراقي</th>
                    <th scope="col">اسم الشريك</th>
                    <th scope="col">اسم المورد</th>
                    <th scope="col"> التاريخ</th>
                    <th scope="col"> الكمية</th>
                    <th scope="col"> رقم</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->dollar_rate }} $</td>
                        <td>{{ $item->purchase_price }}</td>
                        <td>{{ $item->partner_name }}</td>
                        <td>{{ $item->supplier_name }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>{{ $item->weight }}</td>
                        <td>{{ $item->id }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    {{ $items->links() }}

</div>
