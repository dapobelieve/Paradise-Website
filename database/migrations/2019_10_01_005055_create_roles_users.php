<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('role_user', function (Blueprint $table) {
//            $table->integer('user_id')->unsigned();
//            $table->integer('role_id')->unsigned();
//            $table->timestamps();
//
//
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
//            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
//
//            $table->primary(['user_id', 'role_id']);
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
