<?php

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name'=>'Haris Vodopic',
        	'email' => 'haris@example.com',
        	'password' => bcrypt('password'),
        	'superAdmin' => true,
        	'created_at' => Carbon::now(),
        	'email_verified_at' => Carbon::now()
        ])->save();

        User::create([
        	'name'=>'Haris Vodopic',
        	'email' => 'haris.vodopic@gmail.com',
        	'password' => bcrypt('password'),
        	'superAdmin' => true,
        	'created_at' => Carbon::now(),
        	'email_verified_at' => Carbon::now()
        ])->save();


        User::create([
        	'name'=>'Ivana Vodopic',
        	'email' => 'ivana@example.com',
        	'password' => bcrypt('password'),
        	'superAdmin' => true,
        	'created_at' => Carbon::now(),
        	'email_verified_at' => Carbon::now()
        ])->save();


    }
}
