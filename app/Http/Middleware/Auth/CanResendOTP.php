<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanResendOTP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check of last otp genration is 
        if(session()->get('otp') && Carbon::now()->greaterThan(Carbon::parse(session()->get('otp_time'))->addMinutes((int)config('app.OTP_CAN_RESEND_TIME')))){
            return $next($request);
        }
        return redirect()->back()->with('toast',["type"=>"danger","title"=>"Resend OTP After 1 Minutes" , "description"=>"Please wait for 1 minutes before resending the OTP."]);
    }
}
