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
        Schema::table('menu_permission_code', function (Blueprint $table) {
            $table->integer('view')->after('level_4')->nullable();
            $table->integer('add')->after('level_4')->nullable();
            $table->integer('edit')->after('level_4')->nullable();
            $table->integer('delete')->after('level_4')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menu_permission_code', function (Blueprint $table) {
            $table->dropColumn('view');
            $table->dropColumn('add');
            $table->dropColumn('edit');
            $table->dropColumn('delete');
        });
    }
};