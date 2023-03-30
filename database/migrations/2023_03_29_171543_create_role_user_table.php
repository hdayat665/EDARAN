<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('tenant_id')->nullable();
            $table->integer('up_user_id')->nullable();
            $table->integer('role_id')->nullable();
            $table->string('added_by', 200)->nullable();
            $table->string('added_time', 200)->nullable();
            $table->string('modified_by', 200)->nullable();
            $table->string('modified_time', 200)->nullable();
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
        Schema::dropIfExists('role_user');
    }
};