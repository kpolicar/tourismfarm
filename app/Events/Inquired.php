<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

class Inquired
{
    use SerializesModels;


    public $inquiry;

    public function __construct($inquiry)
    {
        $this->inquiry = $inquiry;
    }
}
