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
        // Schema::create('appeal_mtc', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('user_id')->nullable();
        //     $table->integer('tenant_id')->nullable();
        //     $table->string('year')->nullable();
        //     $table->string('month')->nullable();
        //     $table->string('status')->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appeal_mtc');
    }
};