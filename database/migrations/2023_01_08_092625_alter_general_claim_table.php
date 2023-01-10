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
        Schema::table('general_claim', function (Blueprint $table) {
            $table->string('type', 100)->nullable();
            $table->integer('cash_advance_id')->nullable();
            $table->string('type_cash_advance', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('general_claim', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};