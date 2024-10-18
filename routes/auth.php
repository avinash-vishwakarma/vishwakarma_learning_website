<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\PasswordUpdateController;
use App\Http\Controllers\Auth\EmailUpdateController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\NumberUpdateController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NumberVerificationController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
        ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.number');

    Route::get('reset-password', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});


Route::middleware("hasOTP")->controller(NumberVerificationController::class)->group(function(){
    Route::get("verify-number",'show')->name('verification.number');
    Route::post('resend-otp','resend')->middleware('canResendOTP')->name('verification.otp.resend');
    Route::post("verify-number",'store')->middleware(['throttle:6,1'])->name('verification.number.verify'); 
});




Route::middleware('auth')->group(function () {

    // Number Update Routes
    Route::controller(NumberUpdateController::class)->group(function(){
        Route::get("/number-update","show")->name("number_update.show");
        Route::post("/number-update","update")->name("number_update.update");
        Route::get("/new_number","newNumber")->middleware("PasswordVerified")->name("number_new.show");
        Route::patch("/new_number",'newNumberUpdate')->middleware('PasswordVerified')->name("number_new.update");
    });

    // Update Password
    Route::controller(PasswordUpdateController::class)->group(function(){
        Route::get("/update_password","show")->name("password_update.show");
        Route::put("/update_password","update")->name("password_update.update");
    });

    // Update Email
    
    Route::controller(EmailUpdateController::class)->group(function(){
        Route::get("/email_update","show")->name("email_update.show");
        Route::patch("/email_update","update")->name("email_update.update");
        Route::get("/verify-email","verifyEmail")->name("email_update.verify")->middleware(["canVerifyEmail"]);
        Route::post("/resend-verification-mail",'resendEmail')->name("email_update.resend")->middleware(['canVerifyEmail','canResendEmail']);
        Route::get('verify-email/{id}/{hash}', "validateEmail")
                ->middleware(["canVerifyEmail",'signed', 'throttle:6,1'])
                ->name('verification.verify');
    });




    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

});



// Route::middleware('auth')->group(function () {
//     Route::get('verify-email', EmailVerificationPromptController::class)
//         ->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//         ->middleware(['signed', 'throttle:6,1'])
//         ->name('verification.verify');

//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//         ->middleware('throttle:6,1')
//         ->name('verification.send');

//     Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//         ->name('password.confirm');

//     Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

//     Route::put('password', [PasswordController::class, 'update'])->name('password.update');

//     Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
//         ->name('logout');
// });
