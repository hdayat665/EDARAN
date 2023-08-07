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
        Schema::create('menu_permission_code', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('code', 255)->nullable();
            $table->string('name', 255)->nullable();
            $table->integer('level_1')->nullable();
            $table->integer('level_2')->nullable();
            $table->integer('level_3')->nullable();
            $table->integer('level_4')->nullable();
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
        Schema::dropIfExists('menu_permission_code');
    }
};