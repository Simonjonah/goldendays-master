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
            
            $table->string('user_id')->nullable();
            $table->string('fname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('bloodgroup')->nullable();
            $table->text('images')->nullable();
            $table->string('genotype')->nullable();
            $table->string('lastschooladdress')->nullable();
            $table->string('preclassname')->nullable();
            $table->string('age')->nullable();
            $table->string('promotion')->nullable();
            
            $table->string('phone')->nullable();
            $table->string('classname')->nullable();
            $table->string('disability')->nullable();
            $table->string('designation')->nullable();
            $table->string('alms')->nullable();
            $table->string('section')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('slug')->nullable();
            $table->string('term')->nullable();
            $table->string('previouschoolname')->nullable();
            $table->string('ref_no1')->nullable();
            $table->string('regnumber', 50)->nullable()->unique();

            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();

            $table->string('fathername')->nullable();
            $table->string('mothername')->nullable();
            $table->string('fatheroccupation')->nullable();
            $table->string('motheroccupation')->nullable();
            $table->string('maritalstatus')->nullable();
            $table->string('officeaddress')->nullable();
            $table->string('stateoforigin')->nullable();
            $table->string('doctorname')->nullable();
            $table->string('homeaddress')->nullable();
            $table->string('doctorphone')->nullable();
            $table->string('emergencyphone')->nullable();
            $table->string('emergencyaddress')->nullable();
            $table->string('whointro')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('status')->nullable();
            $table->string('role')->nullable();

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
        Schema::dropIfExists('users');
    }
};
