<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SysAppMaster extends Model
{
    protected $table = 'sys_app_master';
   	public function get_approval_type()
	{
		$data = SysAppMaster::all();
        return $data;
	}
}