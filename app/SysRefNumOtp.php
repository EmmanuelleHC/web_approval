<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Events\SendOTPEvent;
use DateTime;
use Illuminate\Support\Facades\Hash;

class SysRefNumOtp extends Model
{
    protected $table = 'sys_ref_num_otp';
   
    public function cek_otp($user_id)
    {

        date_default_timezone_set("Asia/Bangkok");
    	$now=date("Y-m-d H:i:s");
    	$cek=SysRefNumOtp::where('USER_ID',$user_id)->where('USABLE_FLAG','N')->where('INACTIVE_DATE','>',$now)->count();

       return $cek;
    }


    public function get_last_otp($user_id)
    {

        date_default_timezone_set("Asia/Bangkok");
        $now=date("Y-m-d H:i:s");
        $ref_num=SysRefNumOtp::where('USER_ID',$user_id)->where('USABLE_FLAG','N')->where('INACTIVE_DATE','>',$now)->value('REF_NUM');
       return $ref_num;
    }

    public function generateRandomString($length = 12) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        	return $randomString;
    }
    public function submit_otp($user_id,$ref_num,$otp)
    {

        date_default_timezone_set("Asia/Bangkok");
        $data=[];
        $now=date("Y-m-d H:i:s");
        $source=SysRefNumOtp::where('USER_ID',$user_id)->where('REF_NUM',$ref_num)->where('USABLE_FLAG','N')->where('INACTIVE_DATE','>',$now)->value('otp_num');
        if($source){
            if($source==$otp){
                
                SysRefNumOtp::where('USER_ID',$user_id)->where('REF_NUM',$ref_num)->where('USABLE_FLAG','N')->where('INACTIVE_DATE','>',$now)->update(['USABLE_FLAG'=>'Y'
                 ]);
                $data['message']='berhasil verifikasi';
            }else{
                $data['message']='gagal verifikasi';
            }
        }else{
            $data['message']='reff num expired';
        }
        return $data;
    }
    public function generate_otp($user_id)
    {

        date_default_timezone_set("Asia/Bangkok");
    	$now=date("Y-m-d H:i:s");
		$tomorrow=date('Y-m-d H:i:s', strtotime(' +1 day'));
        $ref_num= $this->generateRandomString();

        $now=date("Y-m-d H:i:s");
        $cek=SysRefNumOtp::where('USER_ID',$user_id)->where('USABLE_FLAG','N')->where('INACTIVE_DATE','>',$now)->count();
        if($cek=='0'){
            $cek_otp=SysRefNumOtp::where('REF_NUM',$ref_num)->where('USER_ID',$user_id)->count();
            if($cek_otp=='0'){
                $new_data= new SysRefNumOtp();
                $new_data->USER_ID=$user_id;
                $new_data->REF_NUM=$ref_num;
                $new_data->OTP_NUM= Hash::make($ref_num);
                $new_data->ACTIVE_DATE=$now;
                $new_data->INACTIVE_DATE=$tomorrow;
                $new_data->USABLE_FLAG='N';
                $new_data->save();
            }else{
                $ref_num= $this->generateRandomString();
                $new_data= new SysRefNumOtp();
                $new_data->USER_ID=$user_id;
                $new_data->REF_NUM=$ref_num;
                $new_data->OTP_NUM= Hash::make($ref_num);
                $new_data->ACTIVE_DATE=$now;
                $new_data->INACTIVE_DATE=$tomorrow;
                $new_data->USABLE_FLAG='N';
                $new_data->save();
            }
        }else{
            SysRefNumOtp::where('USER_ID',$user_id)->where('USABLE_FLAG','N')->where('INACTIVE_DATE','>',$now)->delete();
            $new_data= new SysRefNumOtp();
            $new_data->USER_ID=$user_id;
            $new_data->REF_NUM=$ref_num;
            $new_data->OTP_NUM= Hash::make($ref_num);
            $new_data->ACTIVE_DATE=$now;
            $new_data->INACTIVE_DATE=$tomorrow;
            $new_data->USABLE_FLAG='N';
            $new_data->save();
        }  	
    	
    	if(event(new SendOTPEvent($new_data))){
            
            $data['message']=$ref_num; 
        }else{

             $data['message']='gagal';   
        }
        return $data;

    }
}
