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
        Schema::create('cash_advance_detail', function (Blueprint $table) {
            $table->id();
            $table->string('travel_date', 255)->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('project_location_id')->nullable();
            $table->string('destination', 255)->nullable();
            $table->string('purpose', 255)->nullable();
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
        Schema::dropIfExists('cash_advance_detail');
    }
};