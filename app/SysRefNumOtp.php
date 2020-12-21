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
    	$now=date("Y-m-d");
    	$cek=SysRefNumOtp::where('USER_ID',$user_id)->where('USABLE_FLAG','N')->where('ACTIVE_DATE','=',$now)->count();

       return $cek;
    }

    public function ws_otp_nonactive()
    {
        date_default_timezone_set("Asia/Bangkok");
        $now=date("Y-m-d");
        $data=SysRefNumOtp::where('ACTIVE_DATE','!=',$now)->update(['USABLE_FLAG' =>'Y',
                'UPDATED_AT'=>date('Y-m-d')
                ]);

          return $data;

    }
    public function get_last_otp($user_id)
    {

        date_default_timezone_set("Asia/Bangkok");
        $now=date("Y-m-d");
        $ref_num=SysRefNumOtp::where('USER_ID',$user_id)->where('USABLE_FLAG','N')->where('ACTIVE_DATE','=',$now)->value('REF_NUM');
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

    public function UniqueRandomNumbersWithinRange() {
        $min=1;
        $max=9;
        $quantity=6;
        $numbers = range($min, $max);
        $unique='';
        shuffle($numbers);
        array_slice($numbers, 0, $quantity);
        for($x=0;$x<$quantity;$x++){
            $unique.=''.$numbers[$x];
        }
        return $unique;
    }

    public function submit_otp($user_id,$ref_num,$otp)
    {

        date_default_timezone_set("Asia/Bangkok");
        $data=[];
        $now=date("Y-m-d");
        $source=SysRefNumOtp::where('USER_ID',$user_id)->where('REF_NUM',$ref_num)->where('USABLE_FLAG','N')->where('ACTIVE_DATE','=',$now)->value('otp_num');
        if($source){
            if(Crypt::decryptString($source)==($otp)){
                
                // SysRefNumOtp::where('USER_ID',$user_id)->where('REF_NUM',$ref_num)->where('USABLE_FLAG','N')->where('INACTIVE_DATE','>',$now)->update(['USABLE_FLAG'=>'Y'
                //  ]);
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
    	$now=date("Y-m-d");
		$tomorrow=date("Y-m-d H:i:s", mktime(23,59,59));
        $ref_num= $this->generateRandomString();
        $otp_num=$this->UniqueRandomNumbersWithinRange();

        $now=date("Y-m-d");
        $cek=SysRefNumOtp::where('USER_ID',$user_id)->where('USABLE_FLAG','N')->where('ACTIVE_DATE','=',$now)->count();
        if($cek=='0'){
            $cek_otp=SysRefNumOtp::where('REF_NUM',$ref_num)->where('USER_ID',$user_id)->count();
            if($cek_otp=='0'){

                $new_data= new SysRefNumOtp();
                $new_data->USER_ID=$user_id;
                $new_data->REF_NUM=$ref_num;
                $new_data->OTP_NUM= Crypt::encryptString($otp_num);

                $new_data->OTP= $otp_num;
                $new_data->ACTIVE_DATE=$now;
                $new_data->INACTIVE_DATE=$tomorrow;
                $new_data->USABLE_FLAG='N';
                $new_data->save();
            }else{
                $ref_num= $this->generateRandomString();
                $new_data= new SysRefNumOtp();
                $new_data->USER_ID=$user_id;
                $new_data->REF_NUM=$ref_num;
                $new_data->OTP_NUM=Crypt::encryptString($otp_num);
                $new_data->OTP= $otp_num;
                $new_data->ACTIVE_DATE=$now;
                $new_data->INACTIVE_DATE=$tomorrow;
                $new_data->USABLE_FLAG='N';
                $new_data->save();
            }
        }else{
            $data=SysRefNumOtp::where('USER_ID',$user_id)->where('USABLE_FLAG','N')->where('ACTIVE_DATE','=',$now)->get();
            foreach ($data as $data) {
                $ref_num=$data->REF_NUM;;
                $new_data= new SysRefNumOtp();
                $new_data->USER_ID=$user_id;
                $new_data->REF_NUM=$data->REF_NUM;
                $new_data->OTP= $data->OTP;
                $new_data->OTP_NUM=$data->OTP_NUM;
                $new_data->ACTIVE_DATE=$now;
                $new_data->INACTIVE_DATE=$tomorrow;
                $new_data->USABLE_FLAG='N';
            }
           
            // $new_data->save();

        }  	
    	
    	if(event(new SendOTPEvent($new_data))){
            
            $data['message']=$ref_num; 

        }else{

             $data['message']='gagal';   
        }
        return $data;

    }
}
