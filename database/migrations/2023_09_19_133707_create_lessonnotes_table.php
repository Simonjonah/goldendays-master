<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessonnotes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained('users')->onDelete('cascade')->update('cascade');
            $table->string('fname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('surname')->nullable();
            $table->string('classname')->nullable();
            $table->string('term')->nullable();
            $table->string('academic_session')->nullable();
            $table->text('images')->nullable();
            $table->string('ref_no')->nullable();
            $table->string('title')->nullable();
            $table->string('subjectname')->nullable();
            $table->text('messages')->nullable();
            $table->string('status')->nullable();
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('lessonnotes');
    }
};
