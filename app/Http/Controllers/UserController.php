<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function updateEmail(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'unique:users,email'],
        ]);

        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $user->update([
            'email' => $validated['email'],
            'email_verified_at' => null,
        ]);

        $user->sendEmailVerificationNotification();

        Session::flash('EmailUpdated');

        return redirect()->back();
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'current_password' => ['required', 'string', 'current_password'],
        ]);

        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $user->update([
            'password' => $validated['password'],
        ]);

        Session::flash('PasswordUpdated');

        return redirect()->back();
    }

    public function delete()
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();
        if($user->subscriptions()) {
            // Cancel all subscriptions
            $user->subscriptions()->each(function ($subscription) {
                $subscription->cancel();
            });

            $user->delete();
        }
        return redirect()->route('index');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }

    public function sendVerificationEmail(Request $request)
    {
        /**
         * @var \App\Models\User $user
         */
        $user = auth()->user();

        $user->sendEmailVerificationNotification();

        Session::flash('verificationMailResent');

        return redirect()->back();
    }
}
