<?php

namespace App\Http\Middleware;

use Closure;
use Log;
class LoggerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   // This will call every time when http request made.
        Log::info('This is log catch by Middleware');
        return $next($request);
    }
}
