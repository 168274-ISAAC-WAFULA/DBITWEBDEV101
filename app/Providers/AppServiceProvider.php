<?php

namespace App\Providers;

use App\Models\SystemSetting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Share system settings with all views
        View::composer('*', function ($view) {
            $view->with([
                'cafeteriaName' => SystemSetting::getValue('cafeteria_name', 'Our Cafeteria'),
                'currencySymbol' => SystemSetting::getValue('currency_symbol', '$'),
                'taxRate' => SystemSetting::getValue('tax_rate', 0.16)
            ]);
        });
    }
}
