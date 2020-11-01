<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysRole extends Model
{
    protected $table = 'sys_role';
    public function get_list_role(){
    	$statement = 'SELECT ROLE_ID,ROLE_NAME,ROLE_DESC FROM SYS_ROLE';
        $data=DB::select(DB::raw($statement));        
        return $data;

    }
    public function get_data_master_role()
    {
        $statement = 'SELECT ROLE_ID,ROLE_NAME,ROLE_DESC FROM SYS_ROLE ORDER BY ROLE_ID';
        $data=DB::select(DB::raw($statement));        
        return $data;
    }

    public function insert_role($role_name, $role_desc,$user_id)
  {
    $role = new SysRole();
    $role->ROLE_NAME=$role_name;
    $role->ROLE_DESC=$role_desc;
    $role->CREATED_BY=$user_id;
    $role->LAST_UPDATE_BY=$user_id;
    $role->save();
    return 1;
  }

   public function update_role($role_name,$role_desc,$role_id,$user_id)
  {

    $role=SysRole::where('ROLE_ID',$role_id)
          ->update(['ROLE_NAME' =>$role_name,
                'ROLE_DESC'=>$role_desc,
                'LAST_UPDATE_BY'=>$user_id,
                'UPDATED_AT'=>date('Y-m-d')
                ]);

    return 1;
  }
 

  public function compare_data_master_role($role_name,$role_desc,$role_id)
  {
    if($role_id==''){
       $cek=SysRole::where('ROLE_NAME','=',$role_name)->orWhere('ROLE_DESC','=',$role_desc)->get();
    }else{
      $cek=DB::table('sys_role')
            ->where('ROLE_ID', '!=', $role_id)
            ->where(function ($query)  use ($role_name,$role_desc) {
                $query->where('ROLE_NAME','=',$role_name)
                      ->orWhere('ROLE_DESC',$role_desc);
            })
            ->get();
    }
   
    return $cek->count();
  }
}
