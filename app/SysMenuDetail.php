<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysMenuDetail extends Model
{
    protected $table = 'sys_menu_detail';
    protected $fillable = ['MENU_ID', 'MENU_DETAIL_NAME', 'MENU_DETAIL_DESC','SUB_MENU_DETAIL','SEQ','URL','ACTIVE_FLAG'];

   	public function insert_data_menu_detail($menu_id, $menu_name, $menu_desc, $submenu_id, $seq, $url, $active_flag,$user_id)
    {
        if($submenu_id == '0' || $submenu_id == ''){
            $submenu_id = null;
        }
        $menu_detail=new SysMenuDetail();
        $menu_detail->MENU_ID=$menu_id;
        $menu_detail->MENU_DETAIL_NAME=$menu_name;
        $menu_detail->MENU_DETAIL_DESC=$menu_desc;
        $menu_detail->SUB_MENU_DETAIL=$submenu_id;
        $menu_detail->SEQ=$seq;
        $menu_detail->URL=$url;
        $menu_detail->ACTIVE_FLAG=$active_flag;
        $menu_detail->CREATED_BY=$user_id;
        $menu_detail->LAST_UPDATE_BY=$user_id;

        $menu_detail->save();
    }

    public function update_data_menu_detail($det_id, $menu_id, $menu_name, $menu_desc, $submenu_id, $seq, $url, $active_flag, $inactive_date,$user_id)
    {
        if($submenu_id == '0' || $submenu_id == ''){
            $submenu_id = null;
        }

        if($active_flag == 'Y' && $inactive_date == '' || $active_flag == 'N' && $inactive_date != ''){
        	$menu_detail=SysMenuDetail::where('MENU_DETAIL_ID',$det_id);
        	$menu_detail->MENU_ID=$menu_id;
        	$menu_detail->MENU_DETAIL_NAME=$menu_name;
	        $menu_detail->MENU_DETAIL_DESC=$menu_desc;
	        $menu_detail->SUB_MENU_DETAIL=$submenu_id;
	        $menu_detail->SEQ=$seq;
	        $menu_detail->URL=$url;
	        $menu_detail->ACTIVE_FLAG=$active_flag;
	        $menu_detail->LAST_UPDATE_BY=$user_id;
	        $menu_detail->save();
        } else if($active_flag == 'Y' && $inactive_date != ''){
        	$menu_detail=SysMenuDetail::where('MENU_DETAIL_ID',$det_id);
        	$menu_detail->MENU_ID=$menu_id;
        	$menu_detail->MENU_DETAIL_NAME=$menu_name;
	        $menu_detail->MENU_DETAIL_DESC=$menu_desc;
	        $menu_detail->SUB_MENU_DETAIL=$submenu_id;
	        $menu_detail->SEQ=$seq;
	        $menu_detail->URL=$url;
	        $menu_detail->ACTIVE_FLAG=$active_flag;
	        $menu_detail->ACTIVE_DATE=date('Y-m-d');
	        $menu_detail->LAST_UPDATE_BY=$user_id;
	        $menu_detail->save();

           
        } else if($active_flag == 'N' && $inactive_date == ''){
        	$menu_detail=SysMenuDetail::where('MENU_DETAIL_ID',$det_id);
        	$menu_detail->MENU_ID=$menu_id;
        	$menu_detail->MENU_DETAIL_NAME=$menu_name;
	        $menu_detail->MENU_DETAIL_DESC=$menu_desc;
	        $menu_detail->SUB_MENU_DETAIL=$submenu_id;
	        $menu_detail->SEQ=$seq;
	        $menu_detail->URL=$url;
	        $menu_detail->ACTIVE_FLAG=$active_flag;
	        $menu_detail->INACTIVE_DATE=date('Y-m-d');
	        $menu_detail->LAST_UPDATE_BY=$user_id;
	        $menu_detail->save();
          
        } else{
            return 0;
        }
    }

    public function delete_menu_detail($det_id)
    {

    	return SysMenuDetail::where('MENU_DETAIL_ID',$det_id)->delete();
       
    }

}
