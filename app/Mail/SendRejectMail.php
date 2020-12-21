<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\SysUser;
use App\LogHistory;
use App\EmpMaster;
use App\P3atTrx;
use App\ApprovalMaster;
class SendRejectMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $loghistory;
    protected $employee_id;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($employee_id,LogHistory $loghistory)
     {
         $this->loghistory = $loghistory;
         $this->employee_id = $employee_id;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
       $id=1;
       $p3at_num=P3atTrx::where('ID',$this->loghistory->ID_TRX)->value('P3AT_NUMBER');
       $org_id=P3atTrx::where('ID',$this->loghistory->ID_TRX)->groupBy('P3AT_NUMBER')->groupBy('ORG_ID')->value('ORG_ID');
       
         
    
      $nama=EmpMaster::where('ID',$this->employee_id)->value('EMP_NAME');
      $emp_number=EmpMaster::where('ID',$this->loghistory->EMP_ID)->value('EMP_NUMBER');
      $p3at_detail=P3atTrx::where('P3AT_NUMBER',$p3at_num)->get();
      $link_program='http://sd6webdev.indomaret.lan:8080/approval';

       return $this->from('fad.igr@indomaret.co.id')
                   ->view('reject_email_template')
                   ->with([
                         'p3at_num'=>$p3at_num,
                         'alasan_p3at'=>$this->loghistory->REASON_APPROVAL,
                         'emp_num'=>$emp_number,
                         'detail_p3at'=>$p3at_detail,
                         'link_program'=>$link_program,
                     ]);
     }
}
