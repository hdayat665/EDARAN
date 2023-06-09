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
        // Schema::create('timesheet_appeal', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('tenant_id')->nullable();
        //     $table->integer('user_id')->nullable();
        //     $table->string('status', 50)->nullable();
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
        Schema::dropIfExists('timesheet_appeal');
    }
};