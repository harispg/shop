<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
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
        $permission = Permission::getPermissionTo('categories.create');
        return $user->hasRole($permission->roles);
    }
    
    public function modify(User $user)
    {
        $permission = Permission::getPermissionTo('categories.modify');
        return $user->hasRole($permission->roles);
    }
}
