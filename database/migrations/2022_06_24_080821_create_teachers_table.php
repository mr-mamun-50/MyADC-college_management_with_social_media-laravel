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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('index');
            $table->string('name');
            $table->string('position');
            $table->string('department');
            $table->string('subject');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('dob');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('photo')->nullable();
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('nid');
            $table->text('edu_qualification');
            $table->string('salary');
            $table->string('cv')->nullable();
            $table->string('edu_certificate')->nullable();
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
        Schema::dropIfExists('teachers');
    }
};
