<?php

namespace App\Providers;

use App\Permission;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        \App\Post::class => \App\Policies\PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();
        $gate->define('update-post', function ($user, $post){
            return $user->owns($post);
        });

        foreach ($this->getPermissions() as $permission){
            $gate->define($permission->name, function($user) use ($permission){
               return $user->hasRole($permission->roles);
            });
        }
    }

    public function getPermissions()
    {
        return Permission::with('roles')->get();

    }
}
