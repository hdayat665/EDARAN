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
        Schema::create('general_claim', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('claim_id', 255)->nullable();
            $table->string('claim_type', 100)->nullable();
            $table->integer('total_amount')->nullable();
            $table->string('status', 100)->nullable();
            $table->string('year', 100)->nullable();
            $table->string('month', 100)->nullable();
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
        Schema::dropIfExists('general_claim');
    }
};