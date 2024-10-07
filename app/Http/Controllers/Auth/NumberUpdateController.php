<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Events\GenrateOtpEvent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class NumberUpdateController extends Controller
{
    public function show(){
        return view("auth.update.number");        
    }

    public function update(Request $request){
        $request->validate([
            "password"=>["required",Password::defaults()]
        ]);
        $userPassword = User::find($request->user()->id)->password;
        if(Hash::check($request->password, $userPassword)){
            session(["password_verified"=>now()]);
            return redirect()->route('number_new.show')->with('toast',["type"=>"success","title"=>"Password verified" , "description"=>"Your Password is now verified"]);
        }
        return redirect()->back()->withErrors(["password"=>"Sorry Password does not match try again"]);
    }

    public function newNumber(){
        return view("auth.update.newNumber");
    }

    public function newNumberUpdate(Request $request){
                // validate the number
                $request->validate([
                    "number"=>["required" , "digits:10" , "unique:users,number"]
                ],[
                    "number.unique"=>"number already exists"
                ]);
                // save the number in session
                session(["verify_case" => "update_number"]);
                session(["number" => $request->number]);
                $user = $request->user();
                $user->number = $request->number;
                event(new GenrateOtpEvent($user));
                // redirect to verfiy otp page
                return redirect()->route('verification.number')->with(['otp send successfully']);
    }

}
