<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class P3atTrx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('p3at_master_trx', function (Blueprint $table) {
            $table->unsignedBigInteger('COMPANY_ID');
            $table->integer('ORG_ID');
            $table->string('P3AT_NUMBER')->unique();
            $table->date('P3AT_DATE');
            $table->integer('ASSET_NUMBER');
            $table->string('ASSET_NAME');
            $table->date('EFFECTIVE_DATE');
            $table->integer('QTY_ASSET');
            $table->integer('ASSET_PRICE');  
            $table->string('ASSET_LOCATION');            
            $table->integer('COST_OF_REMOVAL');
            $table->integer('BOOKS_PRICE');
            $table->string('STATUS');
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
        Schema::table('p3at_master_trx', function (Blueprint $table) {
            //
        });
    }
}
