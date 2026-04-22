<?php

namespace App\Providers;

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
        // Define Gates for roles
        \Illuminate\Support\Facades\Gate::define('super-admin', function (\$user) {
            return \$user->roles()->where('slug', \App\Enums\UserRole::SUPER_ADMIN->value)->exists();
        });
        
        \Illuminate\Support\Facades\Gate::define('campaign-admin', function (\$user) {
            return \$user->roles()->where('slug', \App\Enums\UserRole::CAMPAIGN_ADMIN->value)->exists();
        });
        
        \Illuminate\Support\Facades\Gate::define('reviewer', function (\$user) {
            return \$user->roles()->where('slug', \App\Enums\UserRole::REVIEWER->value)->exists();
        });
    }
}
