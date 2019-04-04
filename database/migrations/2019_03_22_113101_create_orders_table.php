<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('payment_address');
            $table->string('shipping_address');

            $table->unsignedBigInteger('status_id')->nullable();

            $table->foreign('status_id')
                ->references('id')
                ->on('order_statuses')
                ->onDelete('set null');

            $table->unsignedBigInteger('customer_id')->nullable();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');

            $table->unsignedBigInteger('currency_id')->nullable();

            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onDelete('set null');

            $table->unsignedBigInteger('shipment_id')->nullable();

            $table->foreign('shipment_id')
                ->references('id')
                ->on('shipments')
                ->onDelete('set null');

            $table->unsignedBigInteger('payment_id')->nullable();

            $table->foreign('payment_id')
                ->references('id')
                ->on('payments')
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
        Schema::dropIfExists('orders');
    }
}
