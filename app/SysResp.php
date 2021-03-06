<?php

namespace App;
use App\SysRole;
use App\SysMenu;
use App\SysBranch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysResp extends Model
{
    protected $table = 'sys_responsibility';
    public function get_user_resp($user_id){
		$statement = "SELECT SUR.SYS_ID_RESP,SUR.USER_ID,SUR.RESP_ID,SR.RESPONSIBILITY_NAME,SR.BRANCH_ID,
			(SELECT SB.BRANCH_NAME FROM SYS_BRANCH SB WHERE SB.BRANCH_ID = SR.BRANCH_ID) as BRANCH_NAME,
			(SELECT SC.COMPANY_NAME FROM SYS_COMPANY SC, SYS_BRANCH SB WHERE SC.COMPANY_ID = SB.COMPANY_ID AND SB.BRANCH_ID = SR.BRANCH_ID) as COMPANY_NAME,		
			(SELECT SB.COMPANY_ID FROM SYS_BRANCH SB WHERE SB.BRANCH_ID = SR.BRANCH_ID) as COMPANY_ID,		
			(SELECT SB.SOB_ID FROM SYS_BRANCH SB WHERE SB.BRANCH_ID = SR.BRANCH_ID) as SOB_ID
			FROM SYS_USER_RESP SUR, SYS_RESPONSIBILITY SR
			WHERE SUR.RESP_ID = SR.RESPONSIBILITY_ID  and SUR.USER_ID = ".$user_id."  AND SUR.ACTIVE_FLAG = 'Y'";
 		$data=DB::select(DB::raw($statement));        
        return $data;
	}
	public function get_list_user_resp($role_id){
		$statement = 'SELECT SR.RESPONSIBILITY_ID,SR.RESPONSIBILITY_ID,SR.ROLE_ID,SR.BRANCH_ID,SR.MENU_ID,SR.RESPONSIBILITY_NAME,
		SR.RESPONSIBILITY_DESC,SR.ACTIVE_FLAG,SR.ACTIVE_DATE,SR.INACTIVE_DATE,SR.UPDATED_AT,
		(select SB.COMPANY_ID from SYS_BRANCH SB where SB.BRANCH_ID = SR.BRANCH_ID) as COMPANY_ID,
		(select ROLE_NAME from SYS_ROLE where ROLE_ID = SR.ROLE_ID) as ROLE,
		(select SC.COMPANY_NAME from SYS_COMPANY SC where SC.COMPANY_ID = 
		(select SB.COMPANY_ID from SYS_BRANCH SB where SB.BRANCH_ID = SR.BRANCH_ID)) as COMPANY_NAME,
		(select CONCAT(SB.ORG_TYPE,\' - \',SB.BRANCH_NAME) from SYS_BRANCH SB where SB.BRANCH_ID = SR.BRANCH_ID) as BRANCH_NAME,
		(select SM.MENU_NAME from SYS_MENU SM where SM.MENU_ID = SR.MENU_ID) as MENU
		FROM SYS_RESPONSIBILITY SR where SR.ROLE_ID=(SELECT ROLE_ID FROM sys_role where ROLE_NAME=\''.$role_id.'\') ORDER BY SR.RESPONSIBILITY_ID';
		$data=DB::select(DB::raw($statement));        
        return $data;
	}

	public function get_data_master_resp()
	{
		$statement = 'SELECT SR.RESPONSIBILITY_ID,SR.RESPONSIBILITY_ID,SR.ROLE_ID,SR.BRANCH_ID,SR.MENU_ID,SR.RESPONSIBILITY_NAME,
		SR.RESPONSIBILITY_DESC,SR.ACTIVE_FLAG,SR.ACTIVE_DATE,SR.INACTIVE_DATE,SR.UPDATED_AT,
		(select SB.COMPANY_ID from SYS_BRANCH SB where SB.BRANCH_ID = SR.BRANCH_ID) as COMPANY_ID,
		(select ROLE_NAME from SYS_ROLE where ROLE_ID = SR.ROLE_ID) as ROLE,
		(select SC.COMPANY_NAME from SYS_COMPANY SC where SC.COMPANY_ID = 
		(select SB.COMPANY_ID from SYS_BRANCH SB where SB.BRANCH_ID = SR.BRANCH_ID)) as COMPANY_NAME,
		(select CONCAT(SB.ORG_TYPE,\' - \',SB.BRANCH_NAME) from SYS_BRANCH SB where SB.BRANCH_ID = SR.BRANCH_ID) as BRANCH_NAME,
		(select SM.MENU_NAME from SYS_MENU SM where SM.MENU_ID = SR.MENU_ID) as MENU
		FROM SYS_RESPONSIBILITY SR  ORDER BY SR.RESPONSIBILITY_ID ';
		$data=DB::select(DB::raw($statement));        
        return $data;
	}

	public function get_resp_active_flag($resp_id)
	{
		$data=SysResp::where('RESPONSIBILITY_ID',$resp_id)->value('ACTIVE_FLAG');
    	return $data;
	}

	public function insert_data_resp($role_id,$branch_id,$menu_id,$resp_name,$resp_desc,$act_flag,$user_id)
	{	$data=new SysResp();
		$data->ROLE_ID=$role_id;
		$data->MENU_ID=$menu_id;
		$data->RESPONSIBILITY_NAME=$resp_name;
		$data->RESPONSIBILITY_DESC=$resp_desc;
		$data->BRANCH_ID=$branch_id;
		$data->ACTIVE_FLAG=$act_flag;
		$data->ACTIVE_DATE=date('Y-m-d');
		$data->CREATED_BY=$user_id;
		$data->LAST_UPDATE_BY=$user_id;
		return $data->save();
	}


	public function compare_data_resp($resp_name,$resp_desc,$resp_id)
    {
    	if($resp_id=='')
    	{
    		$cek=DB::table('sys_responsibility')
            ->where('RESPONSIBILITY_NAME','=',$resp_name)->orWhere('RESPONSIBILITY_DESC',$resp_desc)->get();
    	}else{
    		 $cek=DB::table('sys_responsibility')
            ->where('RESPONSIBILITY_ID', '!=', $resp_id)
            ->where(function ($query)  use ($resp_name,$resp_desc) {
                $query->where('RESPONSIBILITY_NAME','=',$resp_name)
                      ->orWhere('RESPONSIBILITY_DESC',$resp_desc);
            })
            ->get();
    	}

      

       return $cek->count();
    }
	public function update_data_resp($resp_id,$resp_name,$resp_desc,$act_flag,$user_id)
	{

		if($act_flag == 'Y'){
			  $data=SysResp::where('RESPONSIBILITY_ID',$resp_id)->update(['RESPONSIBILITY_NAME' =>$resp_name,
                'RESPONSIBILITY_DESC'=>$resp_desc,
                'INACTIVE_DATE'=>null,
                'ACTIVE_FLAG'=>'Y',
                'LAST_UPDATE_BY'=>$user_id,
                'UPDATED_AT'=>date('Y-m-d')
                ]);

			return 1;
		}
		else if($act_flag == 'N'){
			 $data=SysResp::where('RESPONSIBILITY_ID',$resp_id)->update(['RESPONSIBILITY_NAME' =>$resp_name,
                'RESPONSIBILITY_DESC'=>$resp_desc,
                'INACTIVE_DATE'=>date('Y-m-d'),
                'LAST_UPDATE_BY'=>$user_id,
                'ACTIVE_FLAG'=>'N',
                'UPDATED_AT'=>date('Y-m-d')
                ]);

			return 1;
			
		}
		
	}
}
