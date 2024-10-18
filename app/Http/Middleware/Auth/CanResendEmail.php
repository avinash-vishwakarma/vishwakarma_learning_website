<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanResendEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(Carbon::now()->lessThen(Carbon::parse(session()->get('email_sent_time'))->addMinutes((int)config('app.RESEND_TIME_LIMIT_FOR_EMAIL_VERIFICATION')))){
            return $next($request);
        }
        return redireact()->back()->with('toast',["type"=>"error","title"=>"Resend Email After 2 Minutes" , "description"=>"Please wait for 2 minutes before resending the email."]);

    }
}
