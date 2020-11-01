<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmpMaster extends Model
{
    protected $table = 'emp_master';
   
    public function get_data_master_employee()
	{
		$statement = 'SELECT emp.ID,emp.EMP_NUMBER,emp.EMP_NAME,emp.DESCRIPTION,emp.EMAIL_USER,emp.EMAIL_OTP,(SELECT COMPANY_NAME FROM sys_company where COMPANY_ID=emp.COMPANY_ID) as COMPANY,emp.COMPANY_ID,emp.ORG_ID,(SELECT BRANCH_NAME FROM sys_branch where ORG_ID=emp.ORG_ID) AS BRANCH,emp.ACTIVE_FLAG,(SELECT USERNAME from sys_user  where ID=emp.USER_ID) AS USERNAME,emp.USER_ID,emp.INACTIVE_DATE from emp_master as emp';
		$data=DB::select(DB::raw($statement));        
        return $data;
	}

	public function get_username_existing()
	{
		$statement='SELECT ID,USERNAME FROM sys_user where ID NOT IN (SELECT emp.USER_ID FROM emp_master emp)';
		$data=DB::select(DB::raw($statement));        
        return $data;
	}

	public function get_username_existing2($user_id)
	{
		$statement='SELECT ID,USERNAME FROM sys_user where ID NOT IN (SELECT emp.USER_ID FROM emp_master emp)
		union SELECT ID,USERNAME FROM sys_user where ID IN (SELECT emp.USER_ID FROM emp_master emp where USER_ID ='.$user_id.') ';
		$data=DB::select(DB::raw($statement));        
        return $data;
	}

  public function insert_data_emp($emp_num,$emp_name,$emp_desc,$email_user,$email_otp,$company,$org_id,$active_flag,$user_id,$session)
  {
  	$emp=new EmpMaster();
    $emp->EMP_NUMBER=$emp_num;
    $emp->EMP_NAME=$emp_name;
    $emp->DESCRIPTION=$emp_desc;
    $emp->EMAIL_USER=$email_user;
    $emp->EMAIL_OTP=$email_otp;
    $emp->COMPANY_ID=$company;
    $emp->ORG_ID=$org_id;
    $emp->USER_ID=$user_id;
    $emp->CREATED_BY=$session;
    $emp->UPDATED_BY=$session;
  	if($active_flag=='Y'){
  		 $emp->ACTIVE_FLAG='Y';
  		 $emp->ACTIVE_DATE=date('Y-m-d');
  		 $emp->INACTIVE_DATE=null;
  	}else{
  		 $emp->ACTIVE_FLAG='N';
  		 $emp->INACTIVE_DATE=date('Y-m-d');
  	}
   
    if($emp->save()){
      return 1;
    }else{
      return 0;
    }
    
   
  }
   public function compare_data_emp($emp_num,$emp_name,$emp_desc,$emp_id)
    {
      if($emp_id=='')
      {
         $cek=DB::table('emp_master')
            ->where('EMP_NAME','=',$emp_name)
            ->orWhere('DESCRIPTION',$emp_desc)->orWhere('EMP_NUMBER',$emp_num)->get();
      }else{
         $cek=DB::table('emp_master')
            ->where('ID', '!=', $emp_id)
            ->where(function ($query)  use ($emp_num,$emp_name,$emp_desc) {
                $query->where('EMP_NAME','=',$emp_name)
                      ->orWhere('DESCRIPTION',$emp_desc)->orWhere('EMP_NUMBER',$emp_num);
            })
            ->get();

      }
    	  

       return $cek->count();
       
    }


     public function update_data_emp($emp_id,$emp_num,$emp_name,$emp_desc,$email_user,$email_otp,$company,$org_id,$active_flag,$user_id,$session)
    {
        if($active_flag =='Y'){
           

            $emp= EmpMaster::where('ID',$emp_id)
          ->update(['EMP_NUMBER' =>$emp_num,
                'EMP_NAME'=>$emp_name,
                'DESCRIPTION'=>$emp_desc,
                'EMAIL_USER'=>$email_user,
                'EMAIL_OTP'=>$email_otp,
                'COMPANY_ID'=>$company,
                'ORG_ID'=>$org_id,
                'USER_ID'=>$user_id,
                'ACTIVE_FLAG'=>'Y',
                'INACTIVE_DATE'=>null,
                'UPDATED_AT'=>date('Y-m-d')
                ]);
            return 1;

        }
        else if($active_flag =='N'){

            
            $emp= EmpMaster::where('ID',$emp_id)
          ->update(['EMP_NUMBER' =>$emp_num,
                'EMP_NAME'=>$emp_name,
                'DESCRIPTION'=>$emp_desc,
                'EMAIL_USER'=>$email_user,
                'EMAIL_OTP'=>$email_otp,
                'COMPANY_ID'=>$company,
                'ORG_ID'=>$org_id,
                'USER_ID'=>$user_id,
                'ACTIVE_FLAG'=>'N',
                'INACTIVE_DATE'=>date('Y-m-d'),
                'UPDATED_AT'=>date('Y-m-d')
                ]);
            return 1;
           
           
        }

      
    }
}
