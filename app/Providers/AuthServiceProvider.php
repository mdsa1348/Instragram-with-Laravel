<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\userProfile;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\ProfilePolicy;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        \App\Models\User::class => \App\Policies\UserPolicy::class,
        \App\Models\userProfile::class => \App\Policies\ProfilePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        /* $this->registerPolicies();
 
        Gate::define('edit-settings', function ($user) {
            return $user->isAdmin;
        });
     
        Gate::define('update-post', function ($user, $post) {
            return $user->id === $post->user_id;
        }); */
    }
}
