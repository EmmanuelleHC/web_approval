<?php
namespace App\Http\Controllers\Master;
use Validator;

use App\SysResp;


use App\SysBranch;
use App\User;
use App\ApprovalMaster;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class MasterApproval extends BaseController 
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

  
  public function get_data_master_approval(Request $request)
  {   
      $approval_master=new ApprovalMaster();
      return response()->json($approval_master->get_data_master_approval(), 200);
  }

  public function get_data_approval_detail(Request $request)
  {
    $id=$this->request->input('ID');
    
    $approval_master=new ApprovalMaster();
    return response()->json($approval_master->get_data_approval_detail($id), 200);
  }


  public function get_data_cbg_by_company(Request $request)
  { $company_id=$this->request->input('company_id');
    $branch=new SysBranch();
    return response()->json($branch->get_data_cbg($company_id), 200);
  }



  public function insert_data_cbg(Request $request)
  { 


    $branch_code=$this->request->input('branch_code');
    $branch_name=$this->request->input('branch_name');
    $alt_name=$this->request->input('alt_name');
    $org_id=$this->request->input('org_id');
    $sob_id=$this->request->input('sob_id');
    $org_type=$this->request->input('org_type');
    $comp_id=$this->request->input('company_id');
    $addr1=$this->request->input('addr1');
    $addr2=$this->request->input('addr2');
    $addr3=$this->request->input('addr3');
    $city=$this->request->input('city');
    $province=$this->request->input('province');
    $vat_num_npwp=$this->request->input('vat_num_npwp');
    $address_pkp=$this->request->input('address_pkp');
    $tgl_npwp=$this->request->input('tgl_npwp');
    $user_id=$this->request->input('user_id');
    $branch=new SysBranch();
    return response()->json($branch->insert_data_cbg($branch_code, $branch_name, $alt_name, $org_id,$sob_id,$org_type,$comp_id,$addr1,$addr2,$addr3,$city,$province,$vat_num_npwp,$tgl_npwp,$address_pkp,$user_id), 200);

   
   
  }

  public function get_data_cbg_by_id(Request $request)
  {
    $branch_id=$this->request->input('branch_id');
    $branch=new SysBranch();
    return response()->json($branch->get_data_cbg_by_id($branch_id), 200);
  }

  public function update_data_cbg(Request $request)
  {
    $branch_id=$this->request->input('branch_id');
    $branch_code=$this->request->input('branch_code');
    $branch_name=$this->request->input('branch_name');
    $alt_name=$this->request->input('alt_name');
    $org_id=$this->request->input('org_id');
    $sob_id=$this->request->input('sob_id');
    $org_type=$this->request->input('org_type');
    $comp_id=$this->request->input('company_id');
    $addr1=$this->request->input('addr1');
    $addr2=$this->request->input('addr2');
    $addr3=$this->request->input('addr3');
    $city=$this->request->input('city');
    $province=$this->request->input('province');
    $vat_num_npwp=$this->request->input('vat_num_npwp');
    $address_pkp=$this->request->input('address_pkp');
    $tgl_npwp=$this->request->input('tgl_npwp');
    $user_id=$this->request->input('user_id');
    $branch=new SysBranch();
     return response()->json($branch->update_data_cbg($branch_id,$branch_code, $branch_name, $alt_name, $org_id,$sob_id,$org_type,$comp_id,$addr1,$addr2,$addr3,$city,$province,$vat_num_npwp,$tgl_npwp,$address_pkp,$user_id), 200);


   
  }



  public function compare_data_branch(Request $request)
  {

    $branch_code=$this->request->input('branch_code');
    $branch_name=$this->request->input('branch_name');
    $alt_name=$this->request->input('alt_name');
    $branch_id=$this->request->input('branch_id');
    $branch=new SysBranch(); 
     return response()->json($branch->compare_data_branch($branch_code,$branch_name,$alt_name,$branch_id), 200);  
 
  }

  

}