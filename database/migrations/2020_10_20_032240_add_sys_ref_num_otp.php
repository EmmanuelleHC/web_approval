<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSysRefNumOtp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sys_ref_num_otp', function (Blueprint $table) {
            $table->bigIncrements('ID')->primary_key();
            $table->integer('USER_ID');
            $table->string('REF_NUM');
            $table->string('OTP_NUM')->unique();
            $table->date('ACTIVE_DATE');
            $table->date('INACTIVE_DATE');
            $table->string('USABLE_FLAG');
            $table->foreign('USER_ID')->references('ID')->on('sys_user')->onDelete('cascade');
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
        Schema::dropIfExists('sys_ref_num_otp');
    }
    
}
