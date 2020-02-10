<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('records', function (Blueprint $table) {
//            $table->increments('id');
//            $table->integer('user_id')->unsigned();
//            $table->text('service');
//            $table->float('price', 8, 2);
//            $table->string('name')->nullable();
//            $table->string('email')->nullable();
//            $table->string('phone', 11)->nullable();
//            $table->enum('status', ['PAID', 'NOT PAID'])->default('NOT PAID');
//            $table->string('ref', 16)->unique();
//            $table->softDeletes();
//            $table->timestamp('paid_at')->nullable();
//            $table->timestamps();
//
//            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
