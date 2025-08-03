<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\SampleDataSeeder;
use Database\Seeders\SystemSettingsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            PermissionSeeder::class,
            AdminUserSeeder::class,
            SampleDataSeeder::class,
            SystemSettingsSeeder::class,
            // Other seeders will be added here
        ]);
    }
}
