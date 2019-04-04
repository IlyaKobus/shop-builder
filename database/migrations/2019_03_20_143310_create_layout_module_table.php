<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayoutModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layout_module', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('type');

            $table->unsignedBigInteger('layout_id');

            $table->foreign('layout_id')
                ->references('id')
                ->on('layouts')
                ->onDelete('cascade');

            $table->unsignedBigInteger('module_id');

            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
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
        Schema::dropIfExists('layout_module');
    }
}
