<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class SysMenu extends Model
{
    protected $table = 'sys_menu';
    protected $fillable = ['MENU_NAME','MENU_DESC','URL','ATTR_ID'];

    public function get_menu($resp_id){
    	$statement = 'SELECT * FROM SYS_MENU WHERE MENU_ID = (SELECT RESP.MENU_ID FROM SYS_RESPONSIBILITY RESP WHERE RESPONSIBILITY_ID = '.$resp_id.') AND ACTIVE_FLAG = \'Y\' ORDER BY MENU_ID ';
        $data=DB::select(DB::raw($statement));        
        return $data;

    }

    public function get_menu_child($menu_id)
	{
		$statement = 'SELECT * FROM sys_menu_detail WHERE MENU_ID = '.$menu_id.' AND ACTIVE_FLAG = \'Y\' ORDER BY SEQ';
		$data=DB::select(DB::raw($statement));        
        return $data;
	}

        public function save_data_master_responsibility($id, $name, $desc, $url, $attr,$user_id)
    {
        if ($id != '') {
            $menu=SysMenu::where('MASTER_MENU_ID',$id);
            $menu->MENU_NAME=$name;
            $menu->MENU_DESC=$desc;
            $menu->URL=$url;
            $menu->ATTR_ID=$attr;
            $menu->LAST_UPDATE_BY=$user_id;
            $menu->save();
        } else {
            $menu=new SysMenu();
            $menu->MENU_NAME=$name;
            $menu->MENU_DESC=$desc;
            $menu->URL=$url;
            $menu->ATTR_ID=$attr;
            $menu->CREATED_BY=$user_id;
            $menu->LAST_UPDATE_BY=$user_id;
            $menu->save();
            
        }
        
    }

    
    public function get_data_menu() //untuk tabel menu header
    {
        $statement = 'SELECT sm.* FROM SYS_MENU sm ';
        $data=DB::select(DB::raw($statement));        
        return $data;
    }

    public function get_data_menu_all() //untuk pilih menu header
    {
        $statement = 'SELECT sm.* FROM SYS_MENU sm ';
        $data=DB::select(DB::raw($statement));        
        return $data;
    }

    public function get_data_submenu($menu_id) //untuk pilih submenu
    {
        $statement = 'SELECT \'\' MENU_ID, \'\' MENU_NAME union all SELECT sm.MENU_ID, sm.MENU_NAME FROM SYS_MENU sm WHERE sm.MENU_ID != \''.$menu_id.'\'';
        $data=DB::select(DB::raw($statement));        
        return $data;
    }

   



    public function get_data_get_data_master_role()
    {
        $statement = 'SELECT * FROM SYS_ROLE ORDER BY ROLE_ID';
        $data=DB::select(DB::raw($statement));        
        return $data;
    }

    public function delete_menu($menu_id)
    {
        return SysMenu::where('MENU_ID',$menu_id)->delete();

     
    }

    public function compare_data_menu($name,$desc,$menu_id)
    {
        if($menu_id=='')
        {
            $cek=SysMenu::where('MENU_NAME',$name)->orWhere('MENU_DESC',$desc)->get();

        }else{
            $cek=DB::table('sys_menu')
            ->where('MENU_ID', '!=', $menu_id)
            ->where(function ($query)  use ($menu_name,$menu_desc) {
                $query->where('MENU_NAME','=',$menu_name)
                      ->orWhere('MENU_DESC',$menu_desc);
            })
            ->get();
        }
    

       return $cek->count();
    }

   

    public function insert_data_menu($name, $desc, $seq, $url, $is_detail,$user_id)
    {
        $menu=new SysMenu();
        $menu->MENU_NAME=$name;
        $menu->MENU_DESC=$desc;
        $menu->SEQ=$seq;
        $menu->URL=$url;
        $menu->ACTIVE_FLAG='Y';
        $menu->ACTIVE_DATE=date('Y-m-d');
        $menu->IS_DETAIL=$is_detail;
        $menu->CREATED_BY=$user_id;
        $menu->LAST_UPDATE_BY=$user_id;
        $menu->save();
    
    }

    public function update_data_menu($menu_id, $name, $desc, $seq, $url, $is_detail, $is_active, $inactive_date,$user_id)
    {
        if($is_active == 'Y'){
        //kalau tidak mengubah active / inactive
            $menu= SysMenu::where('MENU_ID',$menu_id)
                  ->update(['MENU_NAME' =>$name,
                        'MENU_DESC'=>$desc,
                        'SEQ'=>$seq,
                        'URL'=>$url,
                        'INACTIVE_DATE'=>null,
                        'IS_DETAIL'=>$is_detail,
                        'ACTIVE_FLAG'=>$is_active,
                        'LAST_UPDATE_BY'=>$user_id,
                        'ACTIVE_FLAG'=>'Y',
                        'UPDATED_AT'=>date('Y-m-d')
                        ]);
            return 1;
           
        } else if($is_active == 'N'){
            $menu= SysMenu::where('MENU_ID',$menu_id)
                  ->update(['MENU_NAME' =>$name,
                        'MENU_DESC'=>$desc,
                        'SEQ'=>$seq,
                        'URL'=>$url,
                        'INACTIVE_DATE'=>date('Y-m-d'),
                        'IS_DETAIL'=>$is_detail,
                        'ACTIVE_FLAG'=>$is_active,
                        'LAST_UPDATE_BY'=>$user_id,
                        'ACTIVE_FLAG'=>'N',
                        'UPDATED_AT'=>date('Y-m-d')
                        ]);
          
            return 1;
        }else{
            return 0;
        }
        
    }
}
