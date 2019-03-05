<?php

use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Article', 20)->create();

        $photos = App\Photo::all();

        App\Article::all()->each(function($article) use ($photos) {
        	$article->photos()->attach(
        		$photos->random(rand(3,1))->pluck('id')->toArray()
        	);
        });
    }
}
