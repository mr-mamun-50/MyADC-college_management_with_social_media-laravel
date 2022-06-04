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
        Schema::create('admission_security_code', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ssc_roll');
            $table->string('ssc_reg');
            $table->string('security_code');
            $table->string('payment_transection');
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
        Schema::dropIfExists('admission_security_code');
    }
};
