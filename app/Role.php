<?php

namespace App;

use App\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = false;

    protected $guarded=[];

    public function users()
    {
    	return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
    	return $this->belongsToMany(Permission::class);
    }

    public function givePermissions($permissions){
        if(is_array($permissions) && is_string($permissions[0])){
            foreach ($permissions as $permission) {
                $permissionIds[] = Permission::getPermissionTo($permission)->id;
            }
            $this->permissions()->syncWithoutDetaching($permissionIds);
        }elseif(is_array($permissions)){
            $this->permissions()->syncWithoutDetaching($permissions);
        }elseif(is_string($permissions)){
            $this->permissions()->attach(Permission::getPermissionTo($permission)->id);
        }else{
            $this->permissions()->attach($permissions);
        }

    }
}