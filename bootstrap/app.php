<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\AdminMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Configure global middleware
        $middleware->validateCsrfTokens(
            except: [
                'stripe/*',
                // Add any other routes that should be exempt from CSRF protection
            ]
        );

        // Configure web middleware group
        $middleware->web(append: [
            // Add any additional middleware you want to run on all web routes
        ]);

        // Configure admin middleware group
        $middleware->group('admin', [
            'auth',  // Ensure the user is authenticated
            AdminMiddleware::class,  // Then check if they're an admin
        ]);

        // You can add more middleware configurations here as needed
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
