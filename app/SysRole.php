<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysRole extends Model
{
    protected $table = 'sys_role';
    public function get_list_role(){
    	$statement = 'SELECT * FROM SYS_ROLE';
        $data=DB::select(DB::raw($statement));        
        return $data;

    }
    public function get_data_master_role()
    {
        $statement = 'SELECT * FROM SYS_ROLE ORDER BY ROLE_ID';
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
    return $role->save();
  }

   public function update_role($role_name,$role_desc,$role_id,$user_id)
  {
    $role = SysRole::where('ROLE_ID',$role_id);
    $role->ROLE_NAME=$role_name;
    $role->ROLE_DESC=$role_desc;
    $role->CREATED_BY=$user_id;
    $role->LAST_UPDATE_BY=$user_id;
    return $role->save();
  }
 

  public function compare_data_master_role($role_name,$role_id)
  {
    $cek=SysRole::where('TRIM(UPPER(ROLE_NAME))','LIKE ','%'.$role_name.'%')->where('ROLE_ID','NOT LIKE',$role_id)->get();
    return $cek->count();
  }
}
