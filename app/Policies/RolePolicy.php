<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
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

    public function work(User $user)
    {
        $permission = Permission::getPermissionTo('role.work');
        return $user->hasRole($permission->roles);
    }
}
}
