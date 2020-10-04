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

  public function get_data_cbg()
  {
    $statement = 'SELECT SB.BRANCH_ID,SB.BRANCH_CODE,SB.BRANCH_NAME,SB.ALTERNATE_NAME,SB.ORG_ID, SB.SOB_ID, SB.ORG_TYPE,SB.COMPANY_ID,SB.FTP_PATH,SB.ADDRESS1,SB.ADDRESS2,SB.ADDRESS3
      ,SB.CITY,SB.PROVINCE,SB.VAT_REGISTRATION_NUM,SB.TGL_NPWP,SB.MANAGER,SB.PHONE,SB.FAX,SB.LAST_UPDATE_DATE,
     (SELECT SS.SOB_BRANCH_ID FROM SYS_SOB SS WHERE SS.SOB_ID = SB.SOB_ID) as SOB,
     (SELECT SC.COMPANY_NAME FROM SYS_COMPANY SC WHERE SC.COMPANY_ID = SB.COMPANY_ID) as COMPANY
     FROM SYS_BRANCH SB  ORDER BY SB.BRANCH_CODE ';
    $data=DB::select(DB::raw($statement));        
        return $data;
  }

  public function insert_data_cbg($branch_id,$branch_code, $branch_name, $alt_name, $org_id,$sob_id,$org_type,$ftp_path,$comp_id,$addr1,$addr2,$addr3,$city,$province,$vat_num,$vat_num_tgl,$addrpkp,$phone,$fax,$manager,$user_id)
  {

    $branch=new SysBranch();
    $branch->BRANCH_CODE=$branch_code;
    $branch->BRANCH_NAME=$branch_name;
    $branch->ALTERNATE_NAME=$alt_name;
    $branch->ORG_ID=$org_id;
    $branch->SOB_ID=$sob_id;
    $branch->ORG_TYPE=$org_type;
    $branch->FTP_PATH=$ftp_path;
    $branch->COMPANY_ID=$comp_id;
    $branch->ADDRESS1=$addr1;
    $branch->ADDRESS2=$addr2;
    $branch->ADDRESS3=$addr3;
    $branch->CITY=$city;
    $branch->PROVINCE=$province;
    $branch->VAT_REGISTRATION_NUM=$vat_num;
    $branch->TGL_NPWP=$vat_num_tgl;
    $branch->ADDRESS_PKP=$addrpkp;
    $branch->PHONE=$phone;
    $branch->FAX=$fax;
    $branch->MANAGER=$manager;
    $branch->CREATED_BY=$user_id;
    $branch->UPDATED_BY=$user_id;
    if($branch->save()){
      return 1;
    }else{
      return 0;
    }
    
   
  }

  public function update_data_cbg($branch_id,$branch_code, $branch_name, $alt_name, $org_id,$sob_id,$org_type,$ftp_path,$comp_id,$addr1,$addr2,$addr3,$city,$province,$vat_num,$vat_num_tgl,$addrpkp,$phone,$fax,$manager,$f_comp_id,$user_id)
  {


     $company= SysCompany::where('BRANCH_ID',$branch_id)
          ->update(['BRANCH_CODE' =>$branch_code,
                'BRANCH_NAME'=>$branch_name,
                'ALTERNATE_NAME'=>$alt_name,
                'ORG_ID'=>$org_id,
                'SOB_ID'=>$sob_id,
                'ORG_TYPE'=>$org_type,
                'FTP_PATH'=>$ftp_path,
                'COMPANY_ID'=>$comp_id,
                'ADDRESS1'=>$addr1,
                'ADDRESS2'=>$addr2,
                'ADDRESS3'=>$addr3,
                'CITY'=>$city,
                'PROVINCE'=>$province,
                'VAT_REGISTRATION_NUM'=>$vat_num,
                'TGL_NPWP'=>$vat_num_tgl,
                'ADDRESS_PKP'=>$addrpkp,
                'PHONE'=>$phone,
                'FAX'=>$fax,
                'MANAGER'=>$manager,
                'LAST_UPDATE_BY'=>$user_id,
                'ACTIVE_FLAG'=>'Y',
                'UPDATED_AT'=>date('Y-m-d')
                ]);
    return 1;
      
   
  }

  // public function deactivate_flex_branch($branch_id,$comp_id)
  // {
  //   $statement = 'UPDATE SYS_FLEX SET ACTIVE_FLAG = \'N\' WHERE ATTRIBUTE1 = ? AND ATTRIBUTE2 = ? AND FLEX_TYPE = \'CABANG\'';
  //   $this->db->query($statement, array($branch_id,$comp_id));
  //   $return = $this->db->affected_rows();
  //   return $return;
  // }
  // //END BRANCH


}
