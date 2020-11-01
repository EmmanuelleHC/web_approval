<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysBranch extends Model
{
    protected $table = 'sys_branch';
    

  public function get_data_sob_cbg($branch_id)
  {
    $statement = 'SELECT SOB_ID, concat(SOB_BRANCH_ID,\' - \', SOB_NAME) SOB_NAME FROM SYS_SOB where SOB_ID not in (SELECT SOB_ID from SYS_BRANCH WHERE SOB_ID is not null AND SOB_ID != 0 AND BRANCH_ID != \''.$branch_id.'\')';
      $data=DB::select(DB::raw($statement));        
        return $data;
  }

 

  public function check_branch_org_id( $id,$num)
  {
    $statement=SysBranch::where('BRANCH_ID','!=',$id)->where('ORG_ID',$num)->get();
    return $statement->count();
  }

  public function get_data_cbg_by_company($company_id)
  {
     $statement=SysBranch::where('COMPANY_ID','=',$company_id)->get();
    return $statement;
  }
  public function get_data_cbg()
  {
    $statement = 'SELECT SB.BRANCH_ID,SB.BRANCH_CODE,SB.BRANCH_NAME,SB.ALTERNATE_NAME,SB.ORG_ID, SB.SOB_ID, SB.ORG_TYPE,SB.COMPANY_ID,SB.FTP_PATH,SB.ADDRESS1,SB.ADDRESS2,SB.ADDRESS3
      ,SB.CITY,SB.PROVINCE,SB.VAT_REGISTRATION_NUM,SB.TGL_NPWP,SB.MANAGER,SB.PHONE,SB.FAX,SB.UPDATED_AT,
     (SELECT SC.COMPANY_NAME FROM SYS_COMPANY SC WHERE SC.COMPANY_ID = SB.COMPANY_ID) as COMPANY
     FROM SYS_BRANCH SB  ORDER BY SB.BRANCH_CODE ';
    $data=DB::select(DB::raw($statement));        
        return $data;
  }

  public function get_data_cbg_by_id($branch_id)
  {
    $data = SysBranch::select('BRANCH_ID','BRANCH_CODE','BRANCH_NAME','ALTERNATE_NAME','ORG_ID','SOB_ID','ORG_TYPE','COMPANY_ID','FTP_PATH','ADDRESS1','ADDRESS2','ADDRESS3','CITY','PROVINCE','VAT_REGISTRATION_NUM','TGL_NPWP','MANAGER','PHONE','FAX','UPDATED_AT',
        DB::raw("(SELECT SC.COMPANY_NAME FROM SYS_COMPANY SC WHERE SC.COMPANY_ID = (SELECT COMPANY_ID FROM sys_branch where BRANCH_ID=$branch_id)) as COMPANY")
    )
    ->where('BRANCH_ID','=','$branch_id')
    ->orderBy("BRANCH_CODE")
    ->setBindings([$branch_id,$branch_id])
    ->get();
    return $data;
  }

  public function insert_data_cbg($branch_code, $branch_name, $alt_name, $org_id,$sob_id,$org_type,$comp_id,$addr1,$addr2,$addr3,$city,$province,$vat_num_npwp,$tgl_npwp,$addrpkp,$user_id)
  {

    $branch=new SysBranch();
    $branch->BRANCH_CODE=$branch_code;
    $branch->BRANCH_NAME=$branch_name;
    $branch->ALTERNATE_NAME=$alt_name;
    $branch->ORG_ID=$org_id;
    $branch->SOB_ID=$sob_id;
    $branch->ORG_TYPE=$org_type;
    $branch->COMPANY_ID=$comp_id;
    $branch->ADDRESS1=$addr1;
    $branch->ADDRESS2=$addr2;
    $branch->ADDRESS3=$addr3;
    $branch->CITY=$city;
    $branch->PROVINCE=$province;
    $branch->VAT_REGISTRATION_NUM=$vat_num_npwp;
    $branch->TGL_NPWP=($tgl_npwp ? $tgl_npwp : null);
    $branch->ADDRESS_PKP=$addrpkp;
    $branch->CREATED_BY=$user_id;
    $branch->LAST_UPDATE_BY=$user_id;
    if($branch->save()){
      return 1;
    }else{
      return 0;
    }
    
   
  }

  public function update_data_cbg($branch_id,$branch_code, $branch_name, $alt_name, $org_id,$sob_id,$org_type,$comp_id,$addr1,$addr2,$addr3,$city,$province,$vat_num_npwp,$tgl_npwp,$address_pkp,$user_id)
  {


     $company= SysBranch::where('BRANCH_ID',$branch_id)
          ->update(['BRANCH_CODE' =>$branch_code,
                'BRANCH_NAME'=>$branch_name,
                'ALTERNATE_NAME'=>$alt_name,
                'ORG_ID'=>$org_id,
                'SOB_ID'=>$sob_id,
                'ORG_TYPE'=>$org_type,
                'COMPANY_ID'=>$comp_id,
                'ADDRESS1'=>$addr1,
                'ADDRESS2'=>$addr2,
                'ADDRESS3'=>$addr3,
                'CITY'=>$city,
                'PROVINCE'=>$province,
                'VAT_REGISTRATION_NUM'=>$vat_num_npwp,
                'TGL_NPWP'=>$tgl_npwp,
                'ADDRESS_PKP'=>$address_pkp,
                'LAST_UPDATE_BY'=>$user_id,
                'UPDATED_AT'=>date('Y-m-d')
                ]);
    return 1;
      
   
  }

  public function compare_data_branch($branch_code,$branch_name,$alt_name,$branch_id)
    {

      $cek=DB::table('sys_branch')
            ->where('BRANCH_ID', '!=', $branch_id)
            ->where(function ($query)  use ($branch_name,$branch_code,$alt_name) {
                $query->where('BRANCH_NAME','=',$branch_name)
                      ->orWhere('BRANCH_CODE',$branch_code)->orWhere('ALTERNATE_NAME',$alt_name);
            })
            ->get();

       return $cek->count();
    }
}
