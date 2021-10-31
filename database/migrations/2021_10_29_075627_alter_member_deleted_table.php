<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMemberDeletedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member', function(Blueprint $table) {
           $table->smallInteger('is_deleted')->default(0);
           $table->dateTimeTz('deleted_at')->nullable();
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
            $table->dropColumn('is_deleted');
            $table->dropColumn('deleted_at');
        });
    }
       
}
