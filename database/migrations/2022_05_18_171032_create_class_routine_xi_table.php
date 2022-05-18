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
        Schema::create('class_routine_xi', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('sc10_30')->nullable();
            $table->string('hum10_30')->nullable();
            $table->string('bus10_30')->nullable();
            $table->string('sc11_15')->nullable();
            $table->string('hum11_15')->nullable();
            $table->string('bus11_15')->nullable();
            $table->string('sc12_00')->nullable();
            $table->string('hum12_00')->nullable();
            $table->string('bus12_00')->nullable();
            $table->string('sc12_45')->nullable();
            $table->string('hum12_45')->nullable();
            $table->string('bus12_45')->nullable();
            $table->string('sc1_30')->nullable();
            $table->string('hum1_30')->nullable();
            $table->string('bus1_30')->nullable();
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
        Schema::dropIfExists('class_routine_xi');
    }
};
