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
class SendApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $loghistory;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct(LogHistory $loghistory)
     {
         $this->loghistory = $loghistory;
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
       $employee_id='';
          $org_id=P3atTrx::where('ID',$this->loghistory->ID_TRX)->groupBy('P3AT_NUMBER')->groupBy('ORG_ID')->value('ORG_ID');
          $approval=ApprovalMaster::where('ORG_ID',$org_id)->where('ID_APP',$id)->get();
          foreach ($approval as $key) {
            
            if($key->ID_APPR_1==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_2!=null){
                    $employee_id=$key->ID_APPR_2;
                }
            }
            if($key->ID_APPR_2==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_3!=null){
                    $employee_id=$key->ID_APPR_3;
                }
            }
             if($key->ID_APPR_3==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_4!=null){
                    $employee_id=$key->ID_APPR_4;
                }
            }
            if($key->ID_APPR_5==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_6!=null){
                    $employee_id=$key->ID_APPR_6;
                }
            }
            if($key->ID_APPR_7==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_8!=null){
                    $employee_id=$key->ID_APPR_8;
                }
            }
            if($key->ID_APPR_8==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_9!=null){
                    $employee_id=$key->ID_APPR_9;
                }
            }
            if($key->ID_APPR_9==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_10!=null){
                    $employee_id=$key->ID_APPR_10;
                }
            }
            if($key->ID_APPR_10==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_11!=null){
                    $employee_id=$key->ID_APPR_11;
                }
            }
            if($key->ID_APPR_11==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_12!=null){
                    $employee_id=$key->ID_APPR_12;
                }
            }
            if($key->ID_APPR_12==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_13!=null){
                    $employee_id=$key->ID_APPR_13;
                }
            }
            if($key->ID_APPR_13==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_14!=null){
                    $employee_id=$key->ID_APPR_14;
                }
            }
            if($key->ID_APPR_14==$this->loghistory->EMP_ID)
            {
                if($key->ID_APPR_15!=null){
                    $employee_id=$key->ID_APPR_15;
                }
            }
    }
      $nama=EmpMaster::where('ID',$employee_id)->value('EMP_NAME');
      $emp_number=EmpMaster::where('ID',$employee_id)->value('EMP_NUMBER');
      $p3at_detail=P3atTrx::where('P3AT_NUMBER',$p3at_num)->get();
     

       return $this->from('emmaiscoming111@gmail')
                   ->view('approval_email_template')
                   ->with([
                         'p3at_num'=>$p3at_num,
                         'emp_name'=>$nama,
                         'emp_num'=>$emp_number,
                         'detail_p3at'=>$p3at_detail
                     ]);
     }
}
