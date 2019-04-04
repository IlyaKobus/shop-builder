<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGroupPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_group_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('model');

            $table->boolean('is_read_permitted')->default(false);
            $table->boolean('is_create_permitted')->default(false);
            $table->boolean('is_update_permitted')->default(false);
            $table->boolean('is_delete_permitted')->default(false);

            $table->unsignedBigInteger('user_group_id');

            $table->foreign('user_group_id')
                ->references('id')
                ->on('user_groups')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_group_permissions');
    }
}
