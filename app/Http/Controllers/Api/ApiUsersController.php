<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiUsersController extends Controller
{
    public function changeRole(Request $request, User $user)
    {
    	$this->validate($request, [
    		'user' => 'integer',
    		'role' => 'string',
    	]);

    	if($request->role != 'No role'){
    		$user->giveRole($request->role);
    	}else{
    		$user->roles()->detach();
    	}
    }

    public function toggleSupperAdmin(Request $request, User $user){

        if(auth()->id() === $user->id){
            return 'You realy do not need to take away superAdmin ability from yourself';
        }
        
        if($user->superAdmin){
            $user->superAdmin = false;
            $user->save();
            return 'Not super any more';
        }else{
            $user->superAdmin = true;
            $user->save();
            return 'Is super now';
        }
    }
}
