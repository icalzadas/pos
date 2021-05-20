<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

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

        //
        Gate::define('admin', function (User $user) {

            if ($user->hasRole('admin')){
                 return true;
             }
  
             return false;
  
        });

        Gate::define('cajero', function (User $user) {

            if ($user->hasRole('cajero')){
                 return true;
             }
  
             return false;
  
        });

        Gate::define('vendedor', function (User $user) {

            if ($user->hasRole('vendedor')){
                 return true;
             }
  
             return false;
  
        });

        Gate::define('almacenista', function (User $user) {

            if ($user->hasRole('almacenista')){
                 return true;
             }
  
             return false;
  
        });
    }
}
