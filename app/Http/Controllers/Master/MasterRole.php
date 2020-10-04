<?php
namespace App\Http\Controllers\Master;
use Validator;

use App\SysResp;


use App\SysMenu;
use App\User;
use App\SysUserResp;
use App\SysRole;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class MasterRole extends BaseController 
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

 
    
    public function get_data_master_role(Request $request)
    {
       $role=new SysRole();   
       return response()->json($role->get_data_master_role(), 200);
        
    }


   public function insert_role(Request $request)
   {

      $role_desc=$this->request->input('role_desc');
      $role_name=$this->request->input('role_name');
      $user_id=$this->request->input('user_id');
      $role=new SysRole();   
      return response()->json($role->insert_role($role_name,$role_desc,$user_id), 200);
        
   }


  public function update_role(Request $request)
  {
     $role_desc=$this->request->input('role_desc');
      $role_name=$this->request->input('role_name');
      $user_id=$this->request->input('user_id');
       $role_id=$this->request->input('role_id');
      $role=new SysRole();   
      return response()->json($role->update_role($role_name,$role_desc,$role_id,$user_id), 200); 
  }
   


    public function compare_data_master_role(Request $request)
  {
     $role_id=$this->request->input('role_id');
      $role_name=$this->request->input('role_name');
       $role=new SysRole();   
      return response()->json($role->compare_data_master_role($role_name,$role_id), 200); 
  }
}