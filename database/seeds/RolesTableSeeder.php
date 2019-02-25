<?php

use App\Role;
use Carbon\Carbon;
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
        Role::create([
        	'name' => 'Admin'
        ])->save();
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


        Role::create([
        	'name' => 'Editor'
        ])->save();

        Role::create([
        	'name' => 'Customer'
        ])->save();

        Role::create([
        	'name' => 'Guest'
        ])->save();
    }
}
