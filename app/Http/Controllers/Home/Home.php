<?php
namespace App\Http\Controllers\Home;
use Validator;

use App\SysResp;


use App\SysMenu;
use App\User;

use App\SysRole;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class Home extends BaseController 
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

 
    public function get_menu(Request $request) {
        $resp_id=$this->request->input('resp_id');//buat testing sementara
        $menu=new SysMenu();
        $menu_header = $menu->get_menu($resp_id);
        $navigasi = array();
        if ($menu_header) {
            foreach ($menu_header as $mh) {
                $result = array();
                $result['id'] = $mh->MENU_ID;
                $result['text'] = $mh->MENU_DESC;
                $result['iconCls'] = 'icon-ess-menu';
                if($mh->IS_DETAIL == 'Y'){ //kalau menu detail=Y, tidak punya anak
                    $result['state'] = 'close';             
                     $result['attributes'] = array('url'=>base_url($mh->URL),'width'=>'','height'=>'');
                }else{
                     $result['state'] = 'open';
                     $result['children'] = $this->get_detail_menu($mh->MENU_ID);
                 }
                array_push($navigasi,$result);
            }
        }
         return response()->json($navigasi, 200);

    }
    public function get_detail_menu($menu_id)
    {   $menu=new SysMenu();
        $menu_detail = $menu->get_menu_child($menu_id);
        $navigasi = array();
        if ($menu_detail) {
            foreach ($menu_detail as $md) {
                $result = array();
                $result['id'] = $md->MENU_DETAIL_ID;
                $result['text'] = $md->MENU_DETAIL_DESC;
                if($md->SUB_MENU_DETAIL == null){
                    $result['iconCls'] = 'icon-ess-menu-detail';
                    $result['state'] = 'close';
                    $result['attributes'] = array('url'=>$md->URL,'width'=>'','height'=>'');
                } else{
                    //$result = array();
                    $result['iconCls'] = 'icon-ess-menu';
                    $result['state'] = 'open';
                    $result['children'] = $this->get_detail_menu($md->SUB_MENU_DETAIL);
                }
                array_push($navigasi,$result);


               

            }
        }
        return $navigasi;
    }

    public function get_user_resp(Request $request){ 
       $user_id=$this->request->input('id');
       $resp=new SysResp();   
       return response()->json($resp->get_user_resp($user_id), 200);
               
    }
   

   
}