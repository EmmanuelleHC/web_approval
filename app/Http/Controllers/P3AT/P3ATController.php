<?php
namespace App\Http\Controllers\P3AT;
use Validator;

use App\SysResp;

use App\P3atTrx;
use App\SysBranch;
use App\User;
use App\LogHistory;
use App\SysUserResp;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class P3ATController extends BaseController 
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

   


    public function get_inq_p3at(Request $request)
    {    
        $user_id=$this->request->input('user_id');
        $data=new P3atTrx();
        return response()->json($data->get_inq_p3at($user_id), 200);
    }

    public function get_inq_app_p3at(Request $request)
    {    
        $user_id=$this->request->input('user_id');
        $data=new P3atTrx();
        return response()->json($data->get_inq_app_p3at($user_id), 200);
    }
    


     public function get_detail_p3at(Request $request)
    {   
        $p3at_number=$this->request->input('P3AT_NUMBER');
        $data=new P3atTrx();
        return response()->json($data->get_detail_p3at($p3at_number), 200);
    }

    public function get_log_history(Request $request)
    {
        $p3at_number=$this->request->input('P3AT_NUMBER');
        $data=new LogHistory();
        return response()->json($data->get_log_history($p3at_number), 200);
    }

     public function approve_p3at(Request $request)
    {
        $p3at_number=$this->request->input('p3at_number');
        $user_id=$this->request->input('user_id');
        $reason_approval=$this->request->input('alasan');
        $data=new P3atTrx();
        return response()->json($data->approve_p3at($p3at_number,$user_id,$reason_approval), 200);
    }
    public function reject_p3at(Request $request)
    {
        $p3at_number=$this->request->input('p3at_number');
        $user_id=$this->request->input('user_id');
        $reason_approval=$this->request->input('alasan');
        $data=new P3atTrx();
        return response()->json($data->reject_p3at($p3at_number,$user_id,$reason_approval), 200);
    }
}