<div class="container-fluid itemspage mt-5">
    @livewire('users.nav-user', ['active' => 'list'])

    <div class="card bg1 mb-3">
        <div class="card-body">
            <div class="row text-center">
                <span class="align-content-center color-white">  المستخدمين </span>
            </div>
        </div>
    </div>

    <div class="tableList p-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">رقم</th>
                    <th scope="col">الاسم</th>
                    <th scope="col">الايميل</th>
                    <th scope="col">عرض</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email}}</td>
                    <td> <a href="{{route('users.account',$user)}}">click here</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-2 pagniateConainer">
        {{ $users->links() }}
    </div>
</div>