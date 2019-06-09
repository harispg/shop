<?php

namespace App\Traits;

use App\Role;

trait WorksWithRoles	{

    /**
 * Checks if user is Super Admin
 * @return boolean 
 */
    public function isSuper(){
    	if($this->superAdmin){
    		return true;
    	}
    	return false;
    }
    public function roles()
    {
    	return $this->belongsToMany(Role::class);
    }

    /**
     * Checks if a user has Role
     * @param  [string]  $role 
     * @return boolean 
     */
    public function hasRole($role)
    {
    	if(is_string($role)){
    		return $this->roles->where('name', $role)->count();
    	}

    	return $role->intersect($this->roles)->count();
    }

    public function getRole()
    {
    	return $this->roles->first();
    }

    public function getRoleName()
    {
    	if($this->roles->count()>0){
    		return $this->getRole()->name;
    	}else{
    		return "no role";
    	} 
    }

    /**
     * Gives role to a user
     * @param  [string] $role
     * @return void
     */
    public function giveRole($role){
    	if(!is_string($role)){abort(422,'Role must be a string');}
    	if($this->hasRole($role)){abort(422, 'Already have this role');}
    	$roleId = Role::where('name', $role)->first()->id;
    	$this->roles()->sync($roleId);
    }

    /**
     * Takes away role from user
     * @param  [string] $role
     * @return void
     */
    public function takeAwayRole($role){
    	if(!is_string($role)){abort(422,'Role must be a string');}
    	if(!$this->hasRole($role)){abort(422, "User doesn't have this role");}
    	$roleId = Role::where('name', $role)->first()->id;
    	$this->roles()->detach($roleId);
    }	
}