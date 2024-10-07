<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(session()->has("password_verified") && Carbon::now()->lessThan(Carbon::parse(session()->get("password_verified"))->addMinutes((int)config('app.PASSWORD_VERIFIED_FOR')))){
            return $next($request);
        }
        session()->forget("password_verified");
        return redirect()->back()->with(['error'=>'password update time expire']);
    }
}
