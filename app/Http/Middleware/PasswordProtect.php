<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PasswordProtect
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->session()->get('access_granted')) {
            return $next($request);
        }

        if($request->is('password')) {
            return $next($request);
        }
        return redirect('/password');
    }
}
