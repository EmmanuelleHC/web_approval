<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

use App\SysResp;
use App\User;
class SysUserResp extends Model
{
    protected $table = 'sys_user_resp';
    protected $fillable = ['SYS_ID_RESP', 'USER_ID', 'RESP_ID','ACTIVE_DATE','ACTIVE_FLAG'];

    public function deleteResp($username){

        return SysUserResp::where('USER_ID',User::where('username',$username)->value('ID'))->delete();
    }


    public function get_resp_user($username){

        $query="SELECT su.*, sr.ROLE_ID, sres.RESPONSIBILITY_NAME,sres.RESPONSIBILITY_DESC,sres.RESPONSIBILITY_ID, sb.BRANCH_ID, sb.BRANCH_NAME, sb.SOB_ID, sb.COMPANY_ID, sc.COMPANY_NAME, (FLOOR(10000 + RAND() * 89999)) AS UNIQ_NUMBER 
        FROM sys_user su, sys_role sr, sys_responsibility sres, sys_branch sb, sys_user_resp sur, sys_company sc 
        WHERE su.ROLE_ID = sr.ROLE_ID AND sres.ROLE_ID = sr.ROLE_ID AND sres.BRANCH_ID = sb.BRANCH_ID AND sur.USER_ID = su.ID AND sur.RESP_ID = sres.RESPONSIBILITY_ID AND sc.COMPANY_ID = sb.COMPANY_ID AND sur.ACTIVE_FLAG='Y' AND su.USERNAME = '".$username."' AND su.ACTIVE_FLAG = 'Y' AND sres.ACTIVE_FLAG = 'Y'";

        $data=DB::select(DB::raw($query));        
        return $data;

    }
    public function insert_data($user_id,$username,$resp_name,$active_date){
        $cek=SysUserResp::where('USER_ID',User::where('username',$username)->value('ID'))->where('RESP_ID',SysResp::where('RESPONSIBILITY_NAME',$resp_name)->value('RESPONSIBILITY_ID'))->get();
         $user_resp = new SysUserResp;
        if($cek->count()=='0'){

            
             $user_resp->USER_ID = User::where('username',$username)->value('ID');
             $user_resp->RESP_ID=SysResp::where('RESPONSIBILITY_NAME',$resp_name)->value('RESPONSIBILITY_ID');
             $user_resp->ACTIVE_DATE=$active_date;
             $user_resp->ACTIVE_FLAG='Y';
             $user_resp->CREATED_BY=$user_id;
             $user_resp->LAST_UPDATE_BY=$user_id;
             
        }



          $user_resp->save();
	
	}
	
}
