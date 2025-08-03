<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@cafeteria.com',
            'password' => Hash::make('password'),
            'phone' => '1234567890',
            'role' => 'admin',
            'balance' => 0
        ]);

        $admin->assignRole('admin');

        // Create sample users for other roles
        $roles = ['owner', 'manager', 'cashier', 'customerservice'];
        
        foreach ($roles as $role) {
            $user = User::create([
                'name' => ucfirst($role) . ' User',
                'email' => $role . '@cafeteria.com',
                'password' => Hash::make('password'),
                'phone' => '123456789' . array_search($role, $roles),
                'role' => $role,
                'balance' => 0
            ]);
            
            $user->assignRole($role);
        }
    }
}
