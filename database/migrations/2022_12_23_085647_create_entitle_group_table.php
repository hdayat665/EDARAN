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
        Schema::create('entitle_group', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('tenant_id')->nullable();
            $table->integer('claim_id')->nullable();
            $table->string('group_name', 255)->nullable();
            $table->string('job_grade', 10)->nullable();
            $table->string('local_travel', 10)->nullable();
            $table->string('oversea_travel', 10)->nullable();
            $table->string('local_hotel_allowance', 10)->nullable();
            $table->string('lodging_allowance', 10)->nullable();
            $table->string('car_millage', 10)->nullable();
            $table->string('motor_millage', 10)->nullable();
            $table->string('food_allowance', 10)->nullable();
            $table->integer('subsistance')->nullable();
            $table->integer('claim_benefit')->nullable();
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
        Schema::dropIfExists('entitle_group');
    }
};