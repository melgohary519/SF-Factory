<div class="container-fluid itemspage mt-5">
    @livewire('users.nav-user', ['active' => 'add'])
    
    <div class="row">
        <div class="col mb-3 text-center">
            <label for="nameInput" class="form-label">اسم المستخدم</label>
            <input type="text" class="form-control" id="nameInput" wire:model="name">
            @error('name')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col mb-3 text-center">
            <label for="userEmailInput" class="form-label">البريد الإلكتروني</label>
            <input type="email" class="form-control" id="userEmailInput" wire:model="userEmail">
            @error('userEmail')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col mb-3 text-center">
            <label for="userPasswordInput" class="form-label">كلمة المرور</label>
            <input type="password" class="form-control" id="userPasswordInput" wire:model="userPassword">
            @error('userPassword')
                <div class="bg-warning p-2 text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="d-flex gap-3 justify-content-center buttons mt-5">
        <button type="button" class="btn btn-success btn-lg p-4 w-25" wire:click="saveData">تأكيد</button>
        <button type="button" class="btn btn-danger btn-lg p-4 w-25" wire:click="clearForm">افراغ / حذف</button>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
    @endif
</div>