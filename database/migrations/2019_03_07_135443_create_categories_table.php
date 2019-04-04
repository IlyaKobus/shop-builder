<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('image')->nullable();
            $table->string('status')->default(\App\Modules\Category\Enums\CategoryStatusEnum::ENABLED);

            $table->integer('sort_order')->default(0);

            $table->unsignedInteger('parent_id')->nullable();

            $table->unsignedBigInteger('layout_id')->nullable();

            $table->foreign('layout_id')
                ->references('id')
                ->on('layouts')
                ->onDelete('set null');

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
        Schema::dropIfExists('categories');
    }
}
