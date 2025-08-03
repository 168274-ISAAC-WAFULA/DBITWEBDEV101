<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'manage users',
            'manage menu',
            'manage inventory',
            'manage orders',
            'process payments',
            'manage staff',
            'manage reservations',
            'view reports',
            'manage settings'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(Permission::all());

        $owner = Role::create(['name' => 'owner']);
        $owner->givePermissionTo(['view reports', 'manage settings']);

        $manager = Role::create(['name' => 'manager']);
        $manager->givePermissionTo([
            'manage menu',
            'manage inventory',
            'manage orders',
            'manage staff'
        ]);

        $cashier = Role::create(['name' => 'cashier']);
        $cashier->givePermissionTo([
            'manage orders',
            'process payments'
        ]);

        $customerservice = Role::create(['name' => 'customerservice']);
        $customerservice->givePermissionTo([
            'manage orders',
            'manage reservations'
        ]);
    }
}
