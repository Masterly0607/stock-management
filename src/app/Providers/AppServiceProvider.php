<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        // it makes pagination UI consistent with the rest of your project (which uses Tailwind / Filament).
        Paginator::useTailwind(); 

        // If the user is super_admin → give them access to everything, no matter what. If not → check the normal rules
        Gate::before(function ($user, $ability) {
    return $user->hasRole('super_admin') ? true : null;
});

    }
}
