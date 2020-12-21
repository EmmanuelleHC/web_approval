<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\EmpMaster;
class ApprovalMaster extends Model
{
    protected $table = 'approval_master';
   
    
     public function get_data_master_approval()
	{
		$statement = 'SELECT am.ID,am.ID_APP,(SELECT APP_NAME FROM sys_app_master sam where sam.ID=am.ID_APP) AS APP,am.ORG_ID,(SELECT BRANCH_NAME FROM sys_branch where ORG_ID=am.ORG_ID) AS BRANCH,am.AMOUNT_FROM,am.AMOUNT_TO,am.ACTIVE_FLAG from approval_master am';
		$data=DB::select(DB::raw($statement));        
        return $data;
	}
	public function compare_data_approval($id,$app,$branch,$amount_from,$amount_to)
	{

		if($id!=''){
			$cek=DB::table('approval_master')
	            ->where('ID', '!=', $id)
	            ->where(function ($query)  use ($app,$branch,$amount_from,$amount_to) {
	                $query->where('ID_APP','=',$app)
	                      ->where('ORG_ID',$branch)->where('AMOUNT_FROM',$amount_from)
	                      ->where('AMOUNT_TO',$amount_to);
            })
            ->get();
		}else{
			$cek=DB::table('approval_master')
	            ->where(function ($query)  use ($app,$branch,$amount_from,$amount_to) {
	                $query->where('ID_APP','=',$app)
	                      ->where('ORG_ID',$branch)->where('AMOUNT_FROM',$amount_from)
	                      ->where('AMOUNT_TO',$amount_to);
            })
            ->get();
		}
		
        return $cek->count();
	}

	public function insert_data_approval($app,$branch,$active_flag,$amount_from,$amount_to,$appr1,$appr2,$appr3,$appr4,$appr5,$appr6,$appr7,$appr8,$appr9,$appr10,$user_id)
	{
		$approval=new ApprovalMaster();
	    $approval->ID_APP=$app;
	    $approval->ORG_ID=$branch;
	    $approval->AMOUNT_FROM=$amount_from;
	    $approval->AMOUNT_TO=$amount_to;
	    $approval->ID_APPR_1=$appr1;
	    $approval->ID_APPR_2=isset($appr2) ? $appr2 :null;
	    $approval->ID_APPR_3=isset($appr3) ? $appr3 :null;
	    $approval->ID_APPR_4=isset($appr4) ? $appr4 :null;
	    $approval->ID_APPR_5=isset($appr5) ? $appr5 :null;
	    $approval->ID_APPR_6=isset($appr6) ? $appr6 :null;
	    $approval->ID_APPR_7=isset($appr7) ? $appr7 :null;
	    $approval->ID_APPR_8=isset($appr8) ? $appr8 :null;
	    $approval->ID_APPR_9=isset($appr9) ? $appr9 :null;
	    $approval->ID_APPR_10=isset($appr10) ? $appr10 :null;
	    $approval->CREATED_BY=$user_id;
	    $approval->UPDATED_BY=$user_id;
	  	if($active_flag=='Y'){
	  		 $approval->ACTIVE_FLAG='Y';
	  		 $approval->PRIMARY_FLAG='Y';
	  		
	  	}else{
	  		$approval->ACTIVE_FLAG='N';
	  		$approval->PRIMARY_FLAG='Y';

	  	}
   		if($approval->save()){
	      return 1;
	    }else{
	      return 0;
	    }

	}

	public function validate_approval($appr1,$appr2,$appr3,$appr4,$appr5,$appr6,$appr7,$appr8,$appr9,$appr10)
	{
		$data=[];
		$validated=true;
		if($appr1==''||$appr1==null){
			$validated=false;
		}else{
			array_push($data,$appr1);
			array_push($data,$appr2);
			array_push($data,$appr3);
			array_push($data,$appr4);
			array_push($data,$appr5);
			array_push($data,$appr6);
			array_push($data,$appr7);
			array_push($data,$appr8);
			array_push($data,$appr9);
			array_push($data,$appr10);
			$unique = array_filter(array_unique($data));
			$data=array_filter($data);
			if ( count($data) != count($unique) ) {
			 	$validated=false;
			}
			if(($appr2==null || $appr2 =='') && ($appr3!=null || $appr3!=''))
			{
				$validated=false;
			}

			if(($appr3==null || $appr3 =='') && ($appr4!=null || $appr4!=''))
			{
				$validated=false;
			}

			if(($appr4==null || $appr4 =='') && ($appr5!=null || $appr5!=''))
			{
				$validated=false;
			}
			if(($appr5==null || $appr5 =='') && ($appr6!=null || $appr6!=''))
			{
				$validated=false;
			}
			if(($appr6==null || $appr6 =='') && ($appr7!=null || $appr7!=''))
			{
				$validated=false;
			}
			if(($appr7==null || $appr7 =='') && ($appr8!=null || $appr8!=''))
			{
				$validated=false;
			}
			if(($appr8==null || $appr8 =='') && ($appr9!=null || $appr9!=''))
			{
				$validated=false;
			}
			if(($appr9==null || $appr9 =='') && ($appr10!=null || $appr10!=''))
			{
				$validated=false;
			}
		}



		return $validated;

	}

