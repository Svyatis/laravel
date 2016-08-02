<?php

namespace App\Http\Middleware;

use Closure;
use Lang;
use Session;

class LocaleMiddleware
{
    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Lang::setLocale(Session::get('locale'));
        return $next($request);
    }
}
