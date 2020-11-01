<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApprovalMaster extends Model
{
    protected $table = 'approval_master';
   
    
     public function get_data_master_approval()
	{
		$statement = 'SELECT am.ID,am.ID_APP,(SELECT APP_NAME FROM sys_app_master sam where sam.ID=am.ID_APP) AS APP,am.ORG_ID,(SELECT BRANCH_NAME FROM sys_branch where ORG_ID=am.ORG_ID) AS BRANCH,am.AMOUNT_FROM,am.AMOUNT_TO,am.ACTIVE_FLAG from approval_master am';
		$data=DB::select(DB::raw($statement));        
        return $data;
	}
	public function get_data_approval_detail($id)
	{
		$statement = 'SELECT ID_APPR_1,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_1) AS APPR_1,ID_APPR_2,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_2) AS APPR_2,ID_APPR_3,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_3) AS APPR_3,ID_APPR_4,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_4) AS APPR_4,ID_APPR_5,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_5) AS APPR_5,ID_APPR_6,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_7) AS APPR_7,ID_APPR_7,ID_APPR_8,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_8) AS APPR_8,ID_APPR_9,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_9) AS APPR_9,ID_APPR_10,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_10) AS APPR_10,ID_APPR_11,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_11) AS APPR_11,ID_APPR_12,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_12) AS APPR_12,ID_APPR_13,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_13) AS APPR_13,ID_APPR_14,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_14) AS APPR_14,ID_APPR_15,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_15) AS APPR_15 from approval_master am WHERE ID='.$id;
		$data=DB::select(DB::raw($statement));
		
		 return $data;
	}
}
