<?php

namespace Database\Seeders;

use App\Models\SystemSetting;
use Illuminate\Database\Seeder;

class SystemSettingsSeeder extends Seeder
{
    public function run()
    {
        $settings = [
            [
                'key' => 'cafeteria_name',
                'value' => 'Delicious Cafe',
                'description' => 'The name of the cafeteria'
            ],
            [
                'key' => 'opening_time',
                'value' => '08:00',
                'description' => 'Daily opening time'
            ],
            [
                'key' => 'closing_time',
                'value' => '22:00',
                'description' => 'Daily closing time'
            ],
            [
                'key' => 'tax_rate',
                'value' => '0.16',
                'description' => 'Tax rate as decimal (e.g. 0.16 for 16%)'
            ],
            [
                'key' => 'reservation_duration',
                'value' => '90',
                'description' => 'Default reservation duration in minutes'
            ],
            [
                'key' => 'currency_symbol',
                'value' => '$',
                'description' => 'Currency symbol for display'
            ]
        ];

        foreach ($settings as $setting) {
            SystemSetting::create($setting);
        }
    }
}
