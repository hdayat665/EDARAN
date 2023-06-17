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
        Schema::create('userprofile', function (Blueprint $table) {
            $table->id();
            $table->string('user_id', 255)->nullable();
            $table->string('tenant_id', 255)->nullable();
            $table->string('username', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->string('firstName', 255)->nullable();
            $table->string('lastName', 255)->nullable();
            $table->string('fullName', 255)->nullable();
            $table->string('nonNetizen', 255)->nullable();
            $table->string('idNo', 255)->nullable();
            $table->string('passport', 255)->nullable();
            $table->date('expiryDate')->nullable();
            $table->string('issuingCountry', 255)->nullable();
            $table->date('DOB')->nullable();
            $table->string('gender', 255)->nullable();
            $table->string('maritialStatus', 255)->nullable();
            $table->string('religion', 255)->nullable();
            $table->string('race', 255)->nullable();
            $table->string('phoneNo', 255)->nullable();
            $table->string('homeNo', 255)->nullable();
            $table->string('extensionNo', 255)->nullable();
            $table->string('personalEmail', 255)->nullable();
            $table->string('employee_id', 255)->nullable();
            $table->string('oldIDNo', 255)->nullable();
            $table->string('okuStatus', 255)->nullable();
            $table->string('okuCardNum', 255)->nullable();
            $table->string('fileID', 255)->nullable();
            $table->string('okuFile', 255)->nullable();
            $table->string('phoneNo2', 255)->nullable();
            $table->string('profilePicturejpg', 255)->nullable();
            $table->string('uploadFile', 255)->nullable();
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
        Schema::dropIfExists('userprofile');
    }
};