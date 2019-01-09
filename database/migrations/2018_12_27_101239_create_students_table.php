<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('surname');
            $table->string('email');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('sex');
            $table->string('ms');
            $table->date('dob');
            $table->string('religion');
            $table->string('Nationality');
            $table->string('state');
            $table->string('lga');
            $table->string('phone');
            $table->string('phone2')->nullable();
            $table->string('email2')->nullable();
            $table->string('image')->nullable();
            $table->string('sponsor');
            $table->string('session');
            $table->string('birth')->nullable();
            $table->string('type');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
