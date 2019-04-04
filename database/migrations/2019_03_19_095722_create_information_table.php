<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('sort_order')->default(0);
            $table->string('status')->default(\App\Modules\Information\Enums\InformationStatusEnum::ENABLED);

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
        Schema::dropIfExists('information');
    }
}
