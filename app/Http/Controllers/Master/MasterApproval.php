<?php
namespace App\Http\Controllers\Master;
use Validator;

use App\SysResp;

use App\SysAppMaster;
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

  public function validate_approval(Request $request)
  {   
    $appr1=$this->request->input('appr1');
    $appr2=$this->request->input('appr2');
    $appr3=$this->request->input('appr3');
    $appr4=$this->request->input('appr4');
    $appr5=$this->request->input('appr5');
    $appr6=$this->request->input('appr6');
    $appr7=$this->request->input('appr7');
    $appr8=$this->request->input('appr8');
    $appr9=$this->request->input('appr9');
    $appr10=$this->request->input('appr10');
    if($appr1==''){
      $appr1=null;
    }
    if($appr2==''){
      $appr2=null;
    }
    if($appr3==''){
      $appr3=null;
    }
    if($appr4==''){
      $appr4=null;
    }
    if($appr5==''){
      $appr5=null;
    }
    if($appr6==''){
      $appr6=null;
    }
    if($appr7==''){
      $appr7=null;
    }
    if($appr8==''){
      $appr8=null;
    }
    if($appr9==''){
      $appr9=null;
    }
    if($appr10==''){
      $appr10=null;
    }
    $approval=new ApprovalMaster();
    return response()->json($approval->validate_approval($appr1,$appr2,$appr3,$appr4,$appr5,$appr6,$appr7,$appr8,$appr9,$appr10), 200);

   
  }

  public function get_approval_type(Request $request)
  {   
      $app=new SysAppMaster();
      return response()->json($app->get_approval_type(), 200);
  }

   public function get_approval_branch(Request $request)
  {   
      $branch=new SysBranch();
      return response()->json($branch->get_approval_branch(), 200);
  }

  public function get_approval_avail(Request $request)
  {   $branch_org=$this->request->input('branch_org');
      $approval_master=new ApprovalMaster();
      return response()->json($approval_master->get_approval_avail($branch_org), 200);
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

  public function compare_data_approval(Request $request)
  {
    $id=$this->request->input('id');
    $app=$this->request->input('app');
    $branch=$this->request->input('branch');
    $amount_from=$this->request->input('amount_from');
    $amount_to=$this->request->input('amount_to');
    
    $approval=new ApprovalMaster();
    return response()->json($approval->compare_data_approval($id,$app,$branch,$amount_from,$amount_to), 200);

  }

  public function insert_data_approval(Request $request)
  { 
    $app=$this->request->input('app');
    $branch=$this->request->input('branch');
    $active_flag=$this->request->input('active_flag');
    $amount_from=$this->request->input('amount_from');
    $amount_to=$this->request->input('amount_to');
    $appr1=$this->request->input('appr1');
    $appr2=$this->request->input('appr2');
    $appr3=$this->request->input('appr3');
    $appr4=$this->request->input('appr4');
    $appr5=$this->request->input('appr5');
    $appr6=$this->request->input('appr6');
    $appr7=$this->request->input('appr7');
    $appr8=$this->request->input('appr8');
    $appr9=$this->request->input('appr9');
    $appr10=$this->request->input('appr10');
    if($appr1==''){
      $appr1=null;
    }
    if($appr2==''){
      $appr2=null;
    }
    if($appr3==''){
      $appr3=null;
    }
    if($appr4==''){
      $appr4=null;
    }
    if($appr5==''){
      $appr5=null;
    }
    if($appr6==''){
      $appr6=null;
    }
    if($appr7==''){
      $appr7=null;
    }
    if($appr8==''){
      $appr8=null;
    }
    if($appr9==''){
      $appr9=null;
    }
    if($appr10==''){
      $appr10=null;
    }
    $user_id=$this->request->input('user_id');
    $approval=new ApprovalMaster();
    return response()->json($approval->insert_data_approval($app,$branch,$active_flag,$amount_from,$amount_to,$appr1,$appr2,$appr3,$appr4,$appr5,$appr6,$appr7,$appr8,$appr9,$appr10,$user_id), 200);

   
   
  }

  public function get_data_cbg_by_id(Request $request)
  {
    $branch_id=$this->request->input('branch_id');
    $branch=new SysBranch();
    return response()->json($branch->get_data_cbg_by_id($branch_id), 200);
  }

  public function update_data_approval(Request $request)
  {
    $id=$this->request->input('id');
    $app=$this->request->input('app');
    $branch=$this->request->input('branch');
    $active_flag=$this->request->input('active_flag');
    $amount_from=$this->request->input('amount_from');
    $amount_to=$this->request->input('amount_to');
    $appr1=$this->request->input('appr1');
    $appr2=$this->request->input('appr2');
    $appr3=$this->request->input('appr3');
    $appr4=$this->request->input('appr4');
    $appr5=$this->request->input('appr5');
    $appr6=$this->request->input('appr6');
    $appr7=$this->request->input('appr7');
    $appr8=$this->request->input('appr8');
    $appr9=$this->request->input('appr9');
    $appr10=$this->request->input('appr10');
    if($appr1==''){
      $appr1=null;
    }
    if($appr2==''){
      $appr2=null;
    }
    if($appr3==''){
      $appr3=null;
    }
    if($appr4==''){
      $appr4=null;
    }
    if($appr5==''){
      $appr5=null;
    }
    if($appr6==''){
      $appr6=null;
    }
    if($appr7==''){
      $appr7=null;
    }
    if($appr8==''){
      $appr8=null;
    }
    if($appr9==''){
      $appr9=null;
    }
    if($appr10==''){
      $appr10=null;
    }
    $user_id=$this->request->input('user_id');
    $approval=new ApprovalMaster();
    return response()->json($approval->update_data_approval($id,$app,$branch,$active_flag,$amount_from,$amount_to,$appr1,$appr2,$appr3,$appr4,$appr5,$appr6,$appr7,$appr8,$appr9,$appr10,$user_id), 200);



   
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