<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\ValidatePassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordUpdateController extends Controller
{
       public function show(){
            return view("auth.update.password");
        }

        public function update(Request $request){
            $request->validate([
                "current"=>['required', Password::defaults() , new ValidatePassword],
                "password"=>['required', 'confirmed', Password::defaults()]
            ]);
            // check if the current password matches from the given password
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            // redirect to home page 
            return redirect()->route('home')->with(["toast"=>["type"=>"success","title"=>"password updated" , "description"=>"your password is now updated"]]);
        }

}
