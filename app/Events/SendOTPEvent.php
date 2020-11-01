<?php

namespace App\Events;

class SendOTPEvent extends Event
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $sysrefnumotp;
	public function __construct($sysrefnumotp){
	   $this->sysrefnumotp = $sysrefnumotp;
	}
    
}
