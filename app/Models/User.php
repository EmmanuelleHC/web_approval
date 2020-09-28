<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'sys_user';
    public function test(){
    	return "This is a test function";
    }
}
