<?php

use Carbon\Carbon;
use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    //editApearance
    {
        Permission::create([
        	'name' => 'articles.create',
        	'label' => 'Permission to create articles',
        	'created_at' => Carbon::now(),
        ])->save();

        Permission::create([
        	'name' => 'articles.modify',
        	'label' => 'Permission to modify articles',
        	'created_at' => Carbon::now(),
        ])->save();

        Permission::create([
        	'name' => 'categories.create',
        	'label' => 'Permission to create categories',
        	'created_at' => Carbon::now(),
        ])->save();

        Permission::create([
        	'name' => 'categories.modify',
        	'label' => 'Permission to modify categories',
        	'created_at' => Carbon::now(),
        ])->save();

        Permission::create([
        	'name' => 'comments.delete',
        	'label' => 'Permission to delete comments',
        	'created_at' => Carbon::now(),
        ])->save();

        Permission::create([
        	'name' => 'users.work',
        	'label' => 'Permission to work with users',
        	'created_at' => Carbon::now(),
        ])->save();

        Permission::create([
        	'name' => 'roles.work',
        	'label' => 'Permission to work with roles',
        	'created_at' => Carbon::now(),
        ])->save();

        Permission::create([
        	'name' => 'permissions.work',
        	'label' => 'Permission to work with permissions',
        	'created_at' => Carbon::now(),
        ])->save();

        Permission::create([
        	'name' => 'photos.work',
        	'label' => 'Permission to work with photos',
        	'created_at' => Carbon::now(),
        ])->save();

        Permission::create([
        	'name' => 'editApearance',
        	'label' => 'Permission to edit the site Apearance',
        	'created_at' => Carbon::now(),
        ])->save();
    }


}