	public function update_data_approval($id,$app,$branch,$active_flag,$amount_from,$amount_to,$appr1,$appr2,$appr3,$appr4,$appr5,$appr6,$appr7,$appr8,$appr9,$appr10,$user_id)
	{
		if($active_flag =='Y'){
           

           $approval= ApprovalMaster::where('ID',$id)
          ->update(['ID_APP' =>$app,
                'ORG_ID'=>$branch,
                'AMOUNT_FROM'=>$amount_from,
                'AMOUNT_TO'=>$amount_to,
                'ACTIVE_FLAG'=>$active_flag,
                'ID_APPR_1' =>$appr1,
                'ID_APPR_2' =>$appr2,
                'ID_APPR_3' =>$appr3,
                'ID_APPR_4' =>$appr4,
                'ID_APPR_5' =>$appr5,
                'ID_APPR_6' =>$appr6,
                'ID_APPR_7' =>$appr7,
                'ID_APPR_8' =>$appr8,
                'ID_APPR_9' =>$appr9,
                'ID_APPR_10' =>$appr10,
                'UPDATED_BY'=>$user_id,
                'PRIMARY_FLAG'=>'Y',
                'UPDATED_AT'=>date('Y-m-d')
                ]);
            return 1;

        }
        else if($active_flag =='N'){

            
            $approval= ApprovalMaster::where('ID',$id)
          ->update(['ID_APP' =>$app,
                'ORG_ID'=>$branch,
                'AMOUNT_FROM'=>$amount_from,
                'AMOUNT_TO'=>$amount_to,
                'ACTIVE_FLAG'=>$active_flag,
                'ID_APPR_1' =>$appr1,
                'ID_APPR_2' =>$appr2,
                'ID_APPR_3' =>$appr3,
                'ID_APPR_4' =>$appr4,
                'ID_APPR_5' =>$appr5,
                'ID_APPR_6' =>$appr6,
                'ID_APPR_7' =>$appr7,
                'ID_APPR_8' =>$appr8,
                'ID_APPR_9' =>$appr9,
                'ID_APPR_10' =>$appr10,
                'UPDATED_BY'=>$user_id,
                'PRIMARY_FLAG'=>'N',
                'UPDATED_AT'=>date('Y-m-d')
                ]);
            return 1;
           
           
        }
	}
	public function get_approval_avail()
	{
		$statement = EmpMaster::all();

		return $statement;
	}
	public function get_data_approval_detail($id)
	{
		$statement = 'SELECT ID_APPR_1,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_1) AS APPR_1,ID_APPR_2,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_2) AS APPR_2,ID_APPR_3,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_3) AS APPR_3,ID_APPR_4,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_4) AS APPR_4,ID_APPR_5,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_5) AS APPR_5,ID_APPR_6,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_7) AS APPR_7,ID_APPR_7,ID_APPR_8,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_8) AS APPR_8,ID_APPR_9,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_9) AS APPR_9,ID_APPR_10,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_10) AS APPR_10,ID_APPR_11,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_11) AS APPR_11,ID_APPR_12,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_12) AS APPR_12,ID_APPR_13,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_13) AS APPR_13,ID_APPR_14,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_14) AS APPR_14,ID_APPR_15,(SELECT EMP_NUMBER FROM emp_master where ID=ID_APPR_15) AS APPR_15,AMOUNT_TO,AMOUNT_FROM,ORG_ID,ID_APP AS APP from approval_master am WHERE ID='.$id;
		$data=DB::select(DB::raw($statement));
		
		 return $data;
	}
}
