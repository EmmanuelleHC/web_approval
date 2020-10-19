<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogHistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('log_history', function (Blueprint $table) {
            $table->integer('ID_TRX');
            $table->integer('ID_APP');
            $table->string('DESCRIPTION');
            $table->string('APPROVAL_TYPE');
            $table->string('REASON_APPROVAL');
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
        Schema::table('log_history', function (Blueprint $table) {
            //
        });
    }
}
