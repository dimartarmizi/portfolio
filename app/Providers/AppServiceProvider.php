<?php

namespace App\Providers;

use App\Support\PortfolioData;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Inertia::share([
            'auth' => function () {
                $user = Auth::user();

                return [
                    'user' => $user ? [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                        'username' => $user->username,
                    ] : null,
                ];
            },
            'app' => function () {
                return [
                    'owner_name' => setting('owner_name', null),
                    'headline' => setting('headline', null),
                    'profile_picture' => setting('profile_picture', null, true),
                    'show_blog' => setting('show_blog', "0") === "1",
                    'show_profile_picture' => setting('show_profile_picture', "0") === "1",
                    'footer' => setting('footer', null),
                ];
            },
            'seo' => function () {
                return PortfolioData::seo();
            },
        ]);
    }
}
