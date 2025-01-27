<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Livewire\WithPagination;

class ListUsers extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        session()->flash("page_name", "المستخدمين");
        return view('livewire.users.list-users',[
            'users' => \App\Models\User::paginate(10)
        ]);
    }
}
