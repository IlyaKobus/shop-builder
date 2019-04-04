<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('key');
            $table->mediumText('value');

            $table->string('language_code');

            $table->foreign('language_code')
                ->references('code')
                ->on('languages')
                ->onDelete('cascade');

            $table->unsignedBigInteger('localable_id');
            $table->string('localable_type');

            $table->index(['localable_type', 'localable_id']);

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
        Schema::dropIfExists('translations');
    }
}
