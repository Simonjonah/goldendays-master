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
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('fatheroccupation')->nullable();
            $table->string('motheroccupation')->nullable();
            $table->string('phone')->nullable();
            $table->string('student_id')->nullable();
            $table->string('officeaddress')->nullable();
            $table->string('stateoforigin')->nullable();
            $table->string('doctorname')->nullable();
            $table->string('homeaddress')->nullable();
            $table->string('doctorphone')->nullable();
            $table->string('emergencyphone')->nullable();
            $table->string('emergencyaddress')->nullable();
            $table->string('whointro')->nullable();
            $table->string('designation')->nullable();
            $table->string('alms')->nullable();
            $table->string('section')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();
            $table->string('slug')->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('guardians');
    }
};
