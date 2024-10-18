<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\ResendOTP;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResendOTPListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ResendOTP $event): void
    {
        if(env('APP_ENV') == "local"){
            Log::info("Otp regenrated :".session()->get('otp'));
        }else{
            // send the otp to the user
        }
        // store otp in session 
        session(["otp_time"=>Carbon::now()]);
    }
}
