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
        Schema::create('approval_config', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('tenant_id')->nullable();
            $table->string('role', 255)->nullable();
            $table->string('type_claim', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('approve', 255)->nullable();
            $table->string('reject', 255)->nullable();
            $table->string('amend', 255)->nullable();
            $table->string('cancel', 255)->nullable();
            $table->string('check1', 255)->nullable();
            $table->string('generate_pv1', 255)->nullable();
            $table->string('payment1', 255)->nullable();
            $table->string('paid1', 255)->nullable();
            $table->string('check2', 255)->nullable();
            $table->string('generate_pv2', 255)->nullable();
            $table->string('payment2', 255)->nullable();
            $table->string('paid2', 255)->nullable();
            $table->string('check3', 255)->nullable();
            $table->string('generate_pv3', 255)->nullable();
            $table->string('payment3', 255)->nullable();
            $table->string('paid3', 255)->nullable();
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
        Schema::dropIfExists('approval_config');
    }
};