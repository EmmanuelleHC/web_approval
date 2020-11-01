<?php
namespace App\Http\Controllers\Master;
use Validator;

use App\SysResp;


use App\EmpMaster;
use App\User;
use App\SysUserResp;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class MasterEmployee extends BaseController 
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

   

 public function get_data_master_employee(Request $request)
  {
     $employee=new EmpMaster();   
     return response()->json($employee->get_data_master_employee(), 200);
       
  
  }

   public function get_username_existing(Request $request)
  {
     $employee=new EmpMaster();   
     return response()->json($employee->get_username_existing(), 200);
       
  
  }

  public function get_username_existing2(Request $request)
  {
    $user_id = $this
            ->request
            ->input('user_id');
     $employee=new EmpMaster();   
     return response()->json($employee->get_username_existing2($user_id), 200);
       
  
  }


    public function insert_data_emp(Request $request)
    {
        $emp_name = $this
            ->request
            ->input('emp_name');
        $emp_num = $this
            ->request
            ->input('emp_num');
        $emp_desc = $this
            ->request
            ->input('emp_desc');

        $email_user = $this
            ->request
            ->input('email_user');

        $email_otp = $this
            ->request
            ->input('email_otp');

        $user_id = $this
            ->request
            ->input('user_id');

        $company = $this
            ->request
            ->input('company');
        $org_id = $this
            ->request
            ->input('branch');

        $active_flag = $this
            ->request
            ->input('active_flag');
        $session = $this
            ->request
            ->input('session');
        $emp = new EmpMaster();
        return response()->json($emp->insert_data_emp($emp_num,$emp_name,$emp_desc,$email_user,$email_otp,$company,$org_id,$active_flag,$user_id,$session) , 200);

    }
     public function compare_data_emp(Request $request)
  {

    $emp_num=$this->request->input('emp_num');
    $emp_name=$this->request->input('emp_name');
    $emp_desc=$this->request->input('emp_desc');

    $emp_id=$this->request->input('emp_id');
    $emp=new EmpMaster(); 
     return response()->json($emp->compare_data_emp($emp_num,$emp_name,$emp_desc,$emp_id), 200);  
 
  }
    public function update_data_emp(Request $request)
    {
       $emp_id=$this
            ->request
            ->input('emp_id');
       $emp_name = $this
            ->request
            ->input('emp_name');
        $emp_num = $this
            ->request
            ->input('emp_num');
        $emp_desc = $this
            ->request
            ->input('emp_desc');

        $email_user = $this
            ->request
            ->input('email_user');

        $email_otp = $this
            ->request
            ->input('email_otp');

        $user_id = $this
            ->request
            ->input('user_id');

        $company = $this
            ->request
            ->input('company');
        $org_id = $this
            ->request
            ->input('branch');

        $active_flag = $this
            ->request
            ->input('active_flag');
        $session = $this
            ->request
            ->input('session');
        $emp = new EmpMaster();
        return response()->json($emp->update_data_emp($emp_id,$emp_num,$emp_name,$emp_desc,$email_user,$email_otp,$company,$org_id,$active_flag,$user_id,$session) , 200);
    }

  


}