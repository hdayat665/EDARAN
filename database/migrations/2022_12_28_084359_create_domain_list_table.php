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
        Schema::create('domain_list', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('tenant_id')->nullable();
            $table->string('type', 255)->nullable();
            $table->string('category_role', 100)->nullable();
            $table->integer('role')->nullable();
            $table->integer('checker1')->nullable();
            $table->integer('checker2')->nullable();
            $table->integer('checker3')->nullable();
            $table->integer('recommender')->nullable();
            $table->integer('approver')->nullable();
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
        Schema::dropIfExists('domain_list');
    }
};