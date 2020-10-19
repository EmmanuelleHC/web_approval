<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApprovalMaster extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('approval_master', function (Blueprint $table) {
            $table->integer('EMP_ID');
            $table->integer('ID_APP');
            $table->integer('ORG_ID');
            $table->integer('AMOUNT_FROM');            
            $table->integer('AMOUNT_TO');
            $table->integer('ID_APPR_1');
            $table->integer('ID_APPR_2');
            $table->integer('ID_APPR_3');
            $table->integer('ID_APPR_4');
            $table->integer('ID_APPR_5');
            $table->integer('ID_APPR_6');
            $table->integer('ID_APPR_7');
            $table->integer('ID_APPR_8');
            $table->integer('ID_APPR_9');
            $table->integer('ID_APPR_10');
            $table->integer('ID_APPR_11');
            $table->integer('ID_APPR_12');
            $table->integer('ID_APPR_13');
            $table->integer('ID_APPR_14');
            $table->integer('ID_APPR_15');
            $table->string('ACTIVE_FLAG');
            $table->string('PRIMARY_FLAG');
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
        Schema::table('approval_master', function (Blueprint $table) {
            //
        });
    }
}
