<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class User extends Model
{
    protected $table = 'sys_user';
    protected $fillable = ['ROLE_ID', 'ACTIVE_FLAG', 'EMAIL','PASSWORD','TOKEN'];

   



    public function get_data_sess($username,$password){
    	 $query="SELECT su.*, sr.ROLE_ID, sres.RESPONSIBILITY_ID, sb.BRANCH_ID, sb.BRANCH_NAME, sb.SOB_ID, sb.COMPANY_ID, sc.COMPANY_NAME, (FLOOR(10000 + RAND() * 89999)) AS UNIQ_NUMBER 
		FROM sys_user su, sys_role sr, sys_responsibility sres, sys_branch sb, sys_user_resp sur, sys_company sc 
		WHERE su.ROLE_ID = sr.ROLE_ID AND sres.ROLE_ID = sr.ROLE_ID AND sres.BRANCH_ID = sb.BRANCH_ID AND sur.USER_ID = su.ID AND sur.RESP_ID = sres.RESPONSIBILITY_ID AND sc.COMPANY_ID = sb.COMPANY_ID AND sur.ACTIVE_FLAG='Y' AND su.USERNAME = '".$username."' AND su.PASSWORD = '".$password."' AND su.ACTIVE_FLAG = 'Y' AND sres.ACTIVE_FLAG = 'Y' limit 1;";

        $data=DB::select(DB::raw($query));        
        return $data;

    }
    public function get_list_username(){
    	 $query="select sys_user.USERNAME,sys_user.EMAIL,sys_role.ROLE_NAME,sys_role.ROLE_ID,
						sys_user.ACTIVE_DATE,sys_user.ACTIVE_FLAG,sys_user.USER_EXPR,sys_user.USER_EXPR_COUNTER,sys_user.USER_EXPR_NOTE FROM sys_user JOIN sys_role WHERE sys_user.ROLE_ID = sys_role.ROLE_ID";

        $data=DB::select(DB::raw($query));        
        return $data;


       
	}


	public function search_user_specific($username){
    	 $query="select count(*) as cek FROM sys_user JOIN sys_role WHERE sys_user.ROLE_ID = sys_role.ROLE_ID AND
					  TRIM(UPPER(sys_user.USERNAME)) LIKE :username" ;

        $data=DB::select(DB::raw($query),array('username'=>$username));        
        return $data; 	
	}

	public function update_user($username,$role,$active_date,$active_flag,$email,$user_id){
		if($active_flag==0){
			$active_flag='N';
		}else{
			$active_flag='Y';
		}
		$user=User::where('id',$user_id)
          ->update(['ROLE_ID' =>$role,
          			'ACTIVE_FLAG'=>$active_flag,
          			'EMAIL'=>$email,
          			'ACTIVE_DATE'=>$active_date,
          			'CREATED_BY'=>$user_id,
          			'LAST_UPDATE_BY'=>$user_id,
          			'CREATED_DATE'=>date('Y-m-d'),
          			'UPDATED_AT'=>date('Y-m-d')
          		  ]);
		
		
		if($user){
			return 1;
		}else{
			return 0;
		}

	}

	public function insert_user($username,$role,$active_date,$active_flag,$email,$user_id){
		if($active_flag==0){
			$active_flag='Y';
		}else{
			$active_flag='N';
		}
		$user=new User();
		$user->USERNAME=$username;
		$user->ROLE_ID=$role;
		$user->ACTIVE_FLAG=$active_flag;
		$user->EMAIL=$email;
		$user->ACTIVE_DATE=$active_date;
		$user->CREATED_BY=$user_id;
		$user->LAST_UPDATE_BY=$user_id;

		$user->PASSWORD='$2b$10$xWrux0bDk7k9VJWzA7K.cuc4ZePzxkht0JMZ/njVuGNRu8TmTEP1e';
		
		if($user->save()){
			return 1;
		}else{
			return 0;
		}

	}




    
}
