<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEmpMasterToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emp_master', function (Blueprint $table) {
            $table->integer('EMP_NUMBER');
            $table->string('EMP_NAME');
            $table->string('DESCRIPTION');            
            $table->string('EMAIL_USER');
            $table->string('EMAIL_OTP');
            $table->integer('COMPANY_ID');
            $table->integer('ORG_ID');
            $table->string('ACTIVE_FLAG');
            $table->date('INACTIVE_DATE');
            $table->integer('USER_ID');
            $table->string('CREATED_BY');
            $table->string('UPDATED_BY');
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
        Schema::table('emp_master', function (Blueprint $table) {
            //
        });
    }
}
