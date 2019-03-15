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
        factory('App\Article', 150)->create();

        $photos = App\Photo::all();
        $categories = App\Category::all();

        App\Article::all()->each(function($article) use ($photos, $categories) {
        	$article->photos()->attach(
        		$photos->random(rand(3,1))->pluck('id')->toArray()
        	);
            $article->categories()->attach($categories->random(1)->pluck('id'));
            // TODO: think about number of categories a shop can have. A lot :)
        });
    }
}
