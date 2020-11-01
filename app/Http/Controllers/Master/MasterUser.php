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
class MasterUser extends BaseController 
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

 
    
    public function get_list_user_resp(Request $request){ 
       $role_id=$this->request->input('role_id');
       $resp=new SysResp();   
       return response()->json($resp->get_list_user_resp($role_id), 200);
               
    }
     public function get_list_user(){ 
       
       $user=new SysUser();   
       return response()->json($user->get_list_user(), 200);
               
    }
      public function compare_data_user(Request $request)
  {
     $username=$this->request->input('username');
      $user_id=$this->request->input('user_id');
     
       $user=new SysUser();   
      return response()->json($user->compare_data_user($username,$user_id), 200); 
  }
    public function get_list_role(Request $request){ 
       
       $role=new SysRole();   
       return response()->json($role->get_list_role(), 200);
               
    }
    public function get_list_username(Request $request){ 
       
       $user=new User();   
       return response()->json($user->get_list_username(), 200);
               
    }

   


    public function search_user_specific(Request $request){ 
       $username=$this->request->input('username');
       $user=new User();   
       return response()->json($user->search_user_specific($username), 200);
               
    }

    public function get_resp_user(Request $request){
        $username=$this->request->input('username');
        $user_resp=new SysUserResp();
      
        return response()->json($user_resp->get_resp_user($username), 200);
     


    }

    public function update_user(Request $request){ 
       $username=$this->request->input('username');
       $role=$this->request->input('role');
       $active_flag=$this->request->input('active_flag');
       $active_date=$this->request->input('active_date');
       $email=$this->request->input('email');

       $resp=$this->request->input('resp');
       $user_id=$this->request->input('user_id');

        
       $user=new User();
       if($user->update_user($username,$role,$active_date,$active_flag,$email,$user_id)==1){
           $user_resp=new SysUserResp();
           $user_resp->deleteResp($username);
            foreach ($resp as $key) {
                  $user_resp->insert_data($user_id,$username,$key['RESPONSIBILITY_NAME'],$key['ACTIVE_DATE']);

            }
             return response()->json(1, 200);
       }else{
            return response()->json(0, 200);

       }

       // return response()->json($user->update_user($username,$role,$active_date,$active_flag,$email,$user_id), 200);
               
    }


    public function insert_user(Request $request){ 
       $username=$this->request->input('username');
       $role=$this->request->input('role');
       $active_flag=$this->request->input('active_flag');
       $active_date=$this->request->input('active_date');
       $email=$this->request->input('email');

       $resp=$this->request->input('resp');
       $user_id=$this->request->input('user_id');

        
       $user=new User();

       if($user->insert_user($username,$role,$active_date,$active_flag,$email,$user_id)==1){
         $user_resp=new SysUserResp();
            foreach ($resp as $key) {
                
                 $user_resp->insert_data($user_id,$username,$key['RESPONSIBILITY_NAME'],$key['ACTIVE_DATE']);

            }
             return response()->json(1, 200);
       }else{
            return response()->json(0, 200);

       }

       // return response()->json($user->update_user($username,$role,$active_date,$active_flag,$email,$user_id), 200);
               
    }

   
}