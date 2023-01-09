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
        Schema::create('mode_of_transport', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('cash_advance_id')->nullable();
            $table->integer('claim_id')->nullable();
            $table->string('tranport_type', 100)->nullable();
            $table->integer('subs_allowance_total')->nullable();
            $table->integer('subs_allowance_day')->nullable();
            $table->integer('accommadation_total')->nullable();
            $table->integer('accommadation_night')->nullable();
            $table->integer('entertainment')->nullable();
            $table->integer('total')->nullable();
            $table->integer('max_total')->nullable();
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
        Schema::dropIfExists('mode_of_transport');
    }
};