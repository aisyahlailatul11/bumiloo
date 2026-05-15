<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            // Jika kamu punya middleware custom, daftarkan di sini
        ]);

        $middleware->redirectTo(
            guests: '/login',
            users: function ($request) {
                // Ini logic sakti biar gak salah kamar lagi
                $user = auth()->user();
                if ($user && $user->role === 'Admin') {
                    return '/admin/dashboard';
                } elseif ($user && $user->role === 'Bidan') {
                    return '/bidan/dashboard';
                }
                return '/dashboard'; // Default jika role tidak cocok
            }
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
