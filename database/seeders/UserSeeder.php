<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name'     => 'Admin User',
            'username' => 'admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('pass'),
        ]);

        $admin->assignRole('super_admin');
    }
}