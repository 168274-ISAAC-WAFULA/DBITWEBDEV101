<?php

namespace App\Traits;

use App\Models\SystemSetting;

trait SettingsHelper
{
    public function setting(string $key, $default = null)
    {
        return SystemSetting::getValue($key, $default);
    }

    public function getCafeteriaName()
    {
        return $this->setting('cafeteria_name', 'Our Cafeteria');
    }

    public function getTaxRate()
    {
        return (float) $this->setting('tax_rate', 0.16);
    }

    public function getCurrencySymbol()
    {
        return $this->setting('currency_symbol', '$');
    }

    public function getOperatingHours()
    {
        return [
            'opening' => $this->setting('opening_time', '08:00'),
            'closing' => $this->setting('closing_time', '22:00')
        ];
    }
}
