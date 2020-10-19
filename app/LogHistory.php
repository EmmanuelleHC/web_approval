<?php

namespace App;
use App\SysCompany;

use App\SysBranch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class LogHistory extends Model
{
    protected $table = 'log_history';
    

    

	public function get_log_history($p3at_number)
	{
	     $statement='SELECT lh.DESCRIPTION,lh.APPROVAL_TYPE,lh.REASON_APPROVAL,lh.CREATED_AT,lh.APPROVAL_KE,(SELECT EMP_NAME FROM emp_master em where em.ID=lh.EMP_ID)AS EMP_NAME FROM log_history lh,p3at_master_trx pmt,approval_master am where lh.ID_TRX=pmt.ID AND pmt.ORG_ID=am.ORG_ID AND pmt.P3AT_NUMBER=? ORDER BY lh.CREATED_AT DESC';
	     $data=DB::select(DB::raw($statement),array($p3at_number));        
         return $data;
	}

	

	
}
