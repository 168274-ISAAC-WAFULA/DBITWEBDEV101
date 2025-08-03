<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Create permissions
        $permissions = [
            'view dashboard',
            'manage menu',
            'manage inventory',
            'process orders',
            'manage payments',
            'manage users',
            'manage staff',
            'view reports',
            'manage settings'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create roles and assign permissions
        $admin = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $admin->givePermissionTo(Permission::all());

        $owner = Role::firstOrCreate(['name' => 'owner', 'guard_name' => 'web']);
        $owner->givePermissionTo([
            'view dashboard',
            'manage menu',
            'manage inventory',
            'view reports',
            'manage settings'
        ]);

        $manager = Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'web']);
        $manager->givePermissionTo([
            'view dashboard',
            'manage menu',
            'manage inventory',
            'process orders',
            'view reports'
        ]);

        $cashier = Role::firstOrCreate(['name' => 'cashier', 'guard_name' => 'web']);
        $cashier->givePermissionTo([
            'view dashboard',
            'process orders',
            'manage payments'
        ]);

        $customerservice = Role::firstOrCreate(['name' => 'customerservice', 'guard_name' => 'web']);
        $customerservice->givePermissionTo([
            'view dashboard',
            'process orders'
        ]);
    }
}
