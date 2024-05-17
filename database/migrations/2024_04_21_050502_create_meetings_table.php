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
        
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->date('dateofmeeting');
            $table->string('location');
            $table->string('time');
            $table->string('fund');
            $table->boolean('attendance');
            $table->integer('quantity');
            $table->boolean('payment');
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
        Schema::dropIfExists('meetings');
    }
};
