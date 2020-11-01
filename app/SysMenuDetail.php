<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysMenuDetail extends Model
{
    protected $table = 'sys_menu_detail';
    protected $fillable = ['MENU_ID', 'MENU_DETAIL_NAME', 'MENU_DETAIL_DESC','SUB_MENU_DETAIL','SEQ','URL','ACTIVE_FLAG'];

   	public function insert_data_menu_detail($menu_id, $menu_name, $menu_desc, $submenu_id, $seq,$user_id)
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
        $menu_detail->ACTIVE_FLAG='Y';
        $menu_detail->ACTIVE_DATE=date('Y-m-d');
        // $menu_detail->URL=$url;
        $menu_detail->CREATED_BY=$user_id;
        $menu_detail->LAST_UPDATE_BY=$user_id;

        $menu_detail->save();
    }

    public function update_data_menu_detail($menu_detail_id, $menu_id, $menu_name, $menu_desc, $submenu_id, $seq,$active_flag,$user_id)
    {
        if($submenu_id == '0' || $submenu_id == ''){
            $submenu_id = null;
        }

        if($active_flag == 'Y'){
            $data=SysMenuDetail::where('MENU_DETAIL_ID',$menu_detail_id)->update(['MENU_ID' =>$menu_id,
                'MENU_DETAIL_NAME'=>$menu_name,
                'MENU_DETAIL_DESC'=>$menu_desc,
                'SUB_MENU_DETAIL'=>$submenu_id,
                'SEQ'=>$seq,
                'INACTIVE_DATE'=>null,
                'ACTIVE_FLAG'=>'Y',
                'LAST_UPDATE_BY'=>$user_id,
                'UPDATED_AT'=>date('Y-m-d')
                ]);

            return 1;
        
        } else if($active_flag == 'N' ){
        	$data=SysMenuDetail::where('MENU_DETAIL_ID',$menu_detail_id)->update(['MENU_ID' =>$menu_id,
                'MENU_DETAIL_NAME'=>$menu_name,
                'MENU_DETAIL_DESC'=>$menu_desc,
                'SUB_MENU_DETAIL'=>$submenu_id,
                'SEQ'=>$seq,
                'INACTIVE_DATE'=>date('Y-m-d'),
                'ACTIVE_FLAG'=>'N',
                'LAST_UPDATE_BY'=>$user_id,
                'UPDATED_AT'=>date('Y-m-d')
                ]);

            return 1;
        
        }else{
            return 0;
        }
    }
    public function compare_data_menu_detail($menu_detail_id,$menu_name, $menu_desc)
    {
        if($menu_detail_id=='')
        {
            $cek=SysMenuDetail::where('MENU_DETAIL_NAME',$menu_name)->orWhere('MENU_DETAIL_DESC',$menu_desc)->get();

        }else{
            $cek=DB::table('sys_menu_detail')
            ->where('MENU_DETAIL_ID', '!=', $menu_detail_id)
            ->where(function ($query)  use ($menu_name,$menu_desc) {
                $query->where('MENU_DETAIL_NAME','=',$menu_name)
                      ->orWhere('MENU_DETAIL_DESC',$menu_desc);
            })
            ->get();
        }
    

       return $cek->count();
    }
    public function delete_menu_detail($det_id)
    {

    	return SysMenuDetail::where('MENU_DETAIL_ID',$det_id)->delete();
       
    }

    public function get_data_menu_detail($menu_id)
    {
        $statement = 'SELECT smd.*, sm.MENU_NAME from SYS_MENU_DETAIL smd, SYS_MENU sm where smd.MENU_ID = sm.MENU_ID and sm.MENU_ID = '.$menu_id.' ORDER BY SMD.SEQ';
        $data=DB::select(DB::raw($statement));        
        return $data;
    }
}
