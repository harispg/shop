<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Category', 15)->create();

        $photos = App\Photo::all();

        App\Category::all()->each(function($category) use ($photos) {
        	$category->photos()->attach($photos->random(1)->pluck('id'));
        });

    }
}
