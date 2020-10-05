<?php
namespace App\Http\Controllers\Master;
use Validator;

use App\SysResp;


use App\SysBranch;
use App\User;
use App\SysUserResp;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class MasterBranch extends BaseController 
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
    }

   

  // public function get_data_sob_cbg(Request $request)
  // {
  //   $branch_id=$this->request->input('branch_id');
  //   $branch=new SysBranch();   
  //   return response()->json($branch->get_data_sob_cab($company_name,$company_code,$active_flag,$user_id), 200);
  //   $statement = 'SELECT SOB_ID, concat(SOB_BRANCH_ID,\' - \', SOB_NAME) SOB_NAME FROM SYS_SOB where SOB_ID not in (SELECT SOB_ID from SYS_BRANCH WHERE SOB_ID is not null AND SOB_ID != 0 AND BRANCH_ID != \''.$branch_id.'\')';
  //   return $this->db->query($statement)->result();
  // }

  // public function select_cbg_company_sob()
  // {
  //   $statement = 'SELECT b.*, c.COMPANY_CODE, c.COMPANY_NAME, s.SOB_ID, s.SOB_NAME from sys_branch b, sys_company c, sys_sob s WHERE b.SOB_ID = \''.$this->session->userdata('sob_id').'\' AND b.COMPANY_ID = c.COMPANY_ID AND b.SOB_ID = s.SOB_ID';
  //   return $this->db->query($statement)->row();
  // }

  public function check_branch_org_id(Request $request)
  {   $num=$this->request->input('num');
      $id=$this->request->input('id');
      $branch=new SysBranch();
      return response()->json($branch->check_branch_org_id($id,$num), 200);
  }

  public function get_data_cbg(Request $request)
  {
    $branch=new SysBranch();
    return response()->json($branch->get_data_cbg(), 200);
  }


  public function get_data_cbg_by_company(Request $request)
  { $company_id=$this->request->input('company_id');
    $branch=new SysBranch();
    return response()->json($branch->get_data_cbg($company_id), 200);
  }



  public function insert_data_cbg(Request $request)
  {$num=$this->request->input('num');
      $id=$this->request->input('id');
    $branch=new SysBranch();
    return response()->json($branch->insert_data_cbg($branch_code, $branch_name, $alt_name, $org_id,$sob_id,$org_type,$ftp_path,$comp_id,$addr1,$addr2,$addr3,$city,$province,$vat_num,$vat_num_tgl,$addrpkp,$phone,$fax,$manager,$user_id), 200);

   
   
  }



  public function update_data_cbg(Request $request)
  {$branch_id=$this->request->input('branch_id');
   $branch_code=$this->request->input('branch_code');
   $branch_name=$this->request->input('branch_name');
   $alt_name=$this->request->input('alt_name');
   $org_id=$this->request->input('org_id');
   $sob_id=$this->request->input('sob_id');
   $org_type=$this->request->input('org_type');
   $ftp_path=$this->request->input('ftp_path');
   $comp_id=$this->request->input('comp_id');
   $addr1=$this->request->input('addr1');
   $addr2=$this->request->input('addr2');
   $addr3=$this->request->input('addr3');
   $city=$this->request->input('city');
   $province=$this->request->input('province');
   $vat_num=$this->request->input('vat_num');
   $vat_num_tgl=$this->request->input('vat_num_tgl');
   $addrpkp=$this->request->input('addrpkp');
   $phone=$this->request->input('phone');
   $fax=$this->request->input('fax');
   $manager=$this->request->input('manager');
   $f_comp_id=$this->request->input('f_comp_id');
   $user_id=$this->request->input('user_id');
 $branch=new SysBranch();
    return response()->json($branch->update_data_cbg($branch_id,$branch_code, $branch_name, $alt_name, $org_id,$sob_id,$org_type,$ftp_path,$comp_id,$addr1,$addr2,$addr3,$city,$province,$vat_num,$vat_num_tgl,$addrpkp,$phone,$fax,$manager,$f_comp_id,$user_id), 200);


   
  }

  

}