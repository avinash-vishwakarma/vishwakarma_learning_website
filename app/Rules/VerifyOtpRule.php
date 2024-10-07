<?php

namespace App\Rules;

use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\ValidationRule;

class VerifyOtpRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string = null): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(Hash::check($value,session()->get('otp')) && Carbon::now()->lessThan(Carbon::parse(session()->get("otp_time")))){
                        // remove otp and otp_itme from session
                        session()->forget(["otp","otp_time"]);
        }else{
            $fail("Wrong OTP or Time expire");
        }
        
    }
}
