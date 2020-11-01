<?php

namespace App\Events;

class SendApprovalEvent extends Event
{
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $loghistory;
	public function __construct($loghistory){
	   $this->loghistory = $loghistory;
	}
}
