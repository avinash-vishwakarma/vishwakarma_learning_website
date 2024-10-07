<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailUpdateController extends Controller
{
    public function show(){
        // get the current user  email data 
        return view("auth.update.email");
    }

    public function update(Request $request){
        $request->validate([
            "email"=>"required | email | unique:users,email"
        ]);

        $request->user()->email = $request->email;
        session($request->only("email"));
        $request->user()->sendEmailVerificationNotification();
        // redireact the user 
        return redirect()->route('email_update.verify');
    }

    public function verifyEmail(){
        return view("auth.verifyEmail");
    }

    public function validateEmail(EmailVerificationRequest $request){


        $user = Auth::user();
        $user->email = session()->get("email");
        $user->save();
        $user->markEmailAsVerified();

        // forget the email 
        session()->forget("email");
        return redirect()->route('home')->with('toast',["type"=>"success","title"=>"Email Verified" , "description"=>"Your email is now verified"]);
    }

}
