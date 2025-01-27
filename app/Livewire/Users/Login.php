<?php

namespace App\Livewire\Users;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        $this->validate(
            [
                'email' => 'required|min:2',
                'password' => 'required|min:2',
            ],
            [
                'email.required' => 'The email field is required',
                'email.min' => 'The email must be at least 2 characters',
                'password.required' => 'The password field is required',
                'password.min' => 'The password must be at least 2 characters',
            ]
        );
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect('/');
        } else {
            session()->flash('error', 'Invalid email or password');
        }
    }

    public function render()
    {
        return view('livewire.users.login');
    }
}
