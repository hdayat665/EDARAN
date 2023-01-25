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
        Schema::create('personal_claim', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('tenant_id')->nullable();
            $table->integer('general_id')->nullable();
            $table->dateTime('applied_date')->nullable();
            $table->string('claim_category', '100')->nullable();
            $table->string('claim_category_detail', '100')->nullable();
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
        Schema::dropIfExists('personal_claim');
    }
};