<?php

namespace App\Http;

use App\Http\Middleware\AuthJWT;
use Tymon\JWTAuth\Middleware\GetUserFromToken;
use Tymon\JWTAuth\Middleware\RefreshToken;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\EncryptCookies;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\VerifyCsrfToken;
use Barryvdh\Cors\HandleCors;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\Authorize;
use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            ShareErrorsFromSession::class,
            LocaleMiddleware::class,
            VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth'          => Authenticate::class,
        'auth.basic'    => AuthenticateWithBasicAuth::class,
        'can'           => Authorize::class,
        'guest'         => RedirectIfAuthenticated::class,
        'throttle'      => ThrottleRequests::class,
        'isAdmin'       => AdminMiddleware::class,
        'cors'          => HandleCors::class,
        'jwt.auth'      => GetUserFromToken::class,
        'jwt.refresh'   => RefreshToken::class,
        'jwt-auth'      => AuthJWT::class,
    ];
}
