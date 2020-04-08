<?php

namespace App\Http\Controllers\Api;

use App\Events\Verified;
use App\Http\Controllers\Controller;
use App\Inquiry;
use Illuminate\Http\Request;

class VerificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1');
    }

    public function verify(Request $request, Inquiry $inquiry)
    {
        if ($inquiry->hasVerifiedEmail()) {
            return $this->response(false);
        }

        if ($inquiry->markEmailAsVerified()) {
            event(new Verified($inquiry));
        }

        return $inquiry;
    }

    public function resend(Request $request, Inquiry $inquiry)
    {
        if ($inquiry->hasVerifiedEmail()) {
            return $this->response(false);
        }

        $inquiry->sendEmailVerificationNotification();

        return $this->response(true);
    }

    protected function response($successful)
    {
        return [
            'success' => $successful,
        ];
    }
}
