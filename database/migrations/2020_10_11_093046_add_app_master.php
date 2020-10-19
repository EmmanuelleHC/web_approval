<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sys_app_master', function (Blueprint $table) {
            //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sys_app_master', function (Blueprint $table) {
            $table->string('APP_NAME')->unique();
            $table->string('CREATED_BY');
            $table->string('UPDATED_BY');
            $table->timestamps();
        });
    }
}
