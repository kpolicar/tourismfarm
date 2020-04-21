<?php

namespace App\Events;

use App\Inquiry;
use Illuminate\Queue\SerializesModels;

class Approved
{
    use SerializesModels;


    public $inquiry;

    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
    }
}
