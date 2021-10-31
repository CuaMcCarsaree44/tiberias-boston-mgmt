<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member', function(Blueprint $table) {
           $table->smallInteger('kk_flag')->default(0);
           $table->smallInteger('akte_baptis_flag')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member', function(Blueprint $table) {
            $table->dropColumn('kk_flag');
            $table->dropColumn('akte_baptis_flag');
        });
    }
}
