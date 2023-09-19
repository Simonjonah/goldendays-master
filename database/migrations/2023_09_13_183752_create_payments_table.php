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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('amount')->default(0)->nullable();
            $table->string('medicals')->default(0)->nullable();
            $table->string('extracuri_fee')->default(0)->nullable();
            $table->string('term')->default(0)->nullable();
            $table->string('bookamount')->default(0)->nullable();
            $table->string('classname')->default(0)->nullable();
            $table->string('dev_amount')->default(0)->nullable();
            $table->string('uniforms_amount')->default(0)->nullable();
            $table->string('pta_amount')->default(0)->nullable();
            $table->string('form_amount')->default(0)->nullable();
            $table->string('tuition')->default(0)->nullable();
            $table->string('address')->nullable();
            
            $table->string('status')->default('pending')->nullable();
            $table->string('transaction_id')->nullable();
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
        Schema::dropIfExists('payments');
    }
};
