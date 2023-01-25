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
        Schema::create('travel_claim', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('tenant_id')->nullable();
            $table->integer('general_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('log_id')->nullable();
            $table->string('claim_for', 100)->nullable();
            $table->string('claim_category', 255)->nullable();
            $table->string('claim_category_detail', 100)->nullable();
            $table->string('travel_date', 255)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('travel_duration', 100)->nullable();
            $table->string('start_time', 255)->nullable();
            $table->string('end_time', 255)->nullable();
            $table->string('total_hour', 255)->nullable();
            $table->string('reason', 255)->nullable();
            $table->string('type_transport', 255)->nullable();
            $table->string('address_start', 255)->nullable();
            $table->string('location_start', 255)->nullable();
            $table->string('location_address', 255)->nullable();
            $table->double('millage')->nullable();
            $table->double('petrol')->nullable();
            $table->double('toll')->nullable();
            $table->double('parking')->nullable();
            $table->double('breakfast')->nullable();
            $table->double('lunch')->nullable();
            $table->double('dinner')->nullable();
            $table->double('total_subs')->nullable();
            $table->double('hotel')->nullable();
            $table->double('lodging')->nullable();
            $table->double('total_acc')->nullable();
            $table->double('total')->nullable();
            $table->string('desc', 255)->nullable();
            $table->double('amount')->nullable();
            $table->string('file_upload', 255)->nullable();
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
        Schema::dropIfExists('travel_claim');
    }
};