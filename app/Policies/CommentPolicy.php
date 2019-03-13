<?php

namespace App\Policies;

use App\User;
use App\Permission;
use Illuminate\Auth\Access\HandlesAuthorization;

class CommentPolicy
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

    public function delete(User $user)
    {
        $permission = Permission::getPermissionTo('comments.delete');
        return $user->hasRole($permission->roles);
    }
}
