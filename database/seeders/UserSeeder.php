<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => env('ADMIN_USERNAME'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
        ]);
    }
}
