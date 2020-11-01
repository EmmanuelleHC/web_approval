<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\SysRefNumOtp;
use App\SysUser;
use App\EmpMaster;
class SendOTPMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $sysrefnumotp;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(SysRefNumOtp $sysrefnumotp)
     {
         $this->sysrefnumotp = $sysrefnumotp;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
      $nama=EmpMaster::where('USER_ID',$this->sysrefnumotp->USER_ID)->value('EMP_NAME');
       return $this->from('emmaiscoming111@gmail')
                   ->view('otp_email_template')
                   ->with([
                         'nama'=>$nama,
                         'reff_num' => $this->sysrefnumotp->REF_NUM,
                         'otp_num' =>$this->sysrefnumotp->OTP_NUM,
                         'expired_date'=>$this->sysrefnumotp->INACTIVE_DATE
                     ]);
     }
}
