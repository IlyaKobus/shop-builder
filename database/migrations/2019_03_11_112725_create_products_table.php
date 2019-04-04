<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('model');

            $table->string('main_image')->nullable();

            $table->decimal('price')->nullable();

            $table->decimal('discount_price')->nullable();
            $table->boolean('is_discounted')->default(false);

            $table->integer('quantity')->nullable();
            $table->double('weight')->nullable();

            $table->bigInteger('primary_category')->nullable();

            $table->json('dimensions')->nullable();

            $table->string('status')->default(\App\Modules\Product\Enums\ProductStatusEnum::ENABLED);

            $table->integer('sort_order')->default(0);

            $table->unsignedBigInteger('currency_id')->nullable();

            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onDelete('set null');

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
        Schema::dropIfExists('products');
    }
}
