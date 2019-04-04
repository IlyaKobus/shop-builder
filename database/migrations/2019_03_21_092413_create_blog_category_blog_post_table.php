<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogCategoryBlogPostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_category_blog_post', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('blog_post_id');

            $table->foreign('blog_post_id')
                ->references('id')
                ->on('blog_posts')
                ->onDelete('cascade');

            $table->unsignedBigInteger('blog_category_id');

            $table->foreign('blog_category_id')
                ->references('id')
                ->on('blog_categories')
                ->onDelete('cascade');

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
        Schema::dropIfExists('blog_category_blog_post');
    }
}
