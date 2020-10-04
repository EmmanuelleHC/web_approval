<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysCompany extends Model
{
    protected $table = 'sys_company';
   public function get_data_master_company()
    {


        $statement = 'SELECT * FROM SYS_COMPANY ';
        $data=DB::select(DB::raw($statement));        
        return $data;
    }

    

    public function insert_data_company( $company_name, $company_code, $active_flag,$user_id)
    { 
        $company=new SysCompany();
        $company->COMPANY_NAME=$company_name;
        $company->COMPANY_CODE=$company_code;
        $company->ACTIVE_FLAG=$active_flag;
        $company->ACTIVE_DATE=date('Y-m-d');
        $company->CREATED_BY=$user_id;
        $company->LAST_UPDATE_BY=$user_id;
        return $company->save();
       
    }

    public function update_data_company($company_name,$company_code,$active_flag,$company_id,$user_id)
    {
        if($active_flag =='Y'){
           

            $company= SysCompany::where('COMPANY_ID',$company_id)
          ->update(['COMPANY_NAME' =>$company_name,
                'COMPANY_CODE'=>$company_code,
                'LAST_UPDATE_BY'=>$user_id,
                'ACTIVE_FLAG'=>'Y',
                'UPDATED_AT'=>date('Y-m-d')
                ]);
            return 1;

        }
        else if($active_flag =='N'){

             $company= SysCompany::where('COMPANY_ID',$company_id)
          ->update(['COMPANY_NAME' =>$company_name,
                'COMPANY_CODE'=>$company_code,
                'LAST_UPDATE_BY'=>$user_id,
                'ACTIVE_FLAG'=>'N',
                'INACTIVE_DATE'=>date('Y-m-d'),
                'UPDATED_AT'=>date('Y-m-d')
                ]);
            return 1;
           
           
        }

      
    }

    public function compare_data_company($company_name,$company_code,$company_id)
    {
        $cek=SysCompany::where('COMPANY_CODE',$company_code)->orWhere('COMPANY_NAME',$company_name)->where('COMPANY_ID','!=',$company_id)->get();
       return $cek->count();
    }

}
