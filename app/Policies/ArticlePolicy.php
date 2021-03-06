<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function create(User $user)
    {
        $permission = Permission::getPermissionTo('articles.create');
        return $user->hasRole($permission->roles);
    }

    public function modify(User $user)
    {
        $permission = Permission::getPermissionTo('articles.modify');
        return $user->hasRole($permission->roles);
    }

}
