<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterForm extends Component
{
    public string $email = '';
    public string $password = '';

    public function render()
    {
        return view('livewire.auth.register-form');
    }

    public function register()
    {
        $this->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->createAsCustomer([
            'trial_ends_at' => now()->addDays(5),
        ]);

        Auth::login($user, true);

        event(new Registered($user));

        return to_route('forms.index');
    }
}
