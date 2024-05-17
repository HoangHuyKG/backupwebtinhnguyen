<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('username');
            $table->string('password');
            $table->string('studentcode');
            $table->string('teammembercode');
            $table->string('fullname');
            $table->boolean('sex');
            $table->date('birthday');
            $table->date('dateonteam');
            $table->string('class');
            $table->integer('course');
            $table->string('branch');
            $table->string('numberphone');
            $table->string('email');
            $table->integer('numberofactivity');
            $table->string('image');
            $table->integer('role');
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
};
