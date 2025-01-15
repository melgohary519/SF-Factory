<div class="container-fluid itemspage mt-5">
    @livewire('items.nav', ['active' => 'list'])

    <div class="card bg1 mb-3">
        <div class="card-body">
            <div class="row text-center">
                <select wire:model.live="selectedItem"
                    class="col align-content-center bg1 form-select form-select-lg border-0 text-end color-white">
                    @foreach ($select_options as $item)
                    <option value="{{ $item->goods_type }}" {{ $item->id == $selectedItem ? 'selected' : '' }}>
                        {{ $item->goods_type }}
                    </option>
                    @endforeach
                </select>
                <span class="col-3 align-content-center color-white">نوع البضاعة</span>
            </div>
        </div>
    </div>

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
                    <td>{{ $item->created_at->format("Y-m-d") }}</td>
                    <td>{{ $item->weight }}</td>
                    <td>{{ $item->id }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>


    <div class="mt-2 pagniateConainer">
        {{ $items->links() }}
    </div>

    <div class=" mb-3 mt-5">
        <div class="row text-center mb-1">
            <div class="col text-end bg1">{{ $selectedItem }}</div>
            <span class="col-3 align-content-center color-white bg4">نوع البضاعة</span>
        </div>

        <div class="row text-center mb-1">
            <div class="col text-end bg1">{{ $totalWeight }}</div>
            <span class="col-3 align-content-center color-white bg4"> الكمية</span>
        </div>

        <div class="row text-center">
            <div class="col text-end bg1">{{ $totalPurchasePrice }}</div>
            <span class="col-3 align-content-center color-white bg4">  السعر العراقي</span>
        </div>

        <div class="row text-center">
            <div class="col text-end bg1">{{ $totalDollarRate }} $</div>
            <span class="col-3 align-content-center color-white bg4">  السعر بالدولار</span>
        </div>
    </div>


</div>
