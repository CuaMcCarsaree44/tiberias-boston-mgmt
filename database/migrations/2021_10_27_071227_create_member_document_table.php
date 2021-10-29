<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_document', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->text('document_link')->nullable();
            $table->timestamps();

            $table->foreign('member_id')
                ->references('id')
                ->on('member');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_document');
    }
}
