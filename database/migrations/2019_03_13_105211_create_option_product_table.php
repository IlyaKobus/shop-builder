<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_product', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('option_id');

            $table->foreign('option_id')
                ->references('id')
                ->on('options')
                ->onDelete('cascade');

            $table->unsignedBigInteger('product_id');

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
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
        Schema::dropIfExists('option_product');
    }
}
