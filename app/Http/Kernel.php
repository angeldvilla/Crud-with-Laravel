<?php


namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{

    protected $routeMiddleware = [
        // Otros middlewares
        'role' => \App\Http\Middleware\RoleMiddleware::class,
    ];

    protected $middlewareGroups = [
        'web' => [
            // Otros middlewares
            \App\Http\Middleware\CheckActiveSession::class,
        ],
    ];
}
