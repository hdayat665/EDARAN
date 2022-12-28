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
        Schema::table('entitle_group', function (Blueprint $table) {
            $table->integer('breakfast')->nullable();
            $table->integer('lunch')->nullable();
            $table->integer('dinner')->nullable();
            $table->dropColumn('food_allowance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entitle_group', function (Blueprint $table) {
            $table->dropColumn('breakfast');
            $table->dropColumn('lunch');
            $table->dropColumn('dinner');
        });
    }
};