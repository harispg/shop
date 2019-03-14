<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class PhotoPolicy
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
        $permission = Permission::getPermissionTo('photos.work');
        return $user->hasRole($permission->roles);
    }

}
