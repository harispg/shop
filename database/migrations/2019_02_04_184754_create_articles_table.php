<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->text('specification');
            $table->unsignedInteger('sku')->unique();
            $table->float('price',8,2);
            $table->integer('discount')->default(0);
            $table->boolean('new')->default(false);
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity');
            // TODO $table->unsignedInteger('weight');
            // TODO $table->string or unsignedInteger or something else('size')
            // TODO $table->unsignedInteger('packing_quantity')
            // TODO $table->unsignedInteger('rating') maybe separate table is the best choice
            $table->timestamps();
        });

        Schema::create('article_photo', function (Blueprint $table) {
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('photo_id');

            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');

            $table->timestamps();

            $table->primary(['article_id', 'photo_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_photo');
    }
}
