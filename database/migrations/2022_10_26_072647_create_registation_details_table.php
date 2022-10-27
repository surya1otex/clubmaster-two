<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registation_details', function (Blueprint $table) {
            $table->increments('registation_id');
            $table->string('applicant_name');
            $table->string('email_id');
            $table->string('mobile_no');
            $table->string('gender');
            $table->date('dob');
            $table->string('image_path');
            $table->integer('club_id');
            $table->integer('sports_id');
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
        Schema::dropIfExists('registation_details');
    }
}
