<?php
namespace App\Http\Controllers\Master;
use Validator;

use App\SysResp;

use App\SysMenu;
use App\User;
use App\SysUserResp;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class MasterResp extends BaseController
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
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function get_data_master_resp(Request $request)
    {
        $resp = new SysResp();
        return response()->json($resp->get_data_master_resp() , 200);

    }



    public function get_resp_active_flag(Request $request)
    {

        $resp_id = $this
            ->request
            ->input('resp_id');
        $resp = new SysResp();
        return response()->json($resp->get_resp_active_flag($resp_id) , 200);

    }

    public function insert_data_resp(Request $request)
    {
        $role_id = $this
            ->request
            ->input('role');

        $branch_id = $this
            ->request
            ->input('branch');

        $menu_id = $this
            ->request
            ->input('menu');

        $resp_name = $this
            ->request
            ->input('resp_name');

        $resp_desc = $this
            ->request
            ->input('resp_desc');

        $act_flag = $this
            ->request
            ->input('act_flag');

        $user_id = $this
            ->request
            ->input('user_id');
        $resp = new SysResp();
        return response()->json($resp->insert_data_resp($role_id, $branch_id, $menu_id, $resp_name, $resp_desc, $act_flag, $user_id) , 200);

    }

    public function update_data_resp(Request $request)
    {

        $resp_id = $this
            ->request
            ->input('resp_id');
     

        $resp_name = $this
            ->request
            ->input('resp_name');

        $resp_desc = $this
            ->request
            ->input('resp_desc');

        $act_flag = $this
            ->request
            ->input('active_flag');

        $user_id = $this
            ->request
            ->input('user_id');
       
        $resp = new SysResp();
        return response()->json($resp->update_data_resp($resp_id, $resp_name, $resp_desc, $act_flag, $user_id) , 200);

    }

}

