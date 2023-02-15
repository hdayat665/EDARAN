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
            $table->string('a_approval')->nullable()->after('remark');
            $table->string('a_recommender')->nullable()->after('remark');
            $table->string('a3')->nullable()->after('remark');
            $table->string('a2')->nullable()->after('remark');
            $table->string('a1')->nullable()->after('remark');
            $table->string('f_approval')->nullable()->after('remark');
            $table->string('f_recommender')->nullable()->after('remark');
            $table->string('f3')->nullable()->after('remark');
            $table->string('f2')->nullable()->after('remark');
            $table->string('f1')->nullable()->after('remark');
            $table->string('hod')->nullable()->after('remark');
            $table->string('supervisor')->nullable()->after('remark');
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
            $table->dropColumn('supervisor');
            $table->dropColumn('hod');
            $table->dropColumn('f1');
            $table->dropColumn('f2');
            $table->dropColumn('f3');
            $table->dropColumn('f_recommender');
            $table->dropColumn('f_approval');
            $table->dropColumn('a1');
            $table->dropColumn('a2');
            $table->dropColumn('a3');
            $table->dropColumn('a_recommender');
            $table->dropColumn('a_approval');
        });
    }
};