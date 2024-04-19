<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
    public function boot()
    {
        Validator::extend('id_format', function ($attribute, $value, $parameters, $validator) {
            // Define your regular expression pattern for the ID format
            $pattern = '/^\d{2}[A-Z]{3}\d{2}[A-Z]\d{4}$/';
            return preg_match($pattern, $value);
        });
    }
}
