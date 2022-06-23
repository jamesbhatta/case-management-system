<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('versp_id');
            $table->foreign('versp_id')->references('id')->on('versps')->onDelete('cascade');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('dob');
            $table->date('dob_ad')->nullable();
            $table->string('age');
            $table->string('gender');
            $table->string('marrige_status');
            $table->string('district');
            $table->string('municipality');
            $table->string('ward');
            $table->string('contact');
            $table->string('email')->nullable();
            $table->string('cast');
            $table->string('religion');
            $table->string('education');
            $table->string('disability_status');
            $table->string('family_number');
            $table->string('disable_family_number');
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
        Schema::dropIfExists('personal_details');
    }
}
