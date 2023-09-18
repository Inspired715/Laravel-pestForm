<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class LoginForm extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function render()
    {
        return view('livewire.auth.login-form');
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $attempt = auth()->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember);

        if ($attempt) {
            return to_route('forms.index');
        } else {
            session()->flash('error', "Email or Password is wrong.");
        }
    }
}
