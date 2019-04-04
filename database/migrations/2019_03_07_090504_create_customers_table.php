<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('email')->unique();

            $table->string('first_name');
            $table->string('last_name');

            $table->string('password');

            $table->string('phone')->nullable();
            $table->string('avatar')->nullable();

            $table->boolean('is_confirmed')->default(false);
            $table->boolean('is_mailable')->default(false);

            $table->string('status')->default(\App\Modules\Customer\Enums\CustomerStatusEnum::ENABLED);

            $table->unsignedBigInteger('customer_group_id')->nullable();

            $table->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
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
        Schema::dropIfExists('customers');
    }
}
