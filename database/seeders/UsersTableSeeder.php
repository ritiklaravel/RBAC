<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Create an admin user
        $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);

        // Create a manager user
        $managerUser = User::create([
            'name' => 'Manager User',
            'email' => 'manager@example.com',
            'password' => Hash::make('password')
        ]);

        // Create a regular user
        $regularUser = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password')
        ]);

        // Assign roles
        $adminRole = Role::where('name', 'Admin')->first();
        $managerRole = Role::where('name', 'Manager')->first();
        $userRole = Role::where('name', 'User')->first();

        $adminUser->roles()->attach($adminRole);
        $managerUser->roles()->attach($managerRole);
        $regularUser->roles()->attach($userRole);
    }
}

