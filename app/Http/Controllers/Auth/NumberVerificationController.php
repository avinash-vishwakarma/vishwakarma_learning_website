<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Rules\VerifyOtpRule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class NumberVerificationController extends Controller
{
    public function show(Request $request){
        return !session()->has("otp")
        ? redirect(route("home",true))
        : view('auth.verify-number');
    }

    public function store(Request $request){
        $request->validate([
            'otp'=>["required","digits:6",new VerifyOtpRule]
        ]);
        session()->forget(["otp","otp_time"]);

        // cases : reset_password , update_number , verify_number 

        session(["otp_verified"=>Carbon::now()]);
        switch (session()->get("verify_case")) {
            case 'reset_password':
                return redirect("/reset-password");
            break;
            
            case 'update_number':
                // chante the number
                $user = Auth::user();
                $user->number = session()->get("number");
                $user->save();
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect("/login")->with('toast',["type"=>"success","title"=>"Number Updated" , "description"=>"Your Number is now updated kindly re-login"]);
            break;

            default:
                $user = Auth::user();
                $user->number_verified_at  = now();
                $user->save();
            break;
        }

        session()->forget("verify_case");
        return redirect(route("home"))->with('toast',["type"=>"success","title"=>"OTP verified" , "description"=>"Your Number ".$user->number." verified successfully"]);
    }
}
