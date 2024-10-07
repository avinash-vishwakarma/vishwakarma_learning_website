<?php

namespace App\Listeners;

use Carbon\Carbon;
use App\Events\GenrateOtpEvent;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterOtp
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
    public function handle(GenrateOtpEvent $event): void
    {
        // send otp from a service 
        // test : show otp 

        if(env('APP_ENV') == "local"){
            Log::info("Otp genrated for :".$event->user->number ." is ". $event->otp);
        }else{
            // send the otp to the user
        }
        // store otp in session 
        session(["otp"=>Hash::make($event->otp),"otp_time"=>Carbon::now()->addMinutes((int)config('app.OTP_EXPIRES_IN'))]);
    }
}
