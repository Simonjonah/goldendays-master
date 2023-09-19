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
        Schema::create('classactivities', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('student_id')->nullable();
            $table->string('topic')->nullable();
            $table->string('subject')->nullable();
            $table->string('youtube')->nullable();
            $table->Text('messages')->nullable();
            $table->Text('images')->nullable();
            $table->Text('slug')->nullable();
            $table->string('reply')->nullable();
             
            $table->Text('status')->nullable();
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
        Schema::dropIfExists('classactivities');
    }
};
