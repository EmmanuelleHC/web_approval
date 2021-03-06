<?php
namespace App\Http\Controllers\Master;
use Validator;

use App\SysResp;

use App\SysMenuDetail;
use App\SysMenu;
use App\User;
use App\SysUserResp;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class MasterMenu extends BaseController
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

    public function save_data_master_responsibility(Request $request)
    {
        $id = $this
            ->request
            ->input('id');
        $name = $this
            ->request
            ->input('name');
        $desc = $this
            ->request
            ->input('desc');

        $url = $this
            ->request
            ->input('url');

        $user_id = $this
            ->request
            ->input('user_id');
        $attr = $this
            ->request
            ->input('attr');
        $menu = new SysMenu();
        if ($id != '')
        {
            return response()->json($menu->update_sys_menu($name, $desc, $url, $attr, $id, $user_id) , 200);

        }
        else
        {
            return response()->json($menu->insert_sys_menu($name, $desc, $url, $attr, $user_id) , 200);
        }
    }

    public function get_data_menu(Request $request) //untuk tabel menu header
    
    {
        $menu = new SysMenu();
        return response()->json($menu->get_data_menu() , 200);
    }

    public function get_data_menu_all() //untuk pilih menu header
    
    {

        $menu = new SysMenu();
        return response()->json($menu->get_data_menu() , 200);

    }

    public function get_data_submenu(Request $request) //untuk pilih submenu
    
    {

        $menu_id = $this
            ->request
            ->input('menu_id');
        $menu = new SysMenu();
        return response()->json($menu->get_data_submenu($menu_id) , 200);

    }

    public function get_data_menu_detail(Request $request)
    {

        $menu_id = $this
            ->request
            ->input('menu_id');
        $menu_detail = new SysMenuDetail();
        return response()->json($menu_detail->get_data_menu_detail($menu_id) , 200);

    }

    public function insert_data_menu_detail(Request $request)
    {

        $menu_id = $this
            ->request
            ->input('menu_id');

        $menu_name = $this
            ->request
            ->input('menu_name');

        $menu_desc = $this
            ->request
            ->input('menu_desc');

        $submenu_id = $this
            ->request
            ->input('submenu_id');

        $seq = $this
            ->request
            ->input('seq');


        $user_id = $this
            ->request
            ->input('user_id');
        if ($submenu_id == '0' || $submenu_id == '')
        {
            $submenu_id = null;
        }

        $menu_detail = new SysMenuDetail();

        return response()->json($menu_detail->insert_data_menu_detail($menu_id, $menu_name, $menu_desc, $submenu_id, $seq, $user_id) , 200);

    }


    public function compare_data_menu(Request $request)
    {
        $menu_id='';
        $menu_id=$this
            ->request
            ->input('menu_id');
        $name = $this
            ->request
            ->input('menu_name');
        $desc = $this
            ->request
            ->input('menu_desc');
        
         $menu = new SysMenu();
          
        return response()->json($menu->compare_data_menu($name,$desc,$menu_id), 200); 
    }


    public function compare_data_menu_detail(Request $request)
    {
        $menu_detail_id='';
        $menu_detail_id=$this
            ->request
            ->input('menu_detail_id');
        $menu_name = $this
            ->request
            ->input('menu_name');
        $menu_desc = $this
            ->request
            ->input('menu_desc');
        
         $menu = new SysMenuDetail();
          
        return response()->json($menu->compare_data_menu_detail($menu_detail_id,$menu_name, $menu_desc), 200); 
    }
    public function update_data_menu_detail(Request $request)
    {
        $menu_detail_id = $this
            ->request
            ->input('menu_detail_id');

        $menu_id = $this
            ->request
            ->input('menu_id');

        $menu_name = $this
            ->request
            ->input('menu_name');

        $menu_desc = $this
            ->request
            ->input('menu_desc');
        $submenu_id = $this
            ->request
            ->input('submenu_id');
        $active_flag = $this
            ->request
            ->input('active_flag');
        $seq = $this
            ->request
            ->input('seq');

        $user_id = $this
            ->request
            ->input('user_id');
           
        $menu_detail = new SysMenuDetail();
        return response()->json($menu_detail->update_data_menu_detail($menu_detail_id, $menu_id, $menu_name, $menu_desc, $submenu_id, $seq,$active_flag,$user_id) , 200);
    }

    public function delete_menu_detail(Request $request)
    {
        $det_id = $this
            ->request
            ->input('det_id');
        $menu_detail = new SysMenuDetail();
        return response()->json($menu_detail->delete_menu_detail($det_id), 200);

    }

    public function delete_menu(Request $request)
    {
        $menu_id=$this->request->input('menu_id');
        $menu=new SysMenu();
        return response()->json($menu->delete_menu($menu_id), 200);

    }


    public function insert_data_menu(Request $request)
    {   $name=$this->request->input('menu_name');
        $desc=$this->request->input('menu_desc');
        $seq=$this->request->input('seq');
        $url=$this->request->input('url');
        $is_detail=$this->request->input('detail');
        $user_id=$this->request->input('user_id');
        $menu=new SysMenu();
        return response()->json($menu->insert_data_menu($name, $desc, $seq, $url, $is_detail,$user_id), 200);
      
      
    }

    public function update_data_menu(Request $request)
  {
    $menu_id=$this->request->input('menu_id');
    $name=$this->request->input('menu_name');
    $desc=$this->request->input('menu_desc');
    $seq=$this->request->input('seq');
    $url=$this->request->input('url');
    $is_detail=$this->request->input('is_detail');
    $is_active=$this->request->input('active_flag');
    $inactive_date=$this->request->input('inactive_date');
    $user_id=$this->request->input('user_id');

    $menu=new SysMenu();
    return response()->json($menu->update_data_menu($menu_id, $name, $desc, $seq, $url, $is_detail, $is_active, $inactive_date,$user_id), 200);

  } 

}

