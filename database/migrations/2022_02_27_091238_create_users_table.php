<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('fullname', 100);
            $table->string('phone', 20)->unique();
            $table->string('email', 255)->unique();
            $table->smallInteger('status')->default(0)
                    ->comment('0: INACTIVE | 1: ACTICE | 2: SUSPENDED');
            $table->smallInteger('role')->default(1)
                    ->comment('1: MINISTRY | 2: DIACON | 0: ADMIN');
            $table->dateTime('last_login')->nullable();

            $table->smallInteger('is_deleted')->default(0);
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
        Schema::dropIfExists('users');
    }
}
