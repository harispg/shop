<?php

namespace App\Http\Controllers;

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
    	return view('admin.users.index', compact('users'));
    }

    public function show(User $user){
    	return view('admin.users.show', compact('user'));
    }

}
