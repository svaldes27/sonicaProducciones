<?php

namespace App\Providers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        User::created(function ($user) {
            $role = Role::where('name', 'administrador')->first();

            if ($role) {
                $user->assignRole($role);
            }
        });
        
    }
}
