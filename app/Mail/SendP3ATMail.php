<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

use App\SysRefNumOtp;
use App\SysUser;
use App\LogHistory;
use App\EmpMaster;
use App\P3atTrx;
use App\ApprovalMaster;
class SendP3ATMail extends Mailable
{
    use Queueable, SerializesModels;

 
    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $p3at;
     protected $employee_id;
     public function __construct($p3at,$employee_id)
     {
       
         $this->p3at=$p3at;
         $this->employee_id=$employee_id;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {

      
        
            $nama=EmpMaster::where('ID',$this->employee_id)->value('EMP_NAME');
            $emp_number=EmpMaster::where('ID',$this->employee_id)->value('EMP_NUMBER');
            $link_program='http://sd6webdev.indomaret.lan:8080/approval';
            $otp=new SysRefNumOtp();
            $user_id=EmpMaster::where('ID',$this->employee_id)->value('USER_ID');
            $otp=$otp->generate_otp($user_id);
            date_default_timezone_set("Asia/Bangkok");
            
            $tomorrow=date("Y-m-d H:i:s", mktime(23,59,59));
                 $this->from('fad.igr@indomaret.co.id')
                           ->view('p3at_email_template')
                           ->with([
                                 'p3at_arr'=>$this->p3at,
                                 'emp_name'=>$nama,
                                 'emp_num'=>$emp_number,
                                 'reff_num'=>$otp->REF_NUM,
                                 'otp_num'=>$otp->OTP,
                                 'expired_date'=>$tomorrow,
                                 'link_program'=>$link_program,
                             ]);
             foreach ($this->p3at as $key) {
                P3atTrx::where('P3AT_NUMBER',$key)->update(['SEND_FLAG' =>'Y']);
            }           
      
    
       
    }
}
