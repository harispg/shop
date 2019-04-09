<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth', 'can:users.work']);
    }

    public function index()
    {
    	$users = User::with('roles')->get();
        $roles = Role::all();
    	return view('admin.users.index', compact('users', 'roles'));
    }

    public function show(User $user){
    	return view('admin.users.show', compact('user'));
    }

}
