<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Events\GenrateOtpEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'number' => ['required', 'digits:10'],
        ]);
        // send a new otp 
        // redirect the user to otp verification 
        $user = User::whereNumber($request->number)->first();
        if($user){
            // send otp to the number
            GenrateOtpEvent::dispatch($user);
            // set forgot password in the session
            session(["verify_case"=>"reset_password"]);
            session(["number"=>$user->number]);
            session(["reset_password"=>["time"=>Carbon::now(),"user_id"=>$user->id,"user_number"=>$user->number]]);
            // redirect the user to verify otp page
            return redirect("/verify-number");
        }else{
            throw ValidationException::withMessages(["number"=>"sorry no user found"]);
        }
    }
}
