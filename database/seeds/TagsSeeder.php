<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
        	'name' => 'NOVO'
        ])->save();

        Tag::create([
        	'name' => '2019'
        ])->save();

        Tag::create([
        	'name' => 'ljeto'
        ])->save();

        Tag::create([
        	'name' => 'jesen'
        ])->save();

        Tag::create([
        	'name' => 'plavo'
        ])->save();

        Tag::create([
        	'name' => 'top'
        ])->save();

        Tag::create([
        	'name' => 'dzabaluk'
        ])->save();

        Tag::create([
        	'name' => 'kvalitetno'
        ])->save();

    }
}
