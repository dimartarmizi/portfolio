<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Inertia::share([
            'app' => function () {
                return [
                    'owner_name' => setting('owner_name', null),
                    'headline' => setting('headline', null),
                    'show_blog' => setting('show_blog', "0") === "1",
                    'footer' => setting('footer', null),
                ];
            },
        ]);
    }
}
