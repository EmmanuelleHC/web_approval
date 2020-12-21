<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

use App\SysRefNumOtp;
use App\SysUser;
use Illuminate\Support\Facades\Crypt;
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
      $link_program='http://sd6webdev.indomaret.lan:8080/approval';
      $nama=EmpMaster::where('USER_ID',$this->sysrefnumotp->USER_ID)->value('EMP_NAME');
       return $this->from('fad.igr@indomaret.co.id')
                   ->view('otp_email_template')
                   ->with([
                         'nama'=>$nama,
                         'reff_num' => $this->sysrefnumotp->REF_NUM,
                         'otp_num' =>($this->sysrefnumotp->OTP),
                         'expired_date'=>$this->sysrefnumotp->INACTIVE_DATE,
                         'link_program'=>$link_program,
                     ]);
     }
}
