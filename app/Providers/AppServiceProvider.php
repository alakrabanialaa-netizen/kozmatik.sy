<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // 1. أضف هذا السطر هنا

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // 2. أجبر لارافيل على توليد جميع الروابط والملفات بـ HTTPS
        URL::forceScheme('https');
    }
}