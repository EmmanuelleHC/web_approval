<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

use App\SysUser;
use App\LogHistory;
use App\EmpMaster;
use App\P3atTrx;
use App\ApprovalMaster;
class SendDailyMail extends Mailable
{
    use Queueable, SerializesModels;

 
    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $p3at_arr;
     protected $employee_id;
     public function __construct($p3at_arr,$employee_id)
     {
       
         $this->p3at_arr=$p3at_arr; 
         $this->employee_id=$employee_id;
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {

      
            $emp=EmpMaster::orderBy('ID','asc')->get();
            $nama=EmpMaster::where('ID',$this->employee_id)->value('EMP_NAME');
            $emp_number=EmpMaster::where('ID',$this->employee_id)->value('EMP_NUMBER');
            $link_program='http://sd6webdev.indomaret.lan:8080/approval';
      
            $this->from('fad.igr@indomaret.co.id')
                           ->view('daily_email_template')
                           ->with([
                                 'p3at_arr'=>$this->p3at_arr,
                                 'emp_name'=>$nama,
                                 'emp_num'=>$emp_number,
                                 'link_program'=>$link_program,
                             ]);
           
                       
      
    
       
    }
}
