<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('client', function ($user){
            return $user->hasRole('client');
        });
        Gate::define('tenant', function ($user){
            return $user->hasRole('tenant');
        });
        Gate::define('senior-property-manager', function ($user){
            return $user->hasRole('senior-property-manager');
        });
        Gate::define('property-manager', function ($user){
            return $user->hasRole('property-manager');
        });
        Gate::define('facility-manager', function ($user){
            return $user->hasRole('facility-manager');
        });
        Gate::define('accountant', function ($user){
            return $user->hasRole('accountant');
        });
        Gate::define('ceo', function ($user){
            return $user->hasRole('ceo');
        });
        Gate::define('superadmin', function ($user){
            return $user->hasRole('superadmin');
        });
        //
    }
}
