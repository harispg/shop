<?php

use App\OrderStatus;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class OrderStatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create([
        	'name'=>'creating',
        	'created_at' => Carbon::now(),
        ])->save();

        OrderStatus::create([
        	'name'=>'submited',
        	'created_at' => Carbon::now(),
        ])->save();

        OrderStatus::create([
        	'name'=>'packing',
        	'created_at' => Carbon::now(),
        ])->save();

        OrderStatus::create([
        	'name'=>'shiped',
        	'created_at' => Carbon::now(),
        ])->save();

        OrderStatus::create([
        	'name'=>'delivered',
        	'created_at' => Carbon::now(),
        ])->save();

        OrderStatus::create([
        	'name'=>'denied',
        	'created_at' => Carbon::now(),
        ])->save();
    }
}
