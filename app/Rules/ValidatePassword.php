<?php

namespace App\Rules;

use Closure;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidatePassword implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string = null): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $user = User::findOrFail(Auth::user()->id);
        if(!Hash::check($value, $user->password)){
            $fail("Password Does Not Match Our Record");
        }
    }
}
