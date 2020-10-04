<?php
namespace App\Http\Controllers\Master;
use Validator;

use App\SysResp;


use App\SysCompany;
use App\User;
use App\SysUserResp;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class MasterCompany extends BaseController 
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

   

 public function get_data_master_company(Request $request)
  {
     $company=new SysCompany();   
     return response()->json($company->get_data_master_company(), 200);
       
  
  }

  

  public function insert_data_company(Request $request)
  {   $company_name=$this->request->input('company_name');
      $company_code=$this->request->input('company_code');
      $active_flag=$this->request->input('active_flag');
      $user_id=$this->request->input('user_id');
      $company=new SysCompany();   
      return response()->json($company->insert_data_company($company_name,$company_code,$active_flag,$user_id), 200);
      
  }

  public function update_data_company(Request $request)
  {
     $company_name=$this->request->input('company_name');
      $company_code=$this->request->input('company_code');
      $active_flag=$this->request->input('active_flag');
       $company_id=$this->request->input('company_id');
      $user_id=$this->request->input('user_id');
      $company=new SysCompany();   
      return response()->json($company->update_data_company($company_name,$company_code,$active_flag,$company_id,$user_id), 200);

   
  }

  public function compare_data_company(Request $request)
  {

    $company_name=$this->request->input('company_name');
      $company_code=$this->request->input('company_code');
       $company_id=$this->request->input('company_id');
      $company=new SysCompany();   
      return response()->json($company->compare_data_company($company_name,$company_code,$company_id), 200);
 
  }

}