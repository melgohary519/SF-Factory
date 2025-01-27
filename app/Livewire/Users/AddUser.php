<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class AddUser extends Component
{
    public $name;
    public $userEmail;
    public $userPassword;



    public function saveData()
    {
        $this->validate(
            [
                'name' => 'required|string|min:3',
                'userEmail' => 'required|email',
                'userPassword' => 'required|string|min:3',
            ],
            [
                'name.required' => 'name is required',
                'name.string' => 'name must be a string',
                'name.min' => 'name must be at least 3 characters',
                'userEmail.required' => 'Email is required',
                'userEmail.email' => 'Email must be a valid email address',
                'userPassword.required' => 'Password is required',
                'userPassword.string' => 'Password must be a string',
                'userPassword.min' => 'Password must be at least 6 characters',
            ]

        );
        User::create([
            'name' => $this->name,
            'email' => $this->userEmail,
            'password' => \Hash::make($this->userPassword),
        ]);
        session()->flash('message', 'تم إضافة المستخدم بنجاح');
        $this->clearForm();
    }

    public function clearForm()
    {
        $this->name = '';
        $this->userEmail = '';
        $this->userPassword = '';
    }

    public function render()
    {
        return view('livewire.users.add-user');
    }
}
