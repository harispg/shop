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
}
