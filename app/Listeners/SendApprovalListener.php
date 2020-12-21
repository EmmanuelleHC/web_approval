<?php

namespace App\Listeners;

use App\Events\SendApprovalEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendApprovalMail;
use Illuminate\Support\Facades\Mail;
use App\SysUser;
use App\LogHistory;
use App\EmpMaster;
use App\P3atTrx;
use App\ApprovalMaster;
use Illuminate\Support\Facades\DB;

class SendApprovalListener 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ExampleEvent  $event
     * @return void
     */
    public function handle(SendApprovalEvent $event)
    {
          $id=1;
          $employee_id='';


           $amount=P3atTrx::select(DB::raw('sum(ASSET_PRICE) as ASSET_PRICE'))->where('ID',$event->loghistory->ID_TRX)->groupBy('P3AT_NUMBER')->value('ASSET_PRICE');
          $org_id=P3atTrx::where('ID',$event->loghistory->ID_TRX)->groupBy('P3AT_NUMBER')->groupBy('ORG_ID')->value('ORG_ID');
          $approval=ApprovalMaster::where('ORG_ID',$org_id)->where('ID_APP',$id)->where('AMOUNT_FROM','>=',$amount)->orWhere('AMOUNT_TO','<=',$amount)->get();
          foreach ($approval as $key) {
            
            if($key->ID_APPR_1==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_2!=null){
                    $employee_id=$key->ID_APPR_2;
                }
            }
            if($key->ID_APPR_2==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_3!=null){
                    $employee_id=$key->ID_APPR_3;
                }
            }
             if($key->ID_APPR_3==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_4!=null){
                    $employee_id=$key->ID_APPR_4;
                }
            }
              if($key->ID_APPR_4==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_5!=null){
                    $employee_id=$key->ID_APPR_5;
                }
            }
            if($key->ID_APPR_5==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_6!=null){
                    $employee_id=$key->ID_APPR_6;
                }
            }
            if($key->ID_APPR_6==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_7!=null){
                    $employee_id=$key->ID_APPR_7;
                }
            }
            if($key->ID_APPR_7==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_8!=null){
                    $employee_id=$key->ID_APPR_8;
                }
            }
            if($key->ID_APPR_8==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_9!=null){
                    $employee_id=$key->ID_APPR_9;
                }
            }
            if($key->ID_APPR_9==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_10!=null){
                    $employee_id=$key->ID_APPR_10;
                }
            }
            if($key->ID_APPR_10==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_11!=null){
                    $employee_id=$key->ID_APPR_11;
                }
            }
            if($key->ID_APPR_11==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_12!=null){
                    $employee_id=$key->ID_APPR_12;
                }
            }
            if($key->ID_APPR_12==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_13!=null){
                    $employee_id=$key->ID_APPR_13;
                }
            }
            if($key->ID_APPR_13==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_14!=null){
                    $employee_id=$key->ID_APPR_14;
                }
            }
            if($key->ID_APPR_14==$event->loghistory->EMP_ID)
            {
                if($key->ID_APPR_15!=null){
                    $employee_id=$key->ID_APPR_15;
                }
            }
          }
         
          if($employee_id!=''){
            $email =EmpMaster::where('ID',$employee_id)->value('EMAIL_USER');
            Mail::to($email)->send(new SendApprovalMail($event->loghistory));
          }
          
    }
}
