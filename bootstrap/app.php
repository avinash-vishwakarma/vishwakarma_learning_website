<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\CanVerifyEmail;
use App\Http\Middleware\HasOtpMiddleware;
use App\Http\Middleware\PasswordVerified;
use App\Http\Middleware\Auth\CanResendEmail;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'hasOTP'=>HasOtpMiddleware::class,
            'PasswordVerified'=>PasswordVerified::class,
            'canVerifyEmail'=>CanVerifyEmail::class,
            'canResendEmail'=>CanResendEmail::class
        ]);
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
    