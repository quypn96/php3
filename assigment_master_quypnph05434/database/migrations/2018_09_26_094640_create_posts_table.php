<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->unique();
            $table->text('short_desc')->nullable();
            $table->text('content')->nullable();
            $table->string('image',255)->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->integer('category_id')->default(1);
            $table->integer('subcategories_id')->nullable();
            $table->string('slug_post', 255)->nullable();
            $table->integer('count_view')->default(0);
            $table->string('author')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
