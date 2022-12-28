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
            $table->integer('lodging_hotel_value')->nullable();
            $table->integer('lodging_allowance_value')->nullable();
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
            $table->dropColumn('lodging_hotel_value');
            $table->dropColumn('dinner');
        });
    }
};