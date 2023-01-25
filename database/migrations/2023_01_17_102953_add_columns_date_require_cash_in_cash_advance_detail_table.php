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
        Schema::table('cash_advance_detail', function (Blueprint $table) {
            $table->string('date_require_cash', 100)->nullable()->after('status');
            $table->string('file_upload', 255)->nullable()->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cash_advance_detail', function (Blueprint $table) {
            $table->dropColumn('file_upload');
            $table->dropColumn('date_require_cash');
        });
    }
};