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
        Schema::create('final_exam', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('st_id');
            $table->string('c_class');
            $table->string('bangla1')->nullable();
            $table->string('bangla2')->nullable();
            $table->string('english1')->nullable();
            $table->string('english2')->nullable();
            $table->string('ict')->nullable();
            $table->string('physics1')->nullable();
            $table->string('physics2')->nullable();
            $table->string('chemistry1')->nullable();
            $table->string('chemistry2')->nullable();
            $table->string('biology1')->nullable();
            $table->string('biology2')->nullable();
            $table->string('h_math1')->nullable();
            $table->string('h_math2')->nullable();
            $table->string('accounting1')->nullable();
            $table->string('accounting2')->nullable();
            $table->string('management1')->nullable();
            $table->string('management2')->nullable();
            $table->string('economics1')->nullable();
            $table->string('economics2')->nullable();
            $table->string('fbi1')->nullable();
            $table->string('fbi2')->nullable();
            $table->string('logic1')->nullable();
            $table->string('logic2')->nullable();
            $table->string('civics1')->nullable();
            $table->string('civics2')->nullable();
            $table->string('history1')->nullable();
            $table->string('history2')->nullable();
            $table->string('gpa')->nullable();
            $table->string('grade')->nullable();
            $table->timestamps();
            $table->foreign('st_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('final_exam');
    }
};
