<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure $next
     * @param  \Illuminate\Http\Request $request
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        app()->setLocale($request->segment(1));
        return $next($request);
    }
}
