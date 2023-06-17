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
        Schema::create('myleave', function (Blueprint $table) {
            $table->id();
            $table->integer('tenant_id')->nullable();
            $table->string('up_user_id')->nullable();
            $table->string('applied_date')->nullable();
            $table->string('lt_type_id')->nullable();
            $table->string('day_applied')->nullable();
            $table->string('total_day_applied')->nullable();
            $table->string('leave_date')->nullable();
            $table->string('leave_session')->nullable();
            $table->string('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('file_document')->nullable();
            $table->date('reason')->nullable();
            $table->string('up_recommendedby_id')->nullable();
            $table->string('up_rec_status')->nullable();
            $table->string('up_rec_reason')->nullable();
            $table->string('up_approvedby_id')->nullable();
            $table->string('up_app_status')->nullable();
            $table->string('up_app_reason')->nullable();
            $table->string('status_user')->nullable();
            $table->string('status_final')->nullable();
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
        Schema::dropIfExists('myleave');
    }
};