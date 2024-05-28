<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user){
            return $user->role == 'admin';
        });
        Gate::define('isMentor', function($user){
            return $user->role == 'mentor';
        });
        Gate::define('isPeserta', function($user){
            return $user->role == 'peserta';
        });

        Gate::define('isPesertaOrAdmin', function ($user) {
            return $user->role === 'peserta' || $user->role === 'admin';
        });

    }
}
