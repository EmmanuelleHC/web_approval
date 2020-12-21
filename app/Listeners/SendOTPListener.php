<?php

namespace App\Listeners;

use App\Events\SendOTPEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\SendOTPMail;
use Illuminate\Support\Facades\Mail;
use App\SysUser;
use App\EmpMaster;
use Illuminate\Support\Facades\DB;

class SendOTPListener 
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
    public function handle(SendOTPEvent $event)
    {
          $email =EmpMaster::where('USER_ID',$event->sysrefnumotp->USER_ID)->value('EMAIL_USER');
          
          Mail::to($email)->send(new SendOTPMail($event->sysrefnumotp));
    }
}
