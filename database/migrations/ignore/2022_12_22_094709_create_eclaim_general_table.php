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
        Schema::create('eclaim_general', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('tenant_id')->nullable();
            $table->string('status', 10)->nullable();
            $table->string('notify_email', 10)->nullable();
            $table->string('diable_user_request', 10)->nullable();
            $table->string('area_name', 100)->nullable();
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
        Schema::dropIfExists('eclaim_general');
    }
};