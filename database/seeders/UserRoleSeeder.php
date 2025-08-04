<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['admin', 'owner', 'manager', 'cashier', 'customer_service', 'customer'];
        
        // Create roles if they don't exist
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }
        
        foreach ($roles as $role) {
            $this->createUsersForRole($role, 3);
        }
    }
    
    protected function createUsersForRole(string $role, int $count)
    {
        for ($i = 1; $i <= $count; $i++) {
            $email = str_replace('_', '', $role) . $i . '@cafeteria.com';
            
            // Check if user already exists
            $user = User::where('email', $email)->first();
            
            if ($user) {
                // User exists, just assign the role if not already assigned
                if (!$user->hasRole($role)) {
                    $user->assignRole($role);
                }
            } else {
                // Create new user
                $user = User::create([
                    'name' => ucfirst(str_replace('_', ' ', $role)) . ' ' . $i,
                    'email' => $email,
                    'password' => Hash::make('password'),
                    'phone' => '2547' . rand(100000, 999999),
                    'email_verified_at' => now(),
                    'balance' => $role === 'customer' ? rand(500, 5000) : 0
                ]);
                
                $user->assignRole($role);
            }
        }
    }
}
