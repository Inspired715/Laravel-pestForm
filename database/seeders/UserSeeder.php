<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'email' => 'admin@pestform.com',
            'password' => 'password',
            'is_admin' => true,
            'email_verified_at' => now(),
        ]);
    }
}
