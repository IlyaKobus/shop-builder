<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option_values', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('quantity')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('discount_price')->nullable();
            $table->double('weight')->nullable();

            $table->unsignedBigInteger('option_product_id');

            $table->foreign('option_product_id')
                ->references('id')
                ->on('option_product')
                ->onDelete('cascade');

            $table->unsignedBigInteger('option_value_id');

            $table->foreign('option_value_id')
                ->references('id')
                ->on('option_values')
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
        Schema::dropIfExists('product_option_values');
    }
}
