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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('st_id');
            $table->string('name');
            $table->string('session');
            $table->string('department');
            $table->string('c_class');
            $table->string('fathers_name');
            $table->string('mothers_name');
            $table->string('dob');
            $table->string('gender');
            $table->string('phone');
            $table->string('email');
            $table->string('photo')->nullable();
            $table->string('present_address');
            $table->string('permanent_address');
            $table->string('birth_reg_nid');
            $table->string('ssc_res');
            $table->string('ssc_board');
            $table->string('ssc_dept');
            $table->string('ssc_school');
            $table->string('ssc_year');
            $table->string('ssc_testimonial')->nullable();
            $table->string('ssc_marksheet')->nullable();
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
        Schema::dropIfExists('students');
    }
};
