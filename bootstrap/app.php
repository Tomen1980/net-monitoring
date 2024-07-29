<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RedirectIfNotLogin;
use App\Http\Middleware\LoginProtect;
use App\Http\Middleware\ProtectedAdminRoute;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            "RedirectAuth" => RedirectIfNotLogin::class,
            "LoginProtect" => LoginProtect::class,
            "AdminRoute" => ProtectedAdminRoute::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
