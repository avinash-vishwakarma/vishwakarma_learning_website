<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request): View
    {
        return view('auth.reset-password', ['request' => $request]);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(['password' => ['required', 'confirmed', Rules\Password::defaults()]]);       
        // get the user form session
        $user = User::find(session()->get("reset_password")["user_id"]);
        // update the password
        $user->password =  Hash::make($request->password);
        $user->save();
        // redirect to login page
        // remove otp_verified and reset_password from session
        $request->session()->forget(["reset_password","otp_verified","number"]);
        return redirect()->route('login')->with('toast',["type"=>"success","title"=>"Password Updated" , "description"=>"Your password is updated kindly login again"]);        
    }
}
