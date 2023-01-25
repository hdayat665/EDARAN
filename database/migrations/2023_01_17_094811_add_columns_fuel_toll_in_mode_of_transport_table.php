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
        Schema::table('mode_of_transport', function (Blueprint $table) {
            $table->double('fuel')->nullable()->after('entertainment');
            $table->double('toll')->nullable()->after('entertainment');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mode_of_transport', function (Blueprint $table) {
            $table->dropColumn('fuel');
            $table->dropColumn('toll');
        });
    }
};