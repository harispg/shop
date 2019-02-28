<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiCategoriesController extends Controller
{
    public function update(Request $request, Category $category)
    {
    	$this->validate($request, [
    		'name' => 'required|min:2',
    		'description' => 'required|min:10',
    	]);

    	return $request;
    }
}
