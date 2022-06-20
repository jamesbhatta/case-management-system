<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformToPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inform_to_parties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cases_id');
            $table->foreign('cases_id')->references('id')->on('cases')->onDelete('cascade');
            $table->string('relation');
            $table->string('info');
            $table->string('heir_name');
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
        Schema::dropIfExists('inform_to_parties');
    }
}
