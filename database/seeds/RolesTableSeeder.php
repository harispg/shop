<?php

use App\Role;
use Carbon\Carbon;
use App\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
        	'name' => 'Admin'
        ]);
        $role->save();
        $role->permissions()->sync(Permission::all()->pluck('id')->toArray());
        DB::table('role_user')->insert([
        	'role_id' => 1,
        	'user_id' => 1,
        	'created_at' => Carbon::now()
        ]);

        DB::table('role_user')->insert([
        	'role_id' => 1,
        	'user_id' => 2,
        	'created_at' => Carbon::now()
        ]);


        $role = Role::create([
        	'name' => 'Editor'
        ]);
        $role->save();
        $role->givePermissions([
            'articles.modify', 
            'categories.modify', 
            'comments.delete', 
            'photos.work',
            'editApearance'
        ]);

        Role::create([
        	'name' => 'Customer'
        ])->save();

        Role::create([
        	'name' => 'Guest'
        ])->save();
    }
}
