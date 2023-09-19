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
            $table->string('fathername');
            $table->string('mothername');
            $table->string('fatheroccupation');
            $table->string('motheroccupation');
            $table->string('phone');
            $table->string('maritalstatus');
            $table->string('officeaddress');
            $table->string('stateoforigin');
            $table->string('doctorname');
            $table->string('homeaddress');
            $table->string('doctorphone');
            $table->string('emergencyphone');
            $table->string('emergencyaddress');
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
