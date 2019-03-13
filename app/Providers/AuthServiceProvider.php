<?php

namespace App\Providers;

use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        //'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::before(function($user, $ability){
            if($user->isSuper()){
                return true;
            }
        });

        Gate::define('articles.create', 'App\Policies\ArticlePolicy@create');
        Gate::define('articles.modify', 'App\Policies\ArticlePolicy@modify');
        Gate::define('categories.create', 'App\Policies\CategoryPolicy@create');
        Gate::define('categories.modify', 'App\Policies\CategoryPolicy@modify');
        Gate::define('comments.delete', 'App\Policies\CommentPolicy@delete');
        Gate::define('users.work', 'App\Policies\UserPolicy@work');
        Gate::define('roles.work', 'App\Policies\RolePolicy@work');
        Gate::define('permissions.work', 'App\Policies\PermissionPolicy@work');
        Gate::define('photos.work', 'App\Policies\PhotoPolicy@work');
        Gate::define('editAperance', function($user){
            $permission = Permission::fetchPermissionTo('editApearance');
            return $user->hasRole($permission->roles);
        });
        


    }
}
