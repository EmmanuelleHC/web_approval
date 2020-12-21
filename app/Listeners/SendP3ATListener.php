<?php
namespace App\Listeners;

use App\Events\SendP3ATEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendP3ATMail;
use Illuminate\Support\Facades\Mail;
use App\SysUser;
use App\LogHistory;
use App\EmpMaster;
use App\P3atTrx;
use App\ApprovalMaster;
use Illuminate\Support\Facades\DB;

class SendP3ATListener
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
    public function handle(SendP3ATEvent $event)
    {
        $emp = EmpMaster::orderBy('ID', 'asc')->select('EMAIL_USER', 'ID')
            ->get();
        $p3at_arr = [];

        foreach ($emp as $employee)
        {

            $approval = ApprovalMaster::select('ID_APPR_1', 'ID_APPR_2', 'ID_APPR_3', 'ID_APPR_4', 'ID_APPR_5', 'ID_APPR_6', 'ID_APPR_7', 'ID_APPR_8', 'ID_APPR_9', 'ID_APPR_10', 'ORG_ID','AMOUNT_FROM','AMOUNT_TO')->get();
            foreach ($approval as $approver)
            {
                $p3at_arr = [];

                if ($approver->ID_APPR_1 == $employee->ID)
                {
                    $p3at = P3atTrx::where('ORG_ID', $approver->ORG_ID)
                        ->where('STATUS', 'New')
                        ->whereNull('SEND_FLAG')
                        ->where(DB::raw('sum(ASSET_PRICE) as ASSET_PRICE','>=', $approver->AMOUNT_FROM))
                        ->where(DB::raw('sum(ASSET_PRICE) as ASSET_PRICE','<=', $approver->AMOUNT_TO))
                        ->groupBy('P3AT_NUMBER')
                        ->select('P3AT_NUMBER')
                        ->get();
                    foreach ($p3at as $key)
                    {
                        array_push($p3at_arr, $key->P3AT_NUMBER);
                    }
                }

              

            }
          
            if ($p3at_arr != [])
            {
                Mail::to($employee->EMAIL_USER)->send(new SendP3ATMail($p3at_arr,$employee->ID));
            }

        }
    }

}

